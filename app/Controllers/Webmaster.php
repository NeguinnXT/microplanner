<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Webmaster extends BaseController
{
    public function index()
    {
        $UtilizadorModel = new LoginModel();
         $totalUtilizador = $UtilizadorModel->countAll();
        $data = [
            'title' => 'MicroPlanner Software',
            'codigo'  => $this->gerarCodigoAleatorio(50),
            'totalUtilizador' => $totalUtilizador,
        ];

        echo view('web/templates/header', $data);
        echo view('web/webmaster/index', $data);
        echo view('web/templates/footer');
    }
    // Gerar token/código aleatório
    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }
}
