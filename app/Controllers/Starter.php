<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\ProdutoModel;

class Starter extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
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
        $UtilizadorModel = new LoginModel();
        $ProdutosModel = new ProdutoModel();

        $userId = session('utilizador_id');
        $totalUtilizador = $UtilizadorModel->countAll();
        $userId = session('user_id');
        $totalProdutos = $ProdutosModel->where('utilizador_id', $userId)->countAllResults();
        $totalonline = $UtilizadorModel->where('online_status', 'online')->countAllResults();

        $codigo = $this->gerarCodigoAleatorio(100);

        $data = [
            'title' => 'Olá, ' . session('user_nome') . ' 👋',
            'codigo' => $codigo,
            'totalUtilizador' => $totalUtilizador,
            'totalProdutos' => $totalProdutos,
            'totalonline' => $totalonline
        ];

        echo view('templates/header', $data);
        echo view('starter/index', $data);
        echo view('templates/footer');
    }



    private function gerarCodigoAleatorio($length = 100)
    {
        return bin2hex(random_bytes($length));
    }
}
