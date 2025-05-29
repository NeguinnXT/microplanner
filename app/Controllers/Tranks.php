<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tranks extends BaseController
{
    public function __construct()
    {
        helper('url');

        if (!session()->get('isLoggedIn')) {
            // return redirect()->to('/login?alert=errorLogin');
            session()->setFlashdata('alert', 'errorLogin');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
            exit;
        }
    }
    public function index()
    {
        $data = [
            'title'   => 'Obrigado por utilizar o MicroPlanner',
            'codigo'  => $this->gerarCodigoAleatorio(50),
        ];

        echo View('templates/header', $data);
        echo View('tranks/index', $data);
        echo View('templates/footer');
    }

    // Gerar token/código aleatório
    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }
}
