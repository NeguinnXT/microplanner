<?php
$messages = [
    'errorCamposEmply' => ['type' => 'yellow-500', 'msg' => 'Preencha todos os campos.', 'icon' => 'exclamation'],
    'errorUser' => ['type' => 'red-500', 'msg' => 'Utilizador não encontrado.', 'icon' => 'user-slash'],
    'errorLogin' => ['type' => 'yellow-500', 'msg' => 'Erro no login, Tenta novamente!', 'icon' => 'exclamation'],
    'errorPassword' => ['type' => 'red-500', 'msg' => 'Senha incorreta.', 'icon' => 'lock'],
    'errorUpload' => ['type' => 'red-500', 'msg' => 'Erro ao enviar a foto.', 'icon' => 'upload'],
    'successEditProfile' => ['type' => 'green-500', 'msg' => 'Perfil atualizado com sucesso!', 'icon' => 'check'],
    'contaCriada' => ['type' => 'green-500', 'msg' => 'Conta criada com sucesso!', 'icon' => 'check'],
    'senhaAlterada' => ['type' => 'green-500', 'msg' => 'Senha alterada com sucesso!', 'icon' => 'check'],
    'errorCodigo' => ['type' => 'red-500', 'msg' => 'Código inválido ou expirado.', 'icon' => 'user-slash'],
    'errorEmail' => ['type' => 'red-500', 'msg' => 'E-mail não encontrado.', 'icon' => 'user-slash'],
    'senhaFraca' => ['type' => 'red-500', 'msg' => 'Senha muito curta. Use pelo menos 6 caracteres.', 'icon' => 'exclamation-circle'],
    'errorSenha' => ['type' => 'red-500', 'msg' => 'As senhas não coincidem.', 'icon' => 'exclamation-circle'],
    'errorPermissao' => ['type' => 'red-500', 'msg' => 'Sem permissão.', 'icon' => 'exclamation-circle'],
    'telefoneInvalido' => ['type' => 'red-500', 'msg' => 'Este telefone já está cadastrado.', 'icon' => 'phone'],
    'erroSessao' => ['type' => 'red-500', 'msg' => 'Sessão expirada. Tente novamente.', 'icon' => 'exclamation-circle'],
    'errorCampos' => ['type' => 'yellow-500', 'msg' => 'Todos os campos são obrigatórios.', 'icon' => 'exclamation-circle'],
    'nomeInvalido' => ['type' => 'red-500', 'msg' => 'Nome muito curto. Use pelo menos 5 caracteres.', 'icon' => 'user'],
    'emailInvalido' => ['type' => 'red-500', 'msg' => 'E-mail inválido.', 'icon' => 'envelope'],
    'senhaInvalida' => ['type' => 'red-500', 'msg' => 'Senha muito curta. Use pelo menos 6 caracteres.', 'icon' => 'lock'],
    'emailExistente' => ['type' => 'red-500', 'msg' => 'Este e-mail já está cadastrado.', 'icon' => 'envelope'],
    'telefoneExistente' => ['type' => 'red-500', 'msg' => 'Este telefone já está cadastrado.', 'icon' => 'phone'],
    'limiteTotal' => ['type' => 'red-500', 'msg' => 'Limite máximo de contas atingido.', 'icon' => 'ban'],
    'tentativas-excedidas' => ['type' => 'red-500', 'msg' => 'Limite máximo de tentativas excedido. Bloqueio de 30 minutos.', 'icon' => 'ban'],
    'limiteIP' => ['type' => 'red-500', 'msg' => 'Limite de contas criadas por este IP foi atingido.', 'icon' => 'globe'],
    'erroConexaoDB' => ['type' => 'red-500', 'msg' => 'Erro de conexão com o banco de dados. Tente novamente mais tarde.', 'icon' => 'database'],
];

// Simula array de mensagens (para múltiplos toasts) – você pode usar vários flashdata
$alertKeys = session()->getFlashdata('alerts'); // espera um array de chaves como: ['errorLogin', 'emailInvalido']
if (!is_array($alertKeys)) {
    $alertKeys = [session()->getFlashdata('alert')]; // fallback para 1 única mensagem
}

function displayToasts($alertKeys, $messages)
{
    echo "<div id='toast-container' class='fixed top-5 right-5 z-50 space-y-4 max-w-sm'>";

    foreach ($alertKeys as $alertKey) {
        if (isset($messages[$alertKey])) {
            $type = $messages[$alertKey]['type'];
            $msg = $messages[$alertKey]['msg'];
            $icon = $messages[$alertKey]['icon'];

            echo "
            <div class='toast flex items-center px-5 py-4 text-white bg-{$type} rounded-lg shadow-lg animate-slide-in'>
                <i class='fas fa-{$icon} text-xl mr-4'></i>
                <span class='text-base font-medium flex-1'>" . esc($msg) . "</span>
                <button onclick='this.parentElement.remove()' class='ml-4 text-white hover:text-gray-200 focus:outline-none text-lg'>
                    <i class='fas fa-times'></i>
                </button>
            </div>
            ";
        }
    }

    echo "</div>";

    echo "
    <style>
        @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .animate-slide-in {
            animation: slide-in 0.5s ease-out forwards;
        }
    </style>

    <script>
        document.querySelectorAll('.toast').forEach(toast => {
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }, 5000);
        });
    </script>
    ";
}

if ($alertKeys && is_array($alertKeys)) {
    displayToasts($alertKeys, $messages);
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
