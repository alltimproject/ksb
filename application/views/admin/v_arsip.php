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


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">

            </div>

            <table class="table table-striped table-hover">
              <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Jam Kegiatan</th>
                <th>Tempat</th>
                <th>Opsi</th>
              </tr>
              <?php foreach($get_arsip as $key): ?>

                <tr>
                  <td><?= $key->nama_kegiatan ?></td>
                  <td class="bg-danger"><?= tanggal_indo($key->tgl_kegiatan)  ?></td>
                  <td><?= $key->jam_kegiatan ?></td>
                  <td><?= $key->tempat ?></td>
                  <td>
                    <a href="<?= base_url('adm/arsip/detailarsip/'.$key->id_kegiatan)  ?>" class="btn btn-info btn-xs">Detail Arsip</a>
                  </td>
                </tr>

              <?php endforeach; ?>
            </table>


          </div>
        </div>
      </div>
    </div>












      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
