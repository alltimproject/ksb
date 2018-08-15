<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $data_peserta->num_rows() ?> Peserta Kegiatan</h1><?php echo $this->session->flashdata('msg') ?>
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
                <th>NIK</th>
                <th>Nama lengkap</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Jenis Kelamin</th>
              </tr>
              <?php foreach($data_peserta->result() as $key):
                if($key->jenis_kelamin == "P"){
                  $jk = "Perempuan";
                }else{
                  $jk = "Laki - Laki";
                }
                 ?>
                <tr>
                  <td><?= $key->NIK ?></td>
                  <td><?= $key->nama_depan.' '.$key->nama_belakang ?></td>
                  <td><?= $key->email_peserta ?></td>
                  <td><?= $key->kontak ?></td>
                  <td><?= $jk ?></td>
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
