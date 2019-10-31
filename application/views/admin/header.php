<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="<?= base_url('admin/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/admin/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Langsung Enak</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($this->session->userdata('level')=='SPV') {?>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin/dashboard');?>" class="nav-link <?php echo $page=='dashboard'?'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link <?php echo $page=='pesanan'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pesanan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link <?php echo $page=='produk'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/data_user');?>" class="nav-link <?php echo $page=='register'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Register
              </p>
            </a>
          </li>
          <?php }else if($this->session->userdata('level')=='PRODUKSI'){ ?>
          <li class="nav-item">
            <a href="<?= base_url('admin/data_user');?>" class="nav-link <?php echo $page=='register'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Rencana Produksi
              </p>
            </a>
          </li>
          <?php }else{?>
            <li class="nav-item">
            <a href="<?= base_url('admin/data_user');?>" class="nav-link <?php echo $page=='register'?'active':''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Jadwal Pengantaran
              </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
