<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php if (session('isLoggedIn')): ?>
        <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="brand-link">
            <img src="<?= base_url('images/logo/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">MicroPlanner</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url(session()->get('user_picture') ?: 'tema/dist/default/image.png') ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= base_url('profile') . '?token=' . esc($codigo) ?>" class="d-block"><?= session('user_nome') ?></a>
                </div>
            </div>

            <?php $uri = service('uri'); ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="nav-link <?= ($uri->getSegment(1) === 'starter') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p class="text-white">Pagina Inicial</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('mailbox') . '?token=' . esc($codigo) ?>" class="nav-link <?= ($uri->getSegment(1) === 'mailbox') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p class="text-white">Mailbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('produtos') . '?token=' . esc($codigo) ?>" class="nav-link <?= ($uri->getSegment(1) === 'produtos') ? 'active' : '' ?>">
                            <!-- <i class="nav-icon fas fa-envelope"></i> -->
                            <p class="text-white">🛍️ Gerenciar Produtos</p>
                        </a>
                    </li>
                    <!-- TERMINAR SESSÃO -->
                    <li class="nav-header">TERMINAR SESSÃO</li>
                    <li class="nav-item">
                        <a href="<?= base_url('login/logout') ?>" class="nav-link text-danger">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Sair da conta</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
</aside>