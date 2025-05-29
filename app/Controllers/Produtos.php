<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Produtos extends BaseController
{
    protected $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();

        if (!session()->get('isLoggedIn')) {
            helper('url');
           // return redirect()->to('/login?alert=errorLogin');
            session()->setFlashdata('alert', 'errorLogin');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
            exit;
        }
    }
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        $search = $this->request->getGet('search');
        $perPage = 5;

        $query = $this->produtoModel->where('utilizador_id', $userId);

        // Filtro de busca
        if ($search) {
            if (preg_match('/^(\d+)-(\d+)$/', $search, $matches)) {
                $query->groupStart()
                      ->where('Valor >=', $matches[1])
                      ->where('Valor <=', $matches[2])
                      ->groupEnd();
            } elseif (is_numeric($search)) {
                $query->where('Valor', $search);
            } else {
                $query->like('Nome', $search);
            }
        }

        $produtos = $query->paginate($perPage);
        $pager = $this->produtoModel->pager;

        $data = [
            'title'    => 'MicroPlanner Software',
            'codigo'   => $this->gerarCodigoAleatorio(50),
            'produtos' => $produtos,
            'pager'    => $pager,
            'alert'    => session()->getFlashdata('alert'),
        ];

        echo view('templates/header', $data);
        echo view('produtos/index', $data);
        echo view('templates/footer');
    }

    public function cadastrar()
    {
        $session = session();
        $userId = $session->get('user_id');

        $dados = $this->request->getVar();

        if (!$this->validate([
            'Nome' => 'required',
            'Categoria' => 'required',
            'Valor' => 'required|decimal',
        ])) {
            session()->setFlashdata('alert', 'Dados inválidos para cadastro.');
            return redirect()->to('/produtos');
        }

        // Geração automática de SKU
        $dados['SKU'] = $this->gerarSKU($dados['Nome'], $dados['Categoria']);
        $dados['utilizador_id'] = $userId;

        $this->produtoModel->insert($dados);

        session()->setFlashdata('alert', 'Produto cadastrado com sucesso!');
        return redirect()->to('/produtos');
    }

    public function editar()
    {
        $session = session();
        $userId = $session->get('user_id');
        $dados = $this->request->getVar();

        $produto = $this->produtoModel->find($dados['id']);

        if ($produto && $produto['utilizador_id'] == $userId) {
            $this->produtoModel->update($dados['id'], $dados);
            session()->setFlashdata('alert', 'Produto atualizado com sucesso!');
        } else {
            session()->setFlashdata('alert', 'Você não tem permissão para editar este produto.');
        }

        return redirect()->to('/produtos');
    }

    public function excluir($id)
    {
        $session = session();
        $userId = $session->get('user_id');

        $produto = $this->produtoModel->find($id);

        if ($produto && $produto['utilizador_id'] == $userId) {
            $this->produtoModel->delete($id);
            session()->setFlashdata('alert', 'Produto excluído com sucesso!');
        } else {
            session()->setFlashdata('alert', 'Você não tem permissão para excluir este produto.');
        }

        return redirect()->to('/produtos');
    }

    public function gerarPdf()
    {
        $userId = session()->get('user_id');
        $produtos = $this->produtoModel
            ->where('utilizador_id', $userId)
            ->findAll();

        if (empty($produtos)) {
            session()->setFlashdata('alert', 'Você não tem produtos para gerar PDF.');
            return redirect()->to('/produtos');
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $html = view('pdf/produtos', ['produtos' => $produtos]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('produtos.pdf', ['Attachment' => false]);
    }

    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }

    private function gerarSKU($nome, $categoria)
    {
        $nomeLimpo = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $nome), 0, 3));
        $categoriaLimpa = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $categoria), 0, 3));
        $random = strtoupper(bin2hex(random_bytes(2))); // 4 caracteres

        return $nomeLimpo . '-' . $categoriaLimpa . '-' . $random;
    }
}
