<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1><?php echo $this->session->flashdata('msg') ?>
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

    <div class="container">
       <!-- Small boxes (Stat box) -->
       <div class="row">
         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3><?= $jumlah_data; ?></h3>
               <p>Menunggu validasi</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
           </div>
         </div>

         <div class="col-lg-3 col-6">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <h3><?= $jumlah_kegiatan; ?></h3>
               <p>Kegiatan</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
           </div>
         </div>

       </div>


    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">

            </div>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th style="font-size:12px;" width="20px;">No</th>
                  <th style="font-size:12px;">Nama Kegiatan</th>
                  <th style="font-size:12px;">Tgl Kegiatan</th>
                  <th style="font-size:12px;">Jam kegiatan</th>
                  <th style="font-size:12px;">Tempat</th>
                  <th style="font-size:12px;" width="30%;">VALIDASI</th>
                </tr>
              </thead>
              <tbody>
                <?php if($data_validasi->num_rows() > 0 ){ ?>
                <?php $no = 1; foreach($data_validasi->result() as $key): ?>
                  <tr>
                    <td><?= $no++ ?> </td>
                    <td><?= $key->nama_kegiatan  ?></td>
                    <td><?= $key->tgl_kegiatan ?></td>
                    <td><?= $key->jam_kegiatan ?></td>
                    <td><?= $key->tempat ?></td>
                    <td>
                      <a href="<?= base_url('ketua/home/konfirmasi_kegiatan/'.$key->id_kegiatan) ?> " class="btn btn-success" onclick="return confirm('anda ingin konfirmasi kegiatan ini ?')">KONFIRMASI</a>
                      <a href="<?= base_url('ketua/home/batal_kegiatan/'.$key->id_kegiatan) ?>" class="btn btn-danger" onclick="return confirm('anda tidak menyetujui kegiatan ini')">TIDAK SETUJU</a>

                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php }else{ ?>
                <tr>
                  <td colspan="6" class="text-center"><h5>Tidak ada Kegiatan yang di validasi</h5> </td>
                </tr>

              <?php } ?>
              </tbody>
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
