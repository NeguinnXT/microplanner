

<?php
$alerts = [
   
    //** PRODUTOS **/
   
    'productCreated'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Produto cadastrado com sucesso!'],
    'productUpdated'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Produto editado com sucesso!'],
    'productDeleted'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Produto excluído com sucesso!'],
    'productNotFound'   => ['type' => 'warning', 'title' => 'Sucesso!', 'message' => 'O produto solicitado não pôde ser localizado.'],
    'notAuthorized'   => ['type' => 'warning', 'title' => 'Aviso!', 'message' => 'Você não tem permissão para realizar esta operação.'],

   
   
   
    'aceito'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Requisição Aceita com sucesso!!'],
    'successCreate'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Cadastro feito com sucesso!'],
    'CadastroProduto'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Produto cadastrado com sucesso!'],
    'sucessreturn'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Devolvido com sucesso!'],
    'notificacoesExcluidas'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Todas Notificações Excluidas!'],
    'notificacoesrestourada'   => ['type' => 'success', 'title' => 'Mensagem restaurada com sucesso!'],
    'notFoundMailBox'   => ['type' => 'warning', 'title' => 'Notificação não encontrada.'],
    'successDelete'   => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Excluído com sucesso!'],
    'successEdit'     => ['type' => 'success', 'title' => 'Sucesso!', 'message' => 'Editado com sucesso!'],
    'notFound'        => ['type' => 'warning', 'title' => 'Aviso!',   'message' => 'Não foi encontrado!'],
    'errorCamposvazio' => ['type' => 'warning', 'title' => 'Aviso!',   'message' => 'Preencha todos os campos!'],
    'errorCreate'     => ['type' => 'danger',  'title' => 'Erro!',    'message' => 'Erro ao criar o registro.'],
    'errorDelete'     => ['type' => 'danger',  'title' => 'Erro!',    'message' => 'Erro ao excluir o registro.'],
    'errorEdit'       => ['type' => 'danger',  'title' => 'Erro!',    'message' => 'Erro ao editar o registro.'],
    'unauthorized'    => ['type' => 'danger',  'title' => 'Acesso Negado!', 'message' => 'Você não tem permissão para acessar aquela área.'],
    'noauthorized'    => ['type' => 'danger',  'title' => 'Acesso Negado!', 'message' => 'Você não tem permissão'],
    'invalidToken'    => ['type' => 'warning', 'title' => 'Token Inválido!', 'message' => 'O token fornecido é inválido ou expirou.'],
    'missingFields'   => ['type' => 'warning', 'title' => 'Campos Obrigatórios!', 'message' => 'Por favor, preencha todos os campos obrigatórios.'],
    'errorNotAllowed' => ['type' => 'warning', 'title' => 'Aviso!', 'message' => 'Ação não permitida. Você não tem permissão para realizar esta operação.'],
    'errorQuantidadeIndisponivel' => ['type' => 'warning', 'title' => 'Aviso!', 'message' => 'Quantidade Indisponível.'],
    'limiteDiario'    => ['type' => 'warning', 'title' => 'Aviso!', 'message' => 'Limite de 2 requisições por dia atingido.'],
    'errorpdfemply'    => ['type' => 'warning', 'title' => 'Aviso!', 'message' => 'Sem produtos para gerar PDF.'],

];

$alertKey = session()->getFlashdata('alert');

if ($alertKey && array_key_exists($alertKey, $alerts)) :
    $alert = $alerts[$alertKey];
?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-<?= esc($alert['type']) ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-<?= $alert['type'] === 'danger' ? 'times' : 'check' ?>"></i> <?= esc($alert['title']) ?></h5>
                <?= esc($alert['message']) ?>
            </div>
        </div>
    </div>
<?php endif; ?>
