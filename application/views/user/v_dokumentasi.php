<div class="container">
  <div class="row">
    <div class="col-md-9 animated zoomIn" id="show-informasi">
      <?php foreach($detail_kegiatan->result() as $key):
        $tgl_kegiatan = new DateTime($key->tgl_kegiatan);
        $tgl_today    = new DateTime(date('Y-m-d'));
        $beda    = $tgl_kegiatan->diff($tgl_today);
       ?>
      <h2><?= $key->nama_kegiatan ?>  </h2>
      <?php if($this->session->flashdata('msg') ): ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <?= $this->session->flashdata('msg') ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="card" style="margin-top:30px;">
        <div class="card-title bg-info">
            <h4 class="text-center">Deskripsi Kegiatan</h4>
        </div>
        <br>
            <p style="justify; font-size:18px; margin-left:15px; margin-right:20px; margin-top:20px;"><?= $key->deskripsi ?></p>
      </div>

      <div class="col-md-6">
        <div class="card" style="margin-top:30px;" >
          <div class="card-title bg-info">
            <h4 class="text-center">Tempat</h4>
          </div>
            <p style="font-size:18px; margin-left:15px; margin-right:15px;" class="text-center"><?= $key->tempat ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card" style="margin-top:30px;" >
          <div class="card-title bg-info">
            <h4 class="text-center">Jam</h4>
          </div>
            <p style="font-size:18px; margin-left:15px; margin-right:15px;" class="text-center"><?= $key->jam_kegiatan ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <?php if($tgl_today <= $tgl_kegiatan){ ?>
    <div class="col-md-3" style="margin-top:30px;">
        <h3><?= $beda->days; ?> HARI LAGI </h3>
        <button type="button" class="btn btn-block btn-secondary btn-lg btn-daftar">DAFTARKAN</button>
    </div>
    <?php }else{ ?>
    <?php } ?>
  </div>
  <div class="container">
    <h2>Dokumentasi Kegiatan</h2>
    <div class="col-md-12">

      <!-- container -->
      <div class="container">
        <!-- Work -->
        <div class="row no-gutters wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
          <?php if($get_dokumentasi->num_rows() > 0 ){ ?>
          <?php foreach($get_dokumentasi->result() as $key  ): ?>
          <div class="col-md-3" style="margin-left:10px;">
            <div class="img-wrapper">
               <a href="" title="Work Deskripstion Goes Here">
                 <img src="<?= base_url('dokumentasi/'.$key->foto_kegiatan) ?>" class="img-responsive" alt="work">
               </a>
            </div>
          </div>
           <?php endforeach; ?>
         <?php }else{ ?>
            <h5>Tidak ada foto dokumentasi</h5>
         <?php } ?>

        </div>
      </div>
    </div> <!-- end content -->
    </section>
    </div>
  </div>
    <script src="<?= base_url().'assets/js/jquery.magnific-popup.min.js' ?> "></script>
    <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
    <script type="text/javascript">



    </script>
