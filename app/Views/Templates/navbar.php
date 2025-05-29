<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?= base_url('profile') . '?token=' . esc($codigo) ?>" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="<?= base_url(session()->get('user_picture') ?: 'tema/dist/default/image.png') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <?= session()->get('user_nome') ?>
                                <span class="float-right text-sm text-muted"><i class="fas fa-user"></i></span>
                            </h3>
                            <p><?= ucfirst(session()->get('user_cargo')) ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand"></i>
            </a>
        </li>

        
        <?php
        $notificacoesModel = new \App\Models\NotificacoesModel();
        $userId = session()->get('user_id');
        $notificacoes = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('lida', 0)
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->findAll();

        $totalNaoLidas = $notificacoesModel
            ->where('destinatario_id', $userId)
            ->where('lida', 0)
            ->countAllResults();
        ?>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <?php if ($totalNaoLidas > 0): ?>
                    <span class="badge badge-warning navbar-badge"><?= $totalNaoLidas ?></span>
                <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= $totalNaoLidas ?> Notificações</span>
                <div class="dropdown-divider"></div>
                <?php if (!empty($notificacoes)): ?>
                    <?php foreach ($notificacoes as $n): ?>
                        <a href="<?= base_url('Mailbox/lerNotificacao/' . $n['id']) ?>"
                            class="dropdown-item <?= $n['lida'] ? 'text-muted' : 'font-weight-bold' ?>">
                            <i class="fas fa-envelope mr-2"></i> <?= esc($n['assunto']) ?>
                            <span class="float-right text-muted text-sm"><?= esc($n['data']) ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="dropdown-item text-muted">Sem novas notificações</span>
                    <div class="dropdown-divider"></div>
                <?php endif; ?>
                <a href="<?= base_url('mailbox') ?>" class="dropdown-item dropdown-footer">Ver todas notificações</a>
                
            </div>
        </li>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/login/logout') ?>" role="button">
                    Sair
                </a>
            </li>
        </ul>
    </nav>