<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url().'assets/font-awesome/css/font-awesome.min.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/dataTables/dataTables.bootstrap4.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/adminlte.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/blue.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/css/animate.css' ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url().'assets/css/morris.css' ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url().'assets/jquery/jquery-jvectormap-1.2.2.css' ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap3-wysihtml5.min.css' ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style media="screen">
  #note {
  position: absolute;
  z-index: 101;
  top: 0;
  left: 0;
  right: 0;
  background: #fde073;
  text-align: center;
  line-height: 2.5;
}
.cssanimations.csstransforms #close {
  display: none;
}

  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom" >
    <?php
    if($this->session->flashdata('notifadmin')):?>
    <div id="note">
    <?php echo $this->session->flashdata('notifadmin') ?>
    </div>
   <?php endif ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:rgb(75, 83, 85); color:black;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <button class="d-block showprofile"><span class="fa fa-user fa-2x "><?= $this->session->userdata('level_active') ?></span> </button>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?= base_url('adm/dashboard') ?>" class="nav-link" id="dashboard">
             <i class="nav-icon fa fa-dashboard"></i>
             <p>
               Dashboards
               <span class="badge badge-info right"></span>
             </p>
           </a>
         </li>


          <li class="nav-header">DATA</li>

          <li class="nav-item">
            <li class="nav-item">
              <a  class="nav-link" href="<?= base_url('adm/kegiatan') ?>" >
                <i class="nav-icon fa fa-circle-o"></i>
                <p>
                  DAFTAR KEGIATAN

                </p>
              </a>
            </li>

            <li class="nav-item">
              <li class="nav-item">
                <a  class="nav-link" href="<?= base_url('adm/arsip') ?>" >
                  <i class="nav-icon fa fa-circle-o"></i>
                  <p>
                    ARSIP KEGIATAN

                  </p>
                </a>
              </li>

            <li class="nav-item">
              <a  class="nav-link" href="<?= base_url('adm/peserta') ?>" >
                <i class="nav-icon fa fa-circle-o"></i>
                <p>
                  DAFTAR PESERTA

                </p>
              </a>
            </li>

            <li class="nav-item">
              <a  class="nav-link" href="<?= base_url('adm/berita')  ?>">
                <i class="nav-icon fa fa-circle-o"></i>
                <p>
                  KELOLA BERITA
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a  class="nav-link" href="<?= base_url('adm/user')  ?>">
                <i class="nav-icon fa fa-circle-o"></i>
                <p>
                  KELOLA USER
                </p>
              </a>
            </li>



              <li class="nav-header">Laporan</li>

              <li class="nav-item">
                <a  class="nav-link" href="<?= base_url('adm/laporan')  ?>">
                  <i class="nav-icon fa fa-circle-o"></i>
                  <p>
                  LAPORAN
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/logout') ?>" class="nav-link" id="dashboard">
                  <i class="nav-icon fa fa-sign"></i>
                  <p>
                    Logout
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>


              <li class="nav-item" style="padding-top:80px;">
                <li class="nav-item bg-danger">


                </li>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>
          </li>
