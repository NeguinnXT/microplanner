  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark font-weight-bold">🛍️ Gerenciar Produtos</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6 text-right">
                      <a href="<?= base_url('starter') . '?token=' . esc($codigo) ?>" class="btn btn-outline-primary"><i class="fas fa-home"></i> Voltar Início</a>
                  </div>
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
 <div class="modal fade" id="modal-novo-produto">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form action="/produtos/cadastrar" method="post">
                  <?= csrf_field() ?>
                  <div class="modal-header">
                      <h4 class="modal-title">Novo Produto</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      <div class="row">
                          <div class="col-12">
                              <div class="form-group">
                                  <label for="">Nome do Produto</label>
                                  <input type="text" class="form-control" placeholder="Digite o nome do produto" name="Nome" required>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Quantidade do Produto</label>
                                  <input type="number" min="0" placeholder="Digite quantidade do produto" class="form-control" name="Qtde" required>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Valor do Produto</label>
                                  <input type="number" step="0.01" min="0" placeholder="Digite o valor do produto" class="form-control" name="Valor" required>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Categoria do Produto</label>
                                  <select name="Categoria" class="form-control" required>
                                      <option disabled selected value="">Selecione a categoria</option>
                                      <option value="Eletrônicos">Eletrônicos</option>
                                      <option value="Roupas">Roupas</option>
                                      <option value="Alimentos">Alimentos</option>
                                      <option value="Móveis">Móveis</option>
                                      <option value="Outros">Outros</option>
                                  </select>
                              </div>
                          </div>
                          <input type="hidden" name="SKU">

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();"><i class="fas fa-save"></i> Cadastrar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class="modal fade" id="modal-editar-produto">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <form action="/produtos/editar" method="post">
                  <?= csrf_field() ?>
                  <div class="modal-header">
                      <h4 class="modal-title">Editar Produto</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-12">
                              <div class="form-group">
                                  <label for="">Nome do Produto</label>
                                  <input type="text" class="form-control" id="modal-editar-produto-Nome" name="Nome">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Quantidade do Produto</label>
                                  <input type="number" class="form-control" min="0" id="modal-editar-produto-Qtde" name="Qtde">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Valor do Produto</label>
                                  <input type="number" class="form-control" step="0.01" min="0" id="modal-editar-produto-Valor" name="Valor">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="">Categoria do Produto</label>
                                  <!-- <input type="number" class="form-control"  id="modal-editar-produto-Categoria" name="Categoria"> -->
                                  <select name="Categoria" class="form-control" id="modal-editar-produto-Categoria">
                                      <option disabled selected value="">Selecione a categoria</option>
                                      <option value="Eletrônicos">Eletrônicos</option>
                                      <option value="Roupas">Roupas</option>
                                      <option value="Alimentos">Alimentos</option>
                                      <option value="Móveis">Móveis</option>
                                      <option value="Outros">Outros</option>
                                  </select>
                              </div>
                          </div>
                          <!-- SKU será gerado automaticamente no backend -->
                          <input type="hidden" id="modal-editar-produto-SKU" name="SKU">


                          <input type="hidden" id="modal-editar-produto-id" name="id">
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

      <!-- Main content -->
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">

                              <!-- Botão de novo produto -->
                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-novo-produto">
                                  <i class="fas fa-plus-circle"></i> Novo Produto
                              </button>

                              <!-- Botão de PDF, visível apenas se houver produtos -->
                              <?php if (!empty($produtos)): ?>
                                  <a href="<?= base_url('produtos/gerarPdf') . '?token=' . esc($codigo) ?>" class="btn btn-success ml-2">
                                      <i class="fas fa-download"></i> Baixar PDF
                                  </a>
                              <?php endif; ?>

                          </div>
                      </div>
                  </div>
              </div>

              <?= view('Alerts/alertKey') ?>
              <!-- Barra de Pesquisa -->
              <div class="card">
                  <div class="card-body">
                      <form action="/produtos/index" method="get">
                          <div class="row">
                              <div class="col-md-4">
                                  <input type="text" class="form-control" name="search"
                                      placeholder="Pesquise..."
                                      value="<?= isset($_GET['search']) ? esc($_GET['search']) : ''; ?>">
                              </div>
                              <div class="col-md-2">
                                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
                                      Buscar</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-body">
                              <table class="table table-striped table-bordered">
                                  <thead>
                                      <tr>
                                          <th class="text-center">Codigo Produto</th>
                                          <th>Nome Produto</th>
                                          <th>Categoria Produto</th>
                                          <th>Quantidade Produto</th>
                                          <th>Valor Produto</th>
                                          <th class="text-center">Ações</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php if (empty($produtos)) : ?>
                                          <tr>
                                              <td colspan="100%" class="text-center">Nenhuma informação disponível no momento.</td>
                                          </tr>
                                      <?php else : ?>

                                          <?php foreach ($produtos as $prod) : ?>
                                              <tr>
                                                  <td class="text-center"><?= esc($prod['SKU']) ?></td>
                                                  <td><?= esc($prod['Nome']) ?></td>
                                                  <td><?= esc($prod['Categoria']) ?></td>
                                                  <td>
                                                      <?php if ($prod['Qtde'] == 0): ?>
                                                        <span class="badge badge-danger">Sem estoque</span>
                                                        <?php elseif ($prod['Qtde'] < 10): ?>
                                                            <span class="badge badge-warning">Estoque baixo (<?= $prod['Qtde'] ?>)</span>
                                                            <?php else: ?>
                                                                <?= $prod['Qtde'] ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><strong><?= number_format($prod['Valor'], 2, ',', '.') ?>€</strong></td>
                                                            

                                                 

                                                  <td class="text-center">
                                                      <button type="button" title="Editar Produto" class="btn btn-warning" onclick="prepararDados('<?= $prod['id'] ?>', '<?= $prod['Nome'] ?>', '<?= $prod['Qtde'] ?>', '<?= $prod['Valor'] ?>','<?= $prod['SKU'] ?>','<?= $prod['Categoria'] ?>')"><i class="fas fa-edit"></i></button>
                                                      <a href="/produtos/excluir/<?= $prod['id'] ?>"
                                                          class="btn btn-danger" title="Excluir Produto"
                                                          onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                                          <i class="fas fa-trash"></i>
                                                      </a>

                                                  </td>
                                              </tr>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                  </tbody>
                              </table>
                              <div class="card-footer clearfix d-flex justify-content-center p-2">
                                  <?= $pager->links('default', 'adminlte') ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
      function prepararDados(id, Nome, Qtde, Valor, SKU, Categoria) {
          document.getElementById('modal-editar-produto-id').value = id;
          document.getElementById('modal-editar-produto-Nome').value = Nome;
          document.getElementById('modal-editar-produto-Qtde').value = Qtde;
          document.getElementById('modal-editar-produto-Valor').value = Valor;
          document.getElementById('modal-editar-produto-SKU').value = SKU;
          document.getElementById('modal-editar-produto-Categoria').value = Categoria;

          $('#modal-editar-produto').modal('show');
      }
  </script>