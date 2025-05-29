<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use Config\Services;

class Register extends BaseController
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
        return view('Register/index', [
            'title' => 'MicroPlanner Software',
            'codigo' => $this->gerarCodigoAleatorio(50)
        ]);
    }

    public function criar()
{
    $request     = service('request');
    $nome        = trim($request->getPost('nome'));
    $email       = trim(strtolower($request->getPost('email')));
    $senha       = $request->getPost('senha');
    $telefone    = preg_replace('/\D/', '', $request->getPost('telefone'));
    $cargo       = $request->getPost('cargo');
    $numPessoas  = $request->getPost('num_pessoas');
    $empresa     = trim($request->getPost('empresa'));
    $ip          = $request->getIPAddress();

    // Validação dos campos obrigatórios
    if (empty($nome) || empty($email) || empty($senha) || empty($telefone) || empty($cargo) || empty($numPessoas) || empty($empresa)) {
        return $this->redirecionarComErro('errorCampos');
    }

    if (strlen($nome) < 5) {
        return $this->redirecionarComErro('nomeInvalido');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $this->redirecionarComErro('emailInvalido');
    }

    if (!preg_match('/^\d{9,15}$/', $telefone)) {
        return $this->redirecionarComErro('telefoneInvalido');
    }

    if (strlen($senha) < 6) {
        return $this->redirecionarComErro('senhaInvalida');
    }

    if ($this->loginModel->where('Email', $email)->first()) {
        return $this->redirecionarComErro('emailExistente');
    }

    if ($this->loginModel->where('Telefone', $telefone)->first()) {
        return $this->redirecionarComErro('telefoneExistente');
    }

    if ($this->loginModel->countAll() >= 3) {
        return $this->redirecionarComErro('limiteTotal');
    }

    if ($this->loginModel->where('IP', $ip)->countAllResults() >= 3) {
        return $this->redirecionarComErro('limiteIP');
    }

    // Inserção no banco
    $inserido = $this->loginModel->insert([
        'Nome'              => $nome,
        'Email'             => $email,
        'Senha'             => password_hash($senha, PASSWORD_BCRYPT),
        'Telefone'          => $telefone,
        'Cargo'             => $cargo,
        'num_pessoas'       => $numPessoas,
        'empresa'           => $empresa,
        'Foto'              => 'tema/dist/default/image.png',
        'IP'                => $ip,
        'online_status'     => 'Offline',
        'session_token'     => null,
        'tentativas_falhas' => 0,
        'ultimo_tentativa'  => time(),
    ]);

    if (!$inserido) {
        log_message('error', 'Erro ao inserir utilizador no banco: ' . implode(', ', $this->loginModel->errors()));
        return $this->redirecionarComErro('erroCadastro');
    }

    // Envio de e-mail de boas-vindas
    $this->enviarEmailBoasVindas($nome, $email);

    // Sucesso
    session()->setFlashdata('alert', 'contaCriada');
    return redirect()->to('/login?token=' . urlencode($this->gerarCodigoAleatorio(50)));
}


    // Envio de e-mail de boas-vindas
    private function enviarEmailBoasVindas($nome, $email)
    {
        $emailService = Services::email();
        $emailService->initialize([
            'protocol'   => 'smtp',
            'SMTPHost'   => 'sandbox.smtp.mailtrap.io',
            'SMTPUser'   => '9213624a95b7b0',
            'SMTPPass'   => 'deab0bb1e8def6',
            'SMTPPort'   => 2525,
            'SMTPCrypto' => 'tls',
            'mailType'   => 'html',
            'wordWrap'   => true,
            'newline'    => "\r\n",
            'crlf'       => "\r\n",
        ]);

        $emailBody = view('emails/registro_sucesso', [
            'nome'          => $nome,
            'email'         => $email,
            'data_registro' => date('d/m/Y H:i:s'),
        ]);

        $emailService->setFrom('microplannersuport@gmail.com', 'Suporte MicroPlanner');
        $emailService->setTo($email);
        $emailService->setSubject('Bem-vindo à MicroPlanner');
        $emailService->setMessage($emailBody);

        if (!$emailService->send()) {
            log_message('error', 'Erro ao enviar o e-mail de boas-vindas: ' . print_r($emailService->printDebugger(['headers', 'subject', 'body']), true));
        }
    }

    // Geração de código aleatório
    private function gerarCodigoAleatorio($length = 50)
    {
        return bin2hex(random_bytes($length));
    }

    // Redirecionamento padrão com erro
    private function redirecionarComErro($tipo)
    {
        session()->setFlashdata('alert', $tipo);
        return redirect()->to('/register?token=' . urlencode($this->gerarCodigoAleatorio(50)));
    }
}
