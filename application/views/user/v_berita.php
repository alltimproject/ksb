<div id="halamanBerita">
<div class="container">
  <div class="container">
  <section id="home">
    <div id="home-cover" class="bg-parallax animated fadeIn" style="background-image: url('images/bg.jpg');">
      <div id="home-content-box">
        <div id="home-content-box-inner">

          <div id="home-heading" class="animated zoomIn" >
            <h3><i>Berita Bencana</i></h3> <br> <h5 class="sub2"> </h5>
          </div>
          <div id="home-btn" class="animated zoomIn">
            <a class="btn btn-lg btn-general btn-white" href="#services" role="button" title="View Our Work"></a>
          </div>

        </div>
      </div>
    </div>
  </section>
  </div>




  <div class="row animated zoomIn">
<?php foreach($get_berita->result() as $key ): ?>
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="image view view-first">
           <img style="width: 100%; display: block;" src="<?= base_url('images/'.$key->foto_berita) ?>" alt="image" />
          <div class="mask">
            <h4 class="text-info text-center"><b><?= $key->judul_berita ?></b></h4>

            <h5 class="text-center"><?= tanggal_indo(date('Y-m-d', strtotime($key->tgl_berita))) ?> </h5>
            <div class="tools tools-bottom text-center">
              <a href="<?= base_url('dashboard/detailberita/'.$key->id_berita) ?>" class="btn btn-info btn-xs">Lihat berita</a>
            </div>
          </div>
        </div>

      </div>
    </div>
<?php endforeach ?>




  </div>


</div>

</div>
