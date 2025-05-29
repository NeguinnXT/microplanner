<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\LoginModel;

class AuthCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            // return redirect()->to('/login?alert=errorLogin');
            session()->setFlashdata('alert', 'errorLogin');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $userId = $session->get('user_id');
        $sessionToken = $session->get('session_token');

        $loginModel = new LoginModel();
        $utilizador = $loginModel->find($userId);

        if (!$utilizador || $utilizador['session_token'] !== $sessionToken) {
            $session->destroy();
            // return redirect()->to('/login?alert=erroSessao&token=' . urlencode($this->gerarCodigoAleatorio(50)));
            session()->setFlashdata('alert', 'erroSessao');
        return redirect()->to('/login?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }
        
    }
    // Gerar token/código aleatório
    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nada a fazer após a requisição
    }
}
