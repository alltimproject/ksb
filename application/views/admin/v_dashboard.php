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
    <!-- Main content -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fa fa-bullhorn"></i>
          Informasi
        </h3>
      </div>
      <div class="row" style="margin-left:20px; margin-right:20px;">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-envelope-o"></i></span>

              <div class="info-box-content"> <b><?= $jumlah_validasi ?></b>
                <span class="info-box-text">peserta menunggu konfirmasi</span>
                  <span class="info-box-number"><a href="javascript:;" class="btn btn-info btn-xs lihat-validasi" style="font-size:10px">Lihat</a></span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-flag-o"></i></span>

              <div class="info-box-content"><b><?= $jumlahKeg ?></b>
                <span class="info-box-text">Kegiatan <br></span>
                <span class="info-box-number"><a href="javascript:;" class="btn btn-info btn-xs lihat-kegiatan" style="font-size:10px">Lihat</a></span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>



        </div>
        <!-- /.row -->
    </div>

    <div id="show-dashboard"></div>



    <div class="col-md-12" id="validasi-peserta"></div>
    <div class="col-md-12" id="daftar-kegiatan"></div>

    <?php if($this->session->flashdata('notifvalidasi')){ ?>
    <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h5><i class="icon fa fa-ban"></i> Alert!</h5>
       <?php echo $this->session->flashdata('notifvalidasi'); ?>
     </div>
   <?php } ?>
    <!-- /.col -->
    <!-- modal pessenger -->
     <div class="modal fade" id="ModalValidasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content" style="width:190%;">
                 <div class="modal-header">
                   <div class="col-md-12 animated zoomIn">
                     <div class="info-box">
                     <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user"></i></span>
                     <div class="info-box-content">
                       <span class="info-box-text">Detail Peserta</span>
                       <div class="row">
                         <div class="col-md-6">
                         <form method="post" action="<?= base_url('adm/dashboard/simpanValidasiPeserta') ?>">
                           <div class="form-group">
                             <label>Nama Peserta</label>
                             <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" readonly>
                           </div>
                           <div class="form-group">
                             <label>Email Peserta</label>
                             <input type="email" class="form-control" id="email_peserta" name="email_peserta" readonly>
                           </div>
                           <div class="form-group">
                             <label>Jenis Kelamin</label>
                             <input type="email" class="form-control" id="jenis_kelamin" name="" readonly>
                           </div>

                         </div>
                         <div class="col-md-6">
                           <div class="form-group">
                             <label>Alamat Peserta</label>
                             <textarea name="name" id="alamat" class="form-control" rows="3" cols="80" readonly></textarea>
                           </div>
                           <div class="form-group">
                             <label>Kontak Peserta</label>
                             <input type="email" class="form-control" id="kontak" name="" readonly>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                     <div id=""></div>
                 </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                     <h6 class="modal-title" id="myModalLabel"></h6>
                 </div>
                 <div class="modal-body">

                     <div class="text-center">
                       <input type="hidden" name="id_kegiatan" id="id-kegiatan">
                       <input type="hidden" name="nik" id="nik-peserta">
                       <input type="hidden" name="id_jadwal" id="id_jadwal">
                        <input type="submit" name="batalkan" value="BATALKAN" class="btn btn-danger btn-xs">
                       <input type="submit" name="submit" value="VALIDASI PESERTA" class="btn btn-info btn-xs">
                     </div>
                   </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
<script type="text/javascript">
  $(document).ready(function(){
    loadvalidasi();

    $('.lihat-validasi').click(function(){
      $('#daftar-kegiatan').hide('slow');
      $('#validasi-peserta').show('slow');
      loadvalidasi();
    });


    function loadvalidasi()
    {
      $.ajax({
        url:'<?= base_url()  ?>adm/dashboard/fetch_validasi',
        method:'POST',
        success:function(data){
          $('#validasi-peserta').html(data);
        }
      });
    }

    function loadKegiatan()
    {
      $.ajax({
        url:'<?= base_url() ?>adm/dashboard/fetch_kegiatan',
        method:'POST',
        success:function(data)
        {
          $('#daftar-kegiatan').html(data);
        }
      });
    }


    $('#validasi-peserta').on('click','.tombol-validasi', function(e){
      e.preventDefault();
      var kegiatan_kode = $(this).attr('data-kegiatan');
      var id_jadwal = $(this).attr('data-id_jadwal');
      var nik = $(this).attr('data-nik');

      $.ajax({
        type:'ajax',
        url:'<?= base_url() ?>adm/dashboard/showdetailPeserta/'+nik,
        async:false,
        dataType:'json',
        success:function(data){
          $('#ModalValidasi').modal('show');
          $('#nik-peserta').val(nik);
          $('#email_peserta').val(data.email_peserta);
          $('#kontak').val(data.kontak);
          $('#alamat').val(data.alamat);
          $('#jenis_kelamin').val(data.jk);
          $('#nama_peserta').val(data.depan_name);
          $('#id_jadwal').val(id_jadwal);
          $('#id-kegiatan').val(kegiatan_kode);
        }
      });
    })

    // $('#ModalValidasi').on('click', '.simpan_validasi', function(){
    //     var data = $('.form-validasi').serialize();
    //     $.ajax({
    //       type:"POST",
    //       url:'<?= base_url('adm/dashboard/simpanValidasiPeserta') ?>',
    //       data:data,
    //       success:function(data){
    //         alert(data);
    //         loadvalidasi();
    //         $('#ModalValidasi').modal('hide');
    //         window.location = '<?= base_url('adm/dashboard') ?>';
    //
    //       }
    //     });
    // });

    $('.lihat-kegiatan').click(function(){
      $('#validasi-peserta').hide('slow');
        $('#daftar-kegiatan').show('slow');
      loadKegiatan();
    });


  });
</script>
