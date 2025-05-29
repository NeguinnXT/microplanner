<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
     <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon/favicon.png') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>


<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">MicroPlanner</h1>
            <p class="text-gray-600 mt-1">Acesse sua conta para continuar</p>
        </div>
        <!-- Alertas -->
        <?= view('alerts/displayAlert') ?>
        <form action="/login/autenticar" method="post" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <input type="text" autocomplete="off" name="Email" placeholder="Digite seu Email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                <div class="relative">
                    <input type="password" autocomplete="off" name="Senha" placeholder="Digite sua Senha"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Acessar Conta
                </button>
            </div>
            <div class="flex justify-between text-sm text-blue-600">
                <a href="<?= base_url('/login/recuperar_senha') . '?token=' . esc($codigo) ?>" class="hover:underline">Esqueci minha senha</a>
                <a href="<?= base_url('register') . '?token=' . esc($codigo) ?>" class="hover:underline">Criar uma conta</a>
            </div>
            
        </form>
    </div>

</body>

</html>
