<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>/img/icon_user2.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Pelayanan</a>
      </div>
    </div>
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard text-red"></i> <span>Dashboard</span></a></li>
      <!-- <li><a href="<?php echo base_url() ?>statistik"><i class="fa fa-dashboard text-red"></i> <span>Statistik</span></a></li> -->
      <li class="treeview treeview menu-open">
        <a href="#">
          <i class="fa fa-bars text-red"></i> <span>Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="display: block;">
          <li><a href="<?php echo base_url() ?>warga"><i class="fa fa-users"></i> Data Penduduk </a></li>
          <li><a href="<?php echo base_url() ?>statistik"><i class="fa fa-align-left "></i> Statistik </a></li>
          <li><a href="<?php echo base_url() ?>surat"><i class="fa fa-envelope"></i> Surat </a></li>
          <li><a href="<?php echo base_url() ?>agenda"><i class="fa fa-book"></i> Agenda Kegiatan </a></li>

        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs text-red"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <!-- <li><a href="<?php echo base_url() ?>jenis_surat"><i class="fa fa-envelope-open"></i> Setting Surat </a></li> -->
          <li><a href="<?php echo base_url() ?>config_desa"><i class="fa fa-home"></i> Setting Desa </a></li>
          <li><a href="<?php echo base_url() ?>jabatan"><i class="fa fa-id-badge "></i> Setting Jabatan </a></li>
          <li><a href="<?php echo base_url() ?>pamong"><i class="fa fa-male"></i> Setting Pamong </a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
