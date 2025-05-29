<div class="content-wrapper">
    <!-- Cabeçalho -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 font-weight-bold text-dark">
                        <i class="fas fa-envelope-open-text text-primary"></i> Mensagem
                    </h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="btn btn-outline-primary">
                        <i class="fas fa-home"></i> Voltar ao Início
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo da Mensagem -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Detalhes da Mensagem
                    </h3>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3"><i class="fas fa-tag"></i> Assunto:</dt>
                        <dd class="col-sm-9"><?= esc($mensagem['assunto']) ?></dd>

                        <dt class="col-sm-3"><i class="fas fa-user"></i> Remetente:</dt>
                        <dd class="col-sm-9"><?= esc($mensagem['remetente']) ?></dd>

                        <dt class="col-sm-3"><i class="fas fa-calendar-alt"></i> Data:</dt>
                        <dd class="col-sm-9"><?= esc($mensagem['data']) ?></dd>

                        <dt class="col-sm-3"><i class="fas fa-align-left"></i> Resumo:</dt>
                        <dd class="col-sm-9 text-justify"><?= esc($mensagem['resumo']) ?></dd>
                    </dl>
                </div>


            </div>
                            <div class="card-footer bg-white d-flex justify-content-center">
                    <a href="<?= base_url('mailbox') . '?token=' . esc($codigo) ?>" class="btn btn-secondary">
                        <i class="fas fa-inbox"></i> Voltar à Caixa
                    </a>
                </div>
        </div>
    </section>
</div>
