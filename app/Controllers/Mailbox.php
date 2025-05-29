<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificacoesModel;

class Mailbox extends BaseController
{
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
        $notificacoesModel = new \App\Models\NotificacoesModel();
        $userId = session()->get('user_id');

        $mensagens = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('excluida', 0) // Adicionado filtro
            ->orderBy('id', 'DESC')
            ->findAll();

        $totalNaoLidas = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('lida', 0)
            ->where('excluida', 0)
            ->countAllResults();
            // Contar total na lixeira
    $totalNaLixeira = $notificacoesModel
        ->where('destinatario_id', $userId)
        ->where('excluida', 1)
        ->countAllResults();


        $data = [
            'title'     => 'MicroPlanner Software',
            'codigo'    => $this->gerarCodigoAleatorio(50),
            'mensagens' => $mensagens,
            'totalNaLixeira' => $totalNaLixeira,
            'totalNaoLidas' => $totalNaoLidas

        ];

        echo view('templates/header', $data);
        echo view('Mailbox/index', $data);
        echo view('templates/footer');
    }
    
    public function excluir($id)
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();

        $mensagem = $notificacoesModel->find($id);

        if (!$mensagem) {
            // return redirect()->to('/mailbox')->with('error', 'Mensagem não encontrada.');
            // session()->setFlashdata('alert', 'notFoundMailBox');
        return redirect()->to('/mailbox?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        // Marca como excluída ou deleta (aqui estamos movendo para "lixeira")
        $notificacoesModel
            ->where('id', $id)
            ->set(['excluida' => 1]) // Adicione esse campo à tabela
            ->update();

        // return redirect()->to('/mailbox')->with('success', 'Mensagem movida para a lixeira.');
        // session()->setFlashdata('alert', 'successDelete');
        return redirect()->to('/mailbox?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    public function lerNotificacao($id)
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();

        // Buscar a notificação
        $notificacao = $notificacoesModel->find($id);

        if (!$notificacao) {
            // return redirect()->to('/mailbox')->with('notFound', 'Notificação não encontrada.');
            // session()->setFlashdata('alert', 'notFoundMailBox');
        return redirect()->to('/mailbox?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        // Marcar como lida
        if (!$notificacao['lida']) {
            $notificacoesModel
                ->where('id', $id)
                ->set(['lida' => 1])
                ->update();
        }


        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $this->gerarCodigoAleatorio(50),
            'mensagem' => $notificacao
        ];

        echo view('templates/header', $data);
        echo view('Mailbox/ler', $data);  // Criaremos essa view a seguir
        echo view('templates/footer');
    }

    public function restaurar($id)
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();

        $mensagem = $notificacoesModel->find($id);

        if (!$mensagem) {
            // return redirect()->to('/mailbox/lixeira')->with('error', 'Mensagem não encontrada.');
            // session()->setFlashdata('alert', 'notFoundMailBox');
        return redirect()->to('/mailbox/lixeira?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $notificacoesModel
            ->where('id', $id)
            ->set(['excluida' => 0])
            ->update();

        // return redirect()->to('/mailbox')->with('success', 'Mensagem restaurada com sucesso.');
        // session()->setFlashdata('alert', 'notificacoesrestourada');
        return redirect()->to('/mailbox?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    public function deletar($id)
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();

        $mensagem = $notificacoesModel->find($id);

        if (!$mensagem) {
            // return redirect()->to('/mailbox/lixeira')->with('error', 'Mensagem não encontrada.');
            // session()->setFlashdata('alert', 'notFoundMailBox');
        return redirect()->to('/mailbox/lixeira?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $notificacoesModel->delete($id);

        // return redirect()->to('/mailbox/lixeira')->with('success', 'Mensagem apagada definitivamente.');
        // session()->setFlashdata('alert', 'notificacoesExcluidas');
        return redirect()->to('/mailbox/lixeira?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }



    public function lixeira()
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();
        $userId = session()->get('user_id');

        $mensagens = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('excluida', 1)
            ->orderBy('id', 'DESC')
            ->findAll();
        $totalNaoLidas = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('lida', 0)
            ->where('excluida', 0)
            ->countAllResults();
            // Contar total na lixeira
    $totalNaLixeira = $notificacoesModel
        ->where('destinatario_id', $userId)
        ->where('excluida', 1)
        ->countAllResults();

        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $this->gerarCodigoAleatorio(50),
            'mensagens' => $mensagens,
            'totalNaoLidas' => $totalNaoLidas,
            'totalNaLixeira' => $totalNaLixeira
        ];


        echo view('templates/header', $data);
        echo view('Mailbox/lixeira', $data);
        echo view('templates/footer');
    }
    public function excluirTodas()
    {
        $userId = session()->get('user_id');
        $notificacoesModel = new NotificacoesModel();

        $notificacoesModel
            ->where('destinatario_id', $userId)
            ->delete();

        // return redirect()->to('/mailbox?alert=notificacoesExcluidas');
        // session()->setFlashdata('alert', 'notificacoesExcluidas');
        return redirect()->to('/mailbox?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    public function enviados()
    {
        $notificacoesModel = new \App\Models\NotificacoesModel();
        $userId = session()->get('user_id');

      
        $totalNaoLidas = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('lida', 0)
            ->where('excluida', 0)
            ->countAllResults();
            // Contar total na lixeira
    $totalNaLixeira = $notificacoesModel
        ->where('destinatario_id', $userId)
        ->where('excluida', 1)
        ->countAllResults();


        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $this->gerarCodigoAleatorio(50),
            'totalNaLixeira' => $totalNaLixeira,
            'totalNaoLidas' => $totalNaoLidas
        ];

        echo view('templates/header', $data);
        echo view('Mailbox/enviados', $data);
        echo view('templates/footer');
    }

    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }
}
