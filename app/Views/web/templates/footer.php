 <footer id="footer" class="footer">

   <div class="container footer-top">
     <div class="row gy-4">
       <div class="col-lg-4 col-md-6 footer-about">
         <a href="#" class="logo d-flex align-items-center">
           <span class="sitename">MicroPlanner</span>
         </a>
         <div class="footer-contact pt-3">
           <p>A108 Adam Street</p>
           <p>New York, NY 535022</p>
           <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
           <!-- <p>&copy; <?= date('Y') ?> <strong class="px-1 sitename">MicroPlanner</strong>. Todos os direitos reservados.</p> -->

         </div>
         <div class="social-links d-flex mt-4">
           <a href=""><i class="bi bi-twitter-x"></i></a>
           <a href=""><i class="bi bi-facebook"></i></a>
           <a href=""><i class="bi bi-instagram"></i></a>
           <a href=""><i class="bi bi-linkedin"></i></a>
         </div>
       </div>

       <div class="col-lg-2 col-md-3 footer-links">
         <h4>Useful Links</h4>
         <ul>
           <li><a href="#">Home</a></li>
           <li><a href="#">About us</a></li>
           <li><a href="#">Services</a></li>
           <li><a href="#">Terms of service</a></li>
           <li><a href="#">Privacy policy</a></li>
         </ul>
       </div>

       <div class="col-lg-2 col-md-3 footer-links">
         <h4>Serviços</h4>
         <ul>
           <li><a href="#">Consultoria Empresarial</a></li>
           <li><a href="#">Gestão de Projetos</a></li>
           <li><a href="#">Planejamento Estratégico</a></li>
           <li><a href="#">Marketing Digital</a></li>
           <li><a href="#">Design Gráfico</a></li>
         </ul>
       </div>


       <div class="col-lg-2 col-md-3 footer-links">
         <h4>Ajuda</h4>
         <ul>
           <li><a href="#">FAQ</a></li>
           <li><a href="#">Suporte</a></li>
           <li><a href="#">Central de Ajuda</a></li>
           <li><a href="#">Como funciona</a></li>
           <li><a href="#">Contato</a></li>
         </ul>
       </div>

       <div class="col-lg-2 col-md-3 footer-links">
         <h4>Empresa</h4>
         <ul>
           <li><a href="#">Quem Somos</a></li>
           <li><a href="#">Blog</a></li>
           <li><a href="#">Carreiras</a></li>
           <li><a href="#">Parcerias</a></li>
           <li><a href="#">Documentação</a></li>
         </ul>
       </div>


     </div>
   </div>

  <div class="container copyright text-center mt-4">
  <p>© <span id="current-year"></span> <strong class="px-1 sitename">MicroPlanner</strong> — Todos os direitos reservados</p>
</div>

<script>
  document.getElementById("current-year").textContent = new Date().getFullYear();
</script>


 </footer>

 <!-- Scroll Top -->
 <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="<?= base_url('iLanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
 <script src="<?= base_url('iLanding/assets/vendor/php-email-form/validate.js') ?>"></script>
 <script src="<?= base_url('iLanding/assets/vendor/aos/aos.js') ?>"></script>
 <script src="<?= base_url('iLanding/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
 <script src="<?= base_url('iLanding/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
 <script src="<?= base_url('iLanding/assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>

 <!-- Main JS File -->
 <script src="<?= base_url('iLanding/assets/js/main.js') ?>"></script>

 </body>

 </html>