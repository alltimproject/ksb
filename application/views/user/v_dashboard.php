
<!-- ####################################################################################################### -->
<div id="dashboard">
  <div class="container-fluid">

  <div class="container-fluid">
  <br>
  <div id="WJSlider" class="carousel slide" data-ride="carousel" style="background-image: url('cover/cover.png');">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#WJSlider" data-slide-to="0" class="active"></li>
      <li data-target="#WJSlider" data-slide-to="1"></li>
      <li data-target="#WJSlider" data-slide-to="2"></li>
      <li data-target="#WJSlider" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner animated zoomIn  " role="listbox">

      <div class="item active">
        <img src="<?= base_url('images/berita1.jpg') ?>" alt="slide1" width="460" height="345">
        <div class="carousel-caption">
          <h3>Judul Gambar 1</h3>
          <p>Ini adalah deskripsi singkat dari judul gambar yang pertama.</p>
        </div>
      </div>

      <div class="item">
        <img src="<?= base_url('images/berita1.jpg') ?>" alt="slide2" width="460" height="345">
        <div class="carousel-caption">
          <h3>Judul Gambar 2</h3>
          <p>Ini adalah deskripsi singkat dari judul gambar yang ke dua.</p>
        </div>
      </div>

      <div class="item">
        <img src="<?= base_url('cover/bcn1.jpg') ?>" alt="slide3" width="460" height="345">
        <div class="carousel-caption">
          <h3>Bencana di Pulau J</h3>
          <p>Ini adalah deskripsi singkat dari judul gambar yang ke tiga.</p>
        </div>
      </div>

      <div class="item">
        <img src="<?= base_url('cover/bcn1.jpg') ?>" alt="slide4" width="460" height="345">
        <div class="carousel-caption">
          <h3>Judul Gambar 4</h3>
          <p>Ini adalah deskripsi singkat dari judul gambar yang ke empat.</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#WJSlider" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Kembali</span>
    </a>
    <a class="right carousel-control" href="#WJSlider" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Lanjut</span>
    </a>
  </div>
</div>

    <br class="clear" />
  </div>
</div>

</div>









<div class="wrapper">
  <div class="container">
    <h2 class="f1 text-center">Kegiatan Terbaru</h2>
    <div class="garis-bawah"> </div>
    <br>
    <?php foreach($data_kegiatan->result() as $key):
      $tgl_kegiatan = new DateTime($key->tgl_kegiatan);
      $tgl_today    = new DateTime(date('Y-m-d'));
      $beda    = $tgl_kegiatan->diff($tgl_today);
      if($tgl_today <= $tgl_kegiatan){
    ?>        <div class="col-md-6 wow animated fadeInDown">
               <!-- Widget: user widget style 1 -->
               <div class="card card-widget widget-user">
                 <!-- Add the bg color to the header using any of the bg-* classes -->
                 <div class="widget-user-header text-white"
                    style="background: url('<?= base_url('images/bg.jpg') ?>') center center;">
                   <h3 class="widget-user-username text-center"><?= tanggal_indo($key->tgl_kegiatan) ?></h3>
                   <h5 class="widget-user-desc text-center"><?= $key->nama_kegiatan ?> </h5>

                   <center style="margin-bottom:20px; color:white"><a href="<?= base_url('Informasi/lihatkegiatan/'.$key->id_kegiatan) ?>" class="text-center text-white">Daftar</a></center>
                 </div>
                 <div class="card-footer">
                   <div class="row">

                     <div class="col-sm-6 border-right">
                       <div class="description-block">
                         <h5 class="description-header"><?= $key->tempat ?></h5>
                         <span class="description-text fa fa-home fa-2x"></span>
                       </div>
                       <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                       <div class="description-block">
                         <h5 class="description-header"><?= $key->jam_kegiatan ?></h5>
                         <span class="description-text fa fa-clock-o fa-2x "></span>
                       </div>
                       <!-- /.description-block -->
                     </div>
                     <!-- /.col -->
                   </div>
                   <!-- /.row -->
                 </div>
               </div>
               <!-- /.widget-user -->
             </div>
             <!-- /.col -->
           <?php } ?>
           <?php endforeach; ?>

  </div>
</div>


<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper" style="background-image: url('images/bg222.png');">

  <div class="container">
    <h2 class="f1 text-center">BERITA BENCANA</h2>
    <div class="garis-bawah"> </div>
    <br>
  <div class="row row-table wow animated fadeInUp">
    <?php foreach($data_berita as $key): ?>
      <div class="card col-md-6 col-table">
        <div class="card-header col-content bg">
          <div class="card">
            <h4 class="text-center"><?= $key->judul_berita ?></h4>
          </div>
          <div class="">
            <center><img src="<?= base_url('images/'.$key->foto_berita)  ?>" alt="" width="190px"></center>
          </div>
          <b>Deskripsi:</b>
             <p class="card-text"><?= substr($key->deskripsi_berita , -250)?> </p>
               <a href="<?= base_url('dashboard/detailberita/'.$key->id_berita) ?> " class="btn btn-primary">Lihat Berita</a>
        </div>

      </div>
    <?php endforeach; ?>


  </div>
  </div>

      <div class="column">
        <div class="holder"><a href="#"><img src="<?= base_url().'images/donasi.png' ?> " alt="" width="250px;" /></a></div>
        <h1></h1>
      </div>

</div>


    <br class="clear" />
  </div>
</div>


<!-- ####################################################################################################### -->
