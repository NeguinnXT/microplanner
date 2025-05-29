
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Utilizadores online</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="btn btn-outline-primary">
                        <i class="fas fa-home"></i> Voltar ao Início
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    
    <section class="content">
        <div class="container-fluid">
            <?php if (!empty($utilizadoresonline)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead">
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <!-- <th>Email</th> -->
                                <!-- <th>Telefone</th> -->
                                <th>Cargo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($utilizadoresonline as $user) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= base_url($user['Foto']) ?>" alt="Foto" width="50" height="50" class="rounded-circle">
                                    </td>
                                    <td><?= esc($user['Nome']) ?></td>
                                    <!-- <td><?= esc($user['Email']) ?></td> -->
                                    <!-- <td><?= esc($user['Telefone']) ?></td> -->
                                    <td><?= esc($user['Cargo']) ?></td>
                                    <td><span class="badge badge-success">online</span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <div class="alert alert-warning">Nenhum utilizador online no momento.</div>
            <?php endif; ?>
        </div>
    </section>
</div>
