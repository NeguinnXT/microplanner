<div class="content-wrapper">
    <!-- Cabeçalho -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Olá, <?= session('user_nome') ?> 👋</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Alertas -->
    <?= view('Alerts/alertKey') ?>
    <!-- Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                    <?php if (in_array(session()->get('user_cargo'), ['Programador'])) : ?>
                    <!-- Cartão Utilizadores Registrados -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="small-box bg-info rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <div class="inner p-4">
                                <h3 class="text-white font-semibold text-2xl"><?= isset($totalUtilizador) ? $totalUtilizador : 0 ?> <i class="fas fa-users"></i></h3>
                                <p class="text-white">Utilizadores Registrados</p>
                            </div>
                            <div class="icon absolute bottom-2 right-2 opacity-50">
                                <i class="fas fa-users-cog fa-3x"></i>
                            </div>
                            <a href="<?= base_url('profile') . '?token=' . esc($codigo) ?>" class="small-box-footer bg-info hover:bg-blue-600 text-white py-2 px-4 rounded-b-lg flex items-center justify-between">
                                Mais Informações <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Cartão Utilizadores Online -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="small-box bg-success rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <div class="inner p-4">
                                <h3 class="text-white font-semibold text-2xl"><?= isset($totalonline) ? $totalonline : 0 ?> <i class="fas fa-user"></i></h3>
                                <p class="text-white">Utilizadores Online</p>
                            </div>
                            <div class="icon absolute bottom-2 right-2 opacity-50">
                                <i class="fas fa-user-check fa-3x"></i>
                            </div>
                            <a href="<?= base_url('profile/online') . '?token=' . esc($codigo) ?>" class="small-box-footer bg-success hover:bg-green-600 text-white py-2 px-4 rounded-b-lg flex items-center justify-between">
                                Ver online <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Cartão Total Produtos -->
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="small-box bg-primary rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <div class="inner p-4">
                                <h3 class="text-white font-semibold text-2xl"><?= isset($totalProdutos) ? $totalProdutos : 0 ?>🛍️</h3>
                                <p class="text-white">Total Produtos</p>
                            </div>
                            <div class="icon absolute bottom-2 right-2 opacity-50">
                                <i class="fas fa-user-check fa-3x"></i>
                            </div>
                            <a href="<?= base_url('produtos') . '?token=' . esc($codigo) ?>" class="small-box-footer bg-primary hover:bg-green-600 text-white py-2 px-4 rounded-b-lg flex items-center justify-between">
                                Mais Informações <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
