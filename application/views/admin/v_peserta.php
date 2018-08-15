<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Peserta</h1><?php echo $this->session->flashdata('msg') ?>
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
    <!-- Main content -->
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $get_peserta->num_rows() ?></h3>

                <p>Total Peserta</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h3>Daftar Peserta</h3>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($get_peserta->result() as $key ):
            if($key->jenis_kelamin == "L"){
              $jk = 'Laki - Laki';
            }else{
              $jk = 'Perempuan';
            }
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $key->NIK ?></td>
            <td><?= $key->nama_depan.' ',$key->nama_belakang ?></td>
            <td><?= $key->alamat ?></td>
            <td><?= $key->kontak ?></td>
            <td><?= $jk ?></td>
            <td><?= tanggal_indo($key->tgl_lahir) ?></td>
            <td>
              <a href="<?= base_url('adm/peserta/hapusPeserta/'.$key->NIK) ?> " onclick="return confirm('apakah anda yakin ingin mengahapus ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>


    </div>












      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
