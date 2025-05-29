<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title) ?></title>
  <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon/favicon.png') ?>" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Ícones -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-2">MicroPlanner</h1>
    <p class="text-center text-sm text-gray-600 mb-6">Digite a nova senha</p>

    <!-- Alertas -->
    <?= view('Alerts/displayAlert') ?>

    <!-- FORMULÁRIO -->
    <form action="/login/salvarNovaSenha" method="post" class="space-y-4">
      <input type="password" name="nova_senha"  placeholder="Nova senha"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>

      <input type="password" name="confirmar_senha" placeholder="Confirmar senha"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Salvar Nova Senha</button>

      <a href="<?= base_url('/login') . '?token=' . esc($codigo) ?>" class="block text-center text-sm text-blue-600 hover:underline">Cancelar</a>
    </form>
  </div>
</body>

</html>