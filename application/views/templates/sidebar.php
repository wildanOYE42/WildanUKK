<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title; ?></title>

  <!-- Custom styles for this template-->
  <link href="<?= base_url('asset/sbadmin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('asset/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/datatables/bootstrap4.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/datatables/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/swall/dist/sweetalert2.min.css'); ?>">


</head>

<body id="page-top">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success  ">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
            <?php if ($this->session->userdata('nik')) : ?>
              <a class="nav-link" href="<?= base_url('user'); ?>">
              <?php elseif ($this->session->userdata('level')) : ?>
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                <?php endif; ?>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
          </li>

          <!-- Heading -->
          <div class="sidebar-heading">
            <?php if ($this->session->userdata('level')) : ?>
            <?php elseif ($this->session->userdata('nik')) : ?>
            <?php endif; ?>
          </div>

          <?php if ($this->session->userdata('level')) : ?>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if ($this->session->userdata('level') == ('admin')) : ?>
              <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-database"></i>
                  Management
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url('boss/masyarakat'); ?>">Data Masyarakat</a>
                  <a class="dropdown-item" href="<?= base_url('boss/petugas'); ?>">Data Petugas</a>
                </div>
              </div>

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('generate '); ?>">
                  <i class="fas fa-fw fa-download"></i>
                  <span>Buat Laporan</span></a>
              </li>

            <?php endif; ?>



            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('pengaduan '); ?>">
                <i class="fas fa-fw fa-file"></i>
                <span>Data Pengaduan</span></a>
            </li>

          <?php elseif ($this->session->userdata('nik')) : ?>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('laporan'); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Laporan Pengaduan</span></a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <?php if ($this->session->userdata('level')) : ?>
              <a class="nav-link" href="<?= base_url('admin/edit'); ?>">
              <?php elseif ($this->session->userdata('nik')) : ?>
                <a class="nav-link" href="<?= base_url('user/edit'); ?>">
                <?php endif; ?>
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Edit Profile</span></a>
          </li>


          <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->