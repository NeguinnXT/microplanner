<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/favicon/favicon.png') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body::before {
            content: "";
            background-image: url('<?= base_url("images/bg.jpg") ?>');
            background-size: cover;
            background-position: center;
            position: fixed;
            inset: 0;
            opacity: 0.2;
            z-index: -1;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col justify-center px-4 py-8 bg-gray-100 bg-opacity-90">
    <div class="max-w-3xl w-full mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">MicroPlanner</h1>
            <p class="text-gray-600 text-lg">Crie sua conta para continuar</p>
        </div>

        <?= view('Alerts/displayAlert') ?>

        <form action="/Register/criar" method="post" id="multiStepForm" class="space-y-6 text-base bg-white bg-opacity-90 p-8 rounded-xl shadow-xl">
            <!-- PASSO 1 -->
            <div class="step" id="step-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                        <div class="relative">
                            <input type="text" name="nome" required placeholder="Digite seu Nome"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <input type="email" name="email" required placeholder="Digite seu Email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" onclick="nextStep(1)"
                        class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                        Próximo
                    </button>
                </div>
            </div>

            <!-- PASSO 2 -->
            <div class="step hidden" id="step-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Número de Pessoas na Empresa</label>
                        <select name="num_pessoas" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1-5">1 a 5</option>
                            <option value="6-20">6 a 20</option>
                            <option value="21-50">21 a 50</option>
                            <option value="51-100">51 a 100</option>
                            <option value="100+">Mais de 100</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
                        <select name="cargo" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option value="" disabled selected>Selecione seu cargo</option>
                            <option value="CEO">CEO / Fundador</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Coordenador">Coordenador</option>
                            <option value="Analista">Analista</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" onclick="prevStep(2)"
                        class="bg-gray-400 text-white py-2 px-6 rounded-lg hover:bg-gray-500 transition">Voltar</button>
                    <button type="button" onclick="nextStep(2)"
                        class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">Próximo</button>
                </div>
            </div>

            <!-- PASSO 3 -->
            <div class="step hidden" id="step-3">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                        <div class="relative">
                            <input type="text" name="telefone" required placeholder="Digite seu Telefone"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Empresa</label>
                        <div class="relative">
                            <input type="text" name="empresa" required placeholder="Digite o nome da empresa"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                        <div class="relative">
                            <input type="password" name="senha" required placeholder="Digite sua Senha"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <button type="button" onclick="prevStep(3)"
                        class="bg-gray-400 text-white py-2 px-6 rounded-lg hover:bg-gray-500 transition">Voltar</button>
                    <button type="submit"
                        class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition">Criar Conta</button>
                </div>
            </div>

            <!-- Link login -->
            <div class="text-center mt-6 text-sm text-blue-600">
                <a href="<?= base_url('login') . '?token=' . esc($codigo) ?>" class="hover:underline">Já possui uma conta</a>
            </div>
        </form>
    </div>

    <script>
        let currentStep = 1;

        function showStep(step) {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.getElementById('step-' + step).classList.remove('hidden');
        }

        function nextStep(step) {
            const currentFields = document.querySelectorAll(`#step-${step} input, #step-${step} select`);
            for (let field of currentFields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    return;
                }
            }
            currentStep++;
            showStep(currentStep);
        }

        function prevStep(step) {
            currentStep--;
            showStep(currentStep);
        }
    </script>
</body>

</html>
