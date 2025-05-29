<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Breadcrumb (opcional no topo) -->
  <div class="container-fluid pt-3">
    <div class="row"></div>
  </div>

  <!-- Conteúdo centralizado -->
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="text-center">

      <!-- Logo -->
      <a href="https://colorlib.com/wp/templates/" target="_blank">
        <img src="<?= base_url('images/logo/logon.png') ?>" alt="Colorlib logo" class="img-fluid mb-4" style="max-width: 200px;">
      </a>

      <!-- Mensagem de agradecimento -->
      <h2 class="mb-3">🎉 Obrigado por utilizar nossos serviços!</h2>
      <p>Para mais informações, visite o site da <strong><a href="http://MicroPlanner" target="_blank">MicroPlanner</a></strong>.</p>

      <!-- Botões de ação -->
      <!-- <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <a href="<?= base_url('dashboard') . '?token=' . esc($codigo) ?>" class="btn btn-primary">
          <i class="fas fa-star me-1"></i> Voltar ao Site
        </a>
        <a href="<?= base_url('#contact') . '?token=' . esc($codigo) ?>" class="btn btn-success">
          <i class="fas fa-rocket me-1"></i> Ver Central de Ajuda
        </a>
      </div> -->

      <!-- Card de próximos passos -->
      <div  class="card shadow-lg border-0 p-4 mt-5 mx-auto bg-white text-dark" style="max-width: 500px; border-radius: 1rem;">
        <h5 class="mb-3">🚀 O que fazer agora?</h5>
        <ul class="list-unstyled text-start">
          <li class="mb-2">✔️ Configure seu perfil</li>
          <!-- <li class="mb-2">📈 Acompanhe seus dados no painel</li> -->
          <li class="mb-2">💬 Fale com nosso suporte se precisar</li>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- Estilo adicional -->
<style>
  .content-wrapper {
    background-color: #f4f6f9;
    padding-bottom: 2rem;
  }

  .btn i {
    vertical-align: middle;
  }

  a {
    text-decoration: none;
  }

   .card ul li::before {
    content: "•";
    color: #007bff;
    display: inline-block;
    width: 1em;
    margin-left: -1em;
  }
</style>
