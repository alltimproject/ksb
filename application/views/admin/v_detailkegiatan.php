<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail Kegiatan</h1><?php echo $this->session->flashdata('msg') ?>
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

    <?php foreach($jadwal_keg->result() as $key): ?>
    <div class="row">
      <div class="col-md-12">
        <div class="thumbnail">
          <div class="image view view-first">
            <div class="mask">
              <h4 class="text-info text-center"><b><?= $key->nama_kegiatan ?></b></h4>

              <h5 class="text-center"><?= tanggal_indo($key->tgl_kegiatan) ?></h5>
              <div class="tools tools-bottom text-center">

              </div>
            </div>
          </div>
          <div class="caption text-center">
            <h3><?= $key->jam_kegiatan ?>, <?= $key->tempat  ?> </h3>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
         <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $getPeserta->num_rows(); ?></h3>

                  <p>Peserta dalam kegiatan ini </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
          </div>
  <div class="row" style="margin-top:50px;">
               <div class="col-md-12 col-sm-6 col-xs-12">
                 <div class="card">
                   <div class="card-header">
                     <h4 class="text-center">Daftar Peserta <small></small></h4>

                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                     <table class="table">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Nama lengkap</th>
                           <th>Email Peserta</th>
                           <th>Jenis Kelamin</th>
                           <th>Kontak</th>
                           <th>Status Konfirmasi</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php if($getPeserta->num_rows() > 0 ){ ?>
                         <?php $no = 1; foreach($getPeserta->result() as $key):
                           if($key->status_informasi == "menunggu"){
                             $status = "Menunggu konfirmasi dari admin";
                             $td     = '';
                           }else if($key->status_informasi == "proses"){
                             $status = "Belum ada konfirmasi kehadiran dari peserta";
                             $td     = '';
                           }else if($key->status_informasi == "konfirmasi"){
                             $status = "Di konfirmasi oleh peserta";
                             $td     = 'bg-success';
                           }

                           if($key->jenis_kelamin == 'L'){
                             $jk = 'Laki - Laki';
                           }else{
                             $jk = 'Perempuan';
                           }
                           ?>
                         <tr>
                           <th scope="row"><?= $no++ ?> </th>
                           <td><?= $key->nama_depan.' '.$key->nama_belakang ?></td>
                           <td><?= $key->email_peserta ?></td>
                           <td><?= $jk ?> </td>
                           <td><?= $key->kontak ?></td>
                           <td class="<?= $td  ?>"><?= $status ?></td>
                         </tr>
                       <?php endforeach; ?>
                     <?php }else{ ?>
                          <tr>
                            <td colspan="7" class="text-center"> <b>Tidak ada peserta</b> </td>
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
