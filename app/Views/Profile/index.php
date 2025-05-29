<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                   <h1 class="m-0 text-dark font-weight-bold"> Perfil do Utilizador</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="btn btn-outline-primary">
                        <i class="fas fa-home"></i> Voltar Início
                    </a>
                </div>
            </div>
            
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
             <!-- Alertas -->
    <?= view('Alerts/alertKey') ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#info" data-toggle="tab">
                                        <i class="fas fa-user"></i> Informações
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                        <i class="fas fa-cog"></i> Configurações
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- Aba INFORMAÇÕES -->
                                <div class="tab-pane active" id="info">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body box-profile text-center">
                                                    <img class="profile-user-img img-fluid img-circle mb-3"
                                                         src="<?= base_url(session()->get('user_picture') ?: 'tema/dist/default/image.png') ?>"
                                                         alt="Imagem do perfil">
                                                    <h3 class="profile-username"><?= esc(session('user_nome')) ?></h3>
                                                    <p class="text-muted"><?= esc(session('user_cargo')) ?></p>

                                                    <ul class="list-group list-group-unbordered mb-3 text-left">
                                                        <li class="list-group-item">
                                                            <b>Nome:</b> <span class="float-right"><?= esc(session('user_nome')) ?></span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Email:</b> <span class="float-right"><?= esc(session('user_email')) ?></span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Telefone:</b> <span class="float-right"><?= esc(session('user_telefone')) ?></span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Cargo:</b> <span class="float-right"><?= esc(session('user_cargo')) ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Aba CONFIGURAÇÕES -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" method="post" action="<?= base_url('profile/atualizar') ?>" enctype="multipart/form-data">
                                        <?= csrf_field() ?>

                                        <div class="form-group row">
                                            <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputNome" name="nome" value="<?= esc(session('user_nome')) ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="email" value="<?= esc(session('user_email')) ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputTelefone" name="telefone" value="<?= esc(session('user_telefone')) ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto de Perfil</label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputFoto" name="foto" accept="image/*" onchange="previewFoto(this)">
                                                    <label class="custom-file-label" for="inputFoto">Escolher imagem</label>
                                                </div>
                                                <div class="mt-3">
                                                    <img id="preview" src="<?= base_url(session()->get('user_picture') ?: 'tema/dist/default/image.png') ?>"
                                                         class="img-thumbnail" width="120" alt="Preview">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save"></i> Salvar Alterações
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
