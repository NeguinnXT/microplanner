<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to('/webmaster?token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    // Gerar token/código aleatório
    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }
}
