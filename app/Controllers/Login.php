<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    protected $session;
    protected $loginModel;

    public function __construct()
    {
        $this->session = session();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $codigo
        ];
        return view('login/index', $data);
    }

    private function gerarCodigoAleatorio($length = 100)
    {
        return bin2hex(random_bytes($length));
    }



    public function recuperar_senha()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $codigo
        ];

        return view('login/recuperar_senha', $data);
    }

    public function redefinir_senha()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $codigo
        ];

        return view('login/redefinir_senha', $data);
    }
    public function recuperarCodigo()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $codigo
        ];
        return view('login/recuperar_codigo', $data);
    }

    public function autenticar()
    {
        $request  = service('request');
        $username = $request->getPost('Email');
        $password = $request->getPost('Senha');
        $codigo   = $this->gerarCodigoAleatorio(100);

        if (empty($username) || empty($password)) {
            session()->setFlashdata('alert', 'errorCamposEmply');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }


        $utilizador = $this->loginModel->where('Email', $username)->first();

        if (empty($utilizador)) {
            session()->setFlashdata('alert', 'errorUser');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        if (!password_verify($password, $utilizador['Senha'])) {
            $this->loginModel->update($utilizador['id'], [
                'tentativas_falhas' => $utilizador['tentativas_falhas'] + 1,
                'ultimo_tentativa' => time()
            ]);
            session()->setFlashdata('alert', 'errorPassword');
            return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $limiteTentativas = 5;
        $tempoBloqueio = 30;

        if ($utilizador['tentativas_falhas'] >= $limiteTentativas) {
            if (time() - $utilizador['ultimo_tentativa'] < $tempoBloqueio * 60) {
                session()->setFlashdata('alert', 'tentativas-excedidas');
                return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
            } else {
                $this->loginModel->update($utilizador['id'], ['tentativas_falhas' => 0]);
            }
        }

        $session_token = bin2hex(random_bytes(10));

        $this->loginModel->update($utilizador['id'], [
            'online_status' => 'online',
            'session_token' => $session_token,
            'session_ip' => $request->getIPAddress(),
            'session_user_agent' => $request->getUserAgent(),
            'tentativas_falhas' => 0
        ]);

        $this->session->set([
            'user_id' => $utilizador['id'],
            'session_token' => $session_token,
            'user_nome' => $utilizador['Nome'],
            'user_email' => $utilizador['Email'],
            'user_ip' => $utilizador['IP'],
            'user_telefone' => $utilizador['Telefone'],
            'user_cargo' => $utilizador['Cargo'],
            'user_picture' => $utilizador['Foto'],
            'online_status' => 'online',
            'isLoggedIn' => true
        ]);
        if ($utilizador['userlogger']) {
            // Atualiza primeiro
            $this->loginModel->update($utilizador['id'], ['userlogger' => false]);
            // Depois redireciona
            return redirect()->to('/tranks/index?token=' . urlencode($codigo));
        }

        // Se já logou anteriormente
        return redirect()->to('/starter/index?token=' . urlencode($codigo));

        return redirect()->to(base_url('starter') . '?token=' . esc($codigo));
    }

    public function enviarCodigo()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $request = service('request');
        $email = trim(strtolower($request->getPost('email')));

        $utilizador = $this->loginModel
            ->where('LOWER(Email)', $email)
            ->first();


        if (!$utilizador) {
            session()->setFlashdata('alert', 'errorEmail');
            return redirect()->to('/login/recuperar_senha?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $codigo = bin2hex(random_bytes(6));

        $this->session->set('recuperar_codigo', [
            'email' => $email,
            'codigo' => $codigo,
            'data_expiracao' => time() + 600
        ]);

        $emailService = \Config\Services::email();
        $emailService->initialize([
            'protocol'  => 'smtp',
            'SMTPHost'  => 'sandbox.smtp.mailtrap.io',
            'SMTPUser'  => '9213624a95b7b0',
            'SMTPPass'  => 'deab0bb1e8def6',
            'SMTPPort'  => 2525,
            'wordWrap'  => true,
            'mailType'  => 'html',
            'newline'   => "\r\n",
            'crlf'      => "\r\n",
            'SMTPCrypto' => 'tls',
        ]);

        $emailBody = view('emails/recuperar_codigo', ['codigo' => $codigo]);

        $emailService->setFrom('microplannersuport@gmail.com', 'Suporte');
        $emailService->setTo($email);
        $emailService->setSubject('Código de Recuperação de Senha');
        $emailService->setMessage($emailBody);

        if ($emailService->send()) {
            return redirect()->to('/login/recuperarCodigo?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        } else {
            session()->setFlashdata('alert', 'errorEmail');
            return redirect()->to('/login/recuperar_senha?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }
    }

    public function validarCodigo()
    {
        $request = service('request');
        $codigo = $request->getPost('codigo');
        $sessionCodigo = $this->session->get('recuperar_codigo');

        if (!$sessionCodigo || $sessionCodigo['codigo'] !== $codigo || time() > $sessionCodigo['data_expiracao']) {
            session()->setFlashdata('alert', 'errorCodigo');
            return redirect()->to('/login/recuperarCodigo?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }
        return redirect()->to('/login/redefinir_senha?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    public function salvarNovaSenha()
    {
        $request = service('request');
        $novaSenha = $request->getPost('nova_senha');
        $confirmarSenha = $request->getPost('confirmar_senha');
        $sessionCodigo = $this->session->get('recuperar_codigo');

        if (!$sessionCodigo) {
            session()->setFlashdata('alert', 'erroSessao');
        return redirect()->to('/login/recuperar_senha?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }



        if ($novaSenha !== $confirmarSenha) {
            session()->setFlashdata('alert', 'errorSenha');
            return redirect()->to('/login/redefinir_senha?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
        }

        $utilizador = $this->loginModel->where('Email', $sessionCodigo['email'])->first();

        $this->loginModel->update($utilizador['id'], [
            'Senha' => password_hash($novaSenha, PASSWORD_BCRYPT)
        ]);

        $emailService = \Config\Services::email();
        $emailService->initialize([
            'protocol'  => 'smtp',
            'SMTPHost'  => 'sandbox.smtp.mailtrap.io',
            'SMTPUser'  => '9213624a95b7b0',
            'SMTPPass'  => 'deab0bb1e8def6',
            'SMTPPort'  => 2525,
            'wordWrap'  => true,
            'mailType'  => 'html',
            'newline'   => "\r\n",
            'crlf'      => "\r\n",
            'SMTPCrypto' => 'tls',
        ]);

        $emailBody = view('emails/novasenha', [
            'nome' => $utilizador['Nome'],
            'data_alteracao' => date('d/m/Y H:i:s')
        ]);

        $emailService->setFrom('microplannersuport@gmail.com', 'Suporte MicroPlanner');
        $emailService->setTo($sessionCodigo['email']);
        $emailService->setSubject('Confirmação de Alteração de Senha');
        $emailService->setMessage($emailBody);
        $emailService->send();

        $this->session->remove('recuperar_codigo');
        session()->setFlashdata('alert', 'senhaAlterada');
        return redirect()->to('/login?alert=&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }

    public function logout()
    {
        $codigo = $this->gerarCodigoAleatorio(100);
        $this->loginModel->update($this->session->get('user_id'), [
            'online_status' => 'offline',
            'session_token' => null
        ]);
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
