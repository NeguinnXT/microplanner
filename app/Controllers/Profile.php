<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
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
        $codigo = $this->gerarCodigoAleatorio(100); 

        $data = [
            'title' => 'MicroPlanner Software',
            'codigo' => $codigo
        ];

        echo view('templates/header', $data);
        echo view('profile/index', $data);
        echo view('templates/footer');
    }
    public function atualizar()
{
    helper(['form', 'url']);

    $session = session();
    $loginModel = new \App\Models\LoginModel();

    $codigo = $this->gerarCodigoAleatorio(100); 

    $id = $session->get('user_id');

    $nome = $this->request->getPost('nome');
    $email = $this->request->getPost('email');
    $telefone = $this->request->getPost('telefone');
    $foto = $this->request->getFile('foto');

    $dados = [
        'Nome' => $nome,
        'Email' => $email,
        'Telefone' => $telefone,
    ];

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $nomeFoto = $foto->getRandomName();
        $foto->move('uploads/users', $nomeFoto);
        $dados['Foto'] = 'uploads/users/' . $nomeFoto;
        $session->set('user_picture', $dados['Foto']);
    }

    $loginModel->update($id, $dados);

    // Atualizar sessão
    $session->set([
        'user_nome' => $nome,
        'user_email' => $email,
        'user_telefone' => $telefone,
    ]);

    // return redirect()->to('/profile?alert=successEdit&token=' . urlencode($this->gerarCodigoAleatorio(50)));
    session()->setFlashdata('alert', 'successEdit');
        return redirect()->to('/profile?&token=' . urlencode($this->gerarCodigoAleatorio(50)));
}


    private function gerarCodigoAleatorio($length = 100)
    {
        return bin2hex(random_bytes($length));
    }
    public function online()
{
    $loginModel = new \App\Models\LoginModel();
    $codigo = $this->gerarCodigoAleatorio(100); 

    // Busca todos os utilizadores online
    $utilizadoresonline = $loginModel
        ->where('online_status', 'online')
        ->findAll();

    $data = [
        'title' => 'MicroPlanner Software',
        'codigo' => $codigo,
        'utilizadoresonline' => $utilizadoresonline
    ];

    echo view('templates/header', $data);
    echo view('profile/online', $data);
    echo view('templates/footer');
}


}
