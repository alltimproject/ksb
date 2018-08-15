
<div class="container">
  <!-- Home -->
  <div class="container">
  <section id="home">
    <div id="home-cover" class="bg-parallax animated fadeIn" style="background-image: url('images/bg.jpg');">
      <div id="home-content-box">
        <div id="home-content-box-inner">

          <div id="home-heading" class="animated zoomIn" >
            <h3><i>Arsip Kegiatan</i></h3> <br> <h5 class="sub2"> </h5>
          </div>
          <div id="home-btn" class="animated zoomIn">
            <a class="btn btn-lg btn-general btn-white" href="#services" role="button" title="View Our Work"></a>
          </div>

        </div>
      </div>
    </div>
  </section>
  </div>

  <div class="col-md-12" style="margin-top:20px;">
  <div class="card">
  <div class="card-header no-border bg-info">
    <h1 class="card-title">INFORMASI KEGIATAN</h1>
    <div class="card-tools">
    </div>
  </div>
  <div class="card-body p-0" id="show-informasi">
    <table class="table table-striped table-valign-middle">
      <thead>
      <tr>
        <th width="20%;">Nama Kegiatan</th>
        <th width="15%;">Tanggal Kegiatan</th>
        <th>Deskripsi Kegiatan</th>
        <th>Opsi</th>
      </tr>
    </thead>
      <tbody>
      <?php foreach($data_kegiatan as $key):
        $tgl_kegiatan = new DateTime($key->tgl_kegiatan);
        $tgl_today    = new DateTime(date('Y-m-d'));
        $beda    = $tgl_kegiatan->diff($tgl_today);
        if($tgl_today >= $tgl_kegiatan){
       ?>
      <tr>
        <td><?= $key->nama_kegiatan ?></td>
        <td>
          <?php
         echo tanggal_indo($key->tgl_kegiatan).'<br>';
         echo '- '.$beda->days.' Hari ';
           ?>
        </td>
        <td><?= $key->deskripsi ?></td>
        <td>
          <a href="<?= base_url('arsip/dokumentasi_keg/'.$key->id_kegiatan) ?> " class="btn btn-info">LIHAT DOKUMENTASI</a>
         </td>
      </tr>
    <?php }else{ ?>

    <?php } ?>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<!-- /.card -->
  </div>

</div>
