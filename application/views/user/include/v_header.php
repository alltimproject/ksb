<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KSB | KAMPUNG SIAGA BENCANA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="<?= base_url().'assets/custome.css' ?>">
<link rel="stylesheet" href="<?= base_url().'assets/layout/styles/layout.css' ?> " type="text/css" />
<link rel="stylesheet" href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css' ?>">
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


<style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: 50%; margin: auto;}</style>
<style type="text/css">
.bg {
    background: white;
}
.row-table {
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 100%;
}
.col-table {
    display: table-cell;
    float: none;
    height: 100%;
}
.col-content {
    height: 100%;
    margin-top: 0;
    margin-bottom: 0;
}
.f1{
    color: #41464b;
    text-transform: uppercase;
}
.garis-bawah{
  width: 30%;
  height: 9px;
  background-color: grey;
  margin: 0 auto 0 auto;
}

</style>
<!-- / Homepage Specific -->
</head>
<body id="top">
<div class="wrapper col0">
  <div id="topline">
    <p>Mail: kbs@gmail.com</p>

    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="<?= base_url() ?>"><img src="<?= base_url('images/ksblogo.png')  ?> " alt=""> </a></h1>
      <p>KAMPUNG SIAGA BENCANA</p>
    </div>
    <?php if($this->session->userdata('login_peserta') == 1): ?>
    <div class="fl_right"><h1>Selamat Datang, <?= $this->session->userdata('peserta_active') ?> </h1> <a href="<?= base_url('loginpeserta/logout') ?> ">Logout</a></div>
  <?php endif ?>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="container-fluid">
  <div class="wrapper col2" >
    <div id="topbar">
      <div id="topnav">
        <ul>
          <li class="active"><a href="<?= base_url() ?> ">BERANDA</a></li>
          <li><a href="<?= base_url('hubungi/tentangkami') ?>">TENTANG KAMI</a></li>
          <li><a href="<?= base_url('berita') ?>">BERITA</a></li>

          <li><a href="#">INFORMASI KEGIATAN</a>
          <ul>
            <li><a href="<?= base_url('informasi')  ?>" style="text-decoration:none;">KEGIATAN BARU</a></li>
            <li><a href="<?= base_url('arsip') ?>">ARSIP KEGIATAN</a></li>
          </ul>
          </li>
          <?php if($this->session->userdata('login_peserta') != 1 ) : ?>
          <li><a href="<?= base_url('Loginpeserta') ?> ">LOGIN / REGISTER</a></li>
          <?php endif ?>
        </ul>
      </div>
      <div id="search">
        <form class="form-cari" method="post">
          <fieldset>
            <legend style="color:black;">Cari Berita</legend>
            <input type="text" name="cari" id="cari" placeholder="cari berita" />
            <a href="javascript:;" class="btn btn-info btn-cari">CARI</a>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
  </div>
</div>

<div id="tampil-berita">


</div>
