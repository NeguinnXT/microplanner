<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        MicroPlanner Software
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?></strong> Todos os direitos reservados

</footer>
</div> <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('tema/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('tema/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('tema/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('tema/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('tema/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('tema/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('tema/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- Moment.js -->
<script src="<?= base_url('tema/plugins/moment/moment.min.js') ?>"></script>
<!-- Daterangepicker -->
<script src="<?= base_url('tema/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('tema/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('tema/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('tema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('tema/dist/js/adminlte.js') ?>"></script>

<!-- Scripts personalizados -->
<script src="<?= base_url('tema/dist/js/particular/alert.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/preview.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/verificarAno.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/getFullYear.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/preventDefault.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/previewImagem.js') ?>"></script>
<script src="<?= base_url('tema/dist/js/particular/toggleDetails.js') ?>"></script>

</body>

</html>