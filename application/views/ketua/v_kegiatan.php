<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Kegiatan</h1><?php echo $this->session->flashdata('msg') ?>
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

            <table class="table table-striped">
              <tr>
                <th>Nama Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Tempat Kegiatan</th>
                <th>Jam Kegiatan</th>
                <th>STATUS</th>
                <th>LIHAT PESERTA</th>
              </tr>
              <?php foreach($get_jadwal->result() as $key):
                $tgl_kegiatan = new DateTime($key->tgl_kegiatan);
                $tgl_today    = new DateTime(date('Y-m-d'));
                $beda    = $tgl_kegiatan->diff($tgl_today);

                ?>
                <tr>
                  <td><?= $key->nama_kegiatan ?></td>
                  <td><?= tanggal_indo($key->tgl_kegiatan)  ?></td>
                  <td><?= $key->tempat ?></td>
                  <td><?= $key->jam_kegiatan ?></td>
                  <td><?= $beda->days ?> HARI LAGI</td>
                  <td>
                    <a href="<?= base_url('ketua/kegiatan/lihatPeserta/'.$key->id_kegiatan) ?> " class="btn btn-info"><i class="fa fa-users"></i></a>
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
