    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark font-weight-bold">✉️ Caixa de entrada</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="btn btn-outline-primary"><i class="fas fa-home"></i> Voltar Início</a>
                        
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
        <?= view('Alerts/alertKey') ?>
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-3">
                <a href="#" class="btn btn-primary w-100 mb-3">Pastas</a>
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url('mailbox') . '?token=' . esc($codigo) ?>"
                                   class="nav-link d-flex justify-content-between align-items-center <?= uri_string() === 'mailbox' ? 'active' : '' ?>">
                                    <span><i class="fas fa-inbox"></i> Correio</span>
                                    <?php if ($totalNaoLidas > 0): ?>
                                        <span class="badge bg-primary"><?= $totalNaoLidas ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('mailbox/enviados') . '?token=' . esc($codigo) ?>"
                                   class="nav-link <?= uri_string() === 'mailbox/enviados' ? 'active' : '' ?>">
                                    <i class="far fa-envelope"></i> Enviados
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('mailbox/lixeira') . '?token=' . esc($codigo) ?>"
                                   class="nav-link d-flex justify-content-between align-items-center <?= uri_string() === 'mailbox/lixeira' ? 'active' : '' ?>">
                                    <span><i class="far fa-trash-alt"></i> Lixeira</span>
                                    <?php if ($totalNaLixeira > 0): ?>
                                        <span class="badge bg-primary"><?= $totalNaLixeira ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Conteúdo principal -->
            <div class="col-lg-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0"><i class="fas fa-envelope-open-text"></i> Mensagens</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover align-middle mb-0">
                                <tbody>
                                    <?php if (!empty($mensagens)): ?>
                                        <?php foreach ($mensagens as $i => $mensagem): ?>
                                            <tr>
                                                <td style="width: 40px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="check<?= $i ?>">
                                                    </div>
                                                </td>
                                                <td class="text-warning" style="width: 30px;"><i class="fas fa-star"></i></td>
                                                <td>
                                                    <a href="<?= base_url('mailbox/lerNotificacao/' . $mensagem['id']) . '?token=' . esc($codigo) ?>">
                                                        <strong><?= esc($mensagem['remetente']) ?></strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('mailbox/lerNotificacao/' . $mensagem['id']) . '?token=' . esc($codigo) ?>">
                                                        <?= esc($mensagem['assunto']) ?>
                                                    </a>
                                                </td>
                                                <td class="text-muted" style="white-space: nowrap;"><?= esc($mensagem['data']) ?></td>
                                                <td class="text-end" style="width: 60px;">
                                                    <form method="post" action="<?= base_url('mailbox/excluir/' . $mensagem['id']) ?>" onsubmit="return confirm('Tem certeza que deseja excluir esta mensagem?');">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Nenhuma mensagem encontrada na caixa de entrada.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>