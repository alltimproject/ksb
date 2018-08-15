<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Arsip Kegiatan</h1><?php echo $this->session->flashdata('msg') ?>
          </div><!-- /.col -->
          <div id="refreshHal"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'adm/dashboard' ?>">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <?php foreach($get_detail_arsip as $key): ?>
    <div class="card">
      <div class="row">
        <div class="col-md-6">
              <?php if($this->session->flashdata('msg') ): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-ban"></i> Notifikasi!</h5>
                  <?php echo $this->session->flashdata('msg'); ?>
              </div>
              <?php endif ?>


        </div>
        <div class="col-md-6">
          <form action="<?= base_url('adm/arsip/simpanDokumentasi') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Upload Foto Dokumentasi</label>
              <input type="file" name="dok" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_kegiatan" value="<?= $key->id_kegiatan ?>">
              <input type="submit" name="submit" class="btn btn-info btn-xs" value="UPLOAD">
            </div>
          </form>
        </div>
      </div>

      <div class="card-header">
        <div class="card-title">
        </div>

        <table class="table table-striped">
          <tr>
            <th width="250px;">Nama Kegiatan</th>
            <td>: <?= $key->nama_kegiatan ?></td>
          </tr>
          <tr>
            <th>Tanggal Kegiatan</th>
            <td><?= $key->tgl_kegiatan ?></td>
          </tr>
          <tr>
            <th>Tempat Kegiatan</th>
            <td><?= $key->tempat ?> Jam <?= ' : '.$key->jam_kegiatan  ?></td>
          </tr>
          <tr>
            <th width="50px;">Deksripsi Kegiatan</th>
            <td><?= $key->deskripsi ?></td>
          </tr>

        </table>

      <?php endforeach; ?>
      </div>
    </div>


      <div class="card">
        <div class="row" style="padding-top:40px;">
          <?php if($dokumentasi->num_rows() > 0 ){ ?>
          <?php foreach ($dokumentasi->result() as $key_foto):?>
          <div class="col-md-3" style="margin-bottom:10px;">
            <img src="<?= base_url('dokumentasi/'.$key_foto->foto_kegiatan) ?> " alt="" width="250px;">
          </div>
          <?php endforeach; ?>
          <?php }else{ ?>
            <h1>Tidak ada Foto Dokumentasi </h1>
          <?php } ?>
        </div>


      </div>















      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
