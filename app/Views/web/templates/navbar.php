<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <!-- Logo -->
    <a href="#" class="logo d-flex align-items-center me-auto me-xl-0">
      <!-- Ative a linha abaixo se quiser usar uma imagem como logotipo -->
      <!-- <img src="<?= base_url('iLanding/assets/img/logo.png') ?>" alt="Logotipo"> -->
      <h1 class="sitename">MicroPlanner</h1>
    </a>

    <!-- Menu de navegação -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Início</a></li>
        <li><a href="#about">Sobre</a></li>
        <li><a href="#features">Funcionalidades</a></li>
        <li><a href="#services">Serviços</a></li>
        <li><a href="#pricing">Preços</a></li>
        <li><a href="#contact">Contato</a></li>
        <li class="dropdown">
          <a href="#"><span>Mais</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#call-to-action">Demonstração</a></li>
             <li class="dropdown"> 
              <!-- <a href="#"><span>Menu Avançado</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Opção 1</a></li>
                <li><a href="#">Opção 2</a></li>
                <li><a href="#">Opção 3</a></li>
                <li><a href="#">Opção 4</a></li>
                <li><a href="#">Opção 5</a></li>
              </ul> -->
            </li> 
            <!-- <li><a href="#contact">Contato</a></li> -->
            <!-- <li><a href="#call-to-action">Chamada para Ação</a></li> -->
            <li><a href="#faq">Perguntas Frequentes</a></li>
            <!-- <li><a href="#">Outra Opção</a></li> -->
          </ul>
        </li>
        
      </ul>

      <!-- Ícone de menu para dispositivos móveis -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Botão de login -->
    <a class="btn-getstarted" href="<?= base_url('login') ?>">Iniciar Sessão</a>

  </div>
</header>
