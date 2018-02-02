<body class="hold-transition skin-red-light sidebar-mini fixed">
<div class="wrapper" style="overflow: auto;">
<?php $this->load->view('template_body_header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('template_body_sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
<?php $this->load->view($page); ?>

</div>


<script src="<?php echo base_url() ?>js/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-pagination.js"></script>
<script src="<?php echo base_url() ?>js/khrsman-process.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('js') ?>/select2.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!-- <script src="<?php echo base_url() ?>/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script> -->
<script src="<?php echo base_url() ?>/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
