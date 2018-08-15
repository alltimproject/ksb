<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelola Berita</h1><?php echo $this->session->flashdata('msg') ?>
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
      <div class="col-md-3">
       <div class="card">
         <div class="card-header">
           <h3 class="card-title">Menu</h3>

           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
           </div>
         </div>
         <div class="card-body p-0">
           <ul class="nav nav-pills flex-column">
             <li class="nav-item active">
               <a href="javascript:;" class="nav-link tambahberita-link">
                 <i class="fa fa-inbox"></i> Tambah Berita
                 <span class="badge bg-primary float-right"></span>
               </a>
             </li>
             <li class="nav-item">
               <a href="javascript:;" class="nav-link lihatkomentar-link">
                 <i class="fa fa-envelope-o"></i> Komentar
               </a>
             </li>
           </ul>
         </div>
         <!-- /.card-body -->
       </div>
     </div>
     <!-- /.col -->
     <?php if($this->session->flashdata('msg') ): ?>
     <div class="col-md-9">
       <div class="alert alert-success">
         <?php echo $this->session->flashdata('msg')  ?>
       </div>
     </div>
   <?php endif; ?>
    <div class="col-md-12" id="berita-form">
     <div class="card">
         <div class="card-header">
           <form class="form-berita" method="post" action="<?= base_url('adm/berita/simpanberita') ?> " enctype="multipart/form-data">
             <div class="form-group">
               <label>Kode berita</label>
               <input type="text" name="kode_berita" value="<?= $kode_berita ?>" class="form-control">
             </div>
             <div class="form-group">
               <label>Judul Berita</label>
               <input type="text" class="form-control" name="judul_berita" required>
             </div>
             <div class="form-group">
               <label>Deksripsi Berita</label>
               <textarea name="deskripsi_berita" class="form-control" rows="5" cols="80" required></textarea>
             </div>
             <div class="form-group">
              <label>Pilih Foto</label>
              <input type="file" name="foto" class="form-control" required>
             </div>

             <div class="form-group">
                 <input type="submit" style="float:right;" name="submit" value="SIMPAN BERITA" class="btn btn-info">
                  <a href="javascript:;" class="btn btn-danger batal-berita">BATAL</a>
             </div>
           </form>
         </div>
       </div>
   </div>

   <div class="col-md-12" id="berita-edit">
    <div class="card">
        <div class="card-header">
          <form class="form-berita" method="post" action="<?= base_url('adm/berita/updateBerita') ?> ">
            <div class="form-group">
              <label>Kode berita</label>
              <input type="text" name="kode_berita" id="kode_berita" class="form-control" required readonly>
            </div>
            <div class="form-group">
              <label>Judul Berita</label>
              <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
            </div>
            <div class="form-group">
              <label>Deksripsi Berita</label>
              <textarea name="deskripsi_berita" class="form-control" id="deskripsi_berita" rows="5" cols="80" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" style="float:right;" name="submit" value="UPDATE" class="btn btn-warning">
                 <a href="javascript:;" class="btn btn-danger batal-edit">BATAL</a>
            </div>
          </form>
        </div>
      </div>
  </div>

   </div><!-- end row -->

   <div class="card" id="daftar-berita">
     <div class="card-header">
       Daftar Berita
     </div>
     <table class="table table-striped">
       <thead>
         <tr>
           <th>No</th>
           <th>Foto Berita</th>
           <th>Judul berita</th>
           <th>Deskripsi Berita</th>
           <th>Tanggal Berita</th>
           <th>Opsi</th>
         </tr>
       </thead>
       <tbody id="tampil-berita">
         <?php
         $no = 1;
         foreach($berita as $key): ?>
         <tr>
           <td><?= $no++ ?></td>
           <td><img src="<?= base_url('images/'.$key->foto_berita) ?>" alt="" width="150px;"> </td>
           <td><?= $key->judul_berita ?> </td>
           <td><?= $key->deskripsi_berita ?></td>
           <td><?= $key->tgl_berita ?></td>
           <td>
             <a href="javascript:;" class="btn btn-warning btn-xs btn-edit-berita" data-kode="<?= $key->id_berita ?>" data-judul="<?= $key->judul_berita ?>" data-desk="<?= $key->deskripsi_berita ?>"  ><i class="fa fa-pencil"></i></a>
             <a href="<?= base_url('adm/berita/hapusBerita/'.$key->id_berita) ?>" onclick="return confirm('anda yakin ingin mengahapus ?')" class="btn btn-danger btn-xs btn-hapus"><i class="fa fa-trash"></i></a>
           </td>
         </tr>
       <?php endforeach; ?>
       </tbody>
     </table>
   </div>

   <div id="show-komentar"></div>
   <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Konfirmasi Berita </h6>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin konfirmasi komentar ini ? </p>
        </div>
        <div class="modal-footer">
          <form class="form-validasi" method="post">
            <input type="hidden" name="id_berita" id="id_berita">
            <input type="hidden" name="email" id="email">
            <a href="javascript:;" class="btn btn-info btn-xs btn-valid">Konfirmasi komentar</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>

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

      $('#berita-edit').hide();
      $('#berita-form').hide();
      $('.show-komentar').hide();

      $('.tambahberita-link').click(function(){
          $('#berita-form').show('fadeIn');
          $('#daftar-berita').show('slow');
      });

      $('.batal-berita').click(function(){
          $('#berita-form').hide('fadeIn');

      });

      $('.lihatkomentar-link').click(function(){
          loadKomentar();
        $('#daftar-berita').hide('slow', function(){
          $('#berita-form').hide('slow');

        })
      });

      function loadKomentar()
      {
        $.ajax({
          url:'<?= base_url() ?>adm/berita/showKomentar',
          method:'POST',
          success:function(data){
            $('#show-komentar').html(data);
          }
        });
      }

      $('#show-komentar').on('click','.btn-validasi', function(){
        $('#myModal').modal('show');
       var id_berita = $(this).attr('data-id_berita');
       var email     = $(this).attr('data-email');


       $('#id_berita').val(id_berita);
       $('#email').val(email);

       });


      $(document).on('click','.btn-valid', function(){
        var data  = $('.form-validasi').serialize();

        $.ajax({
          type:'POST',
          url:'<?= base_url('adm/berita/validasi_komentar') ?>',
          data:data,
          success:function(){
            alert('berhasil');
            $('#myModal').modal('hide');
            loadKomentar();
          }
        });
      });

      $(document).on('click','.batal-edit',function(){
        window.location.href= '<?= base_url('adm/berita') ?>';
      });

      $(document).on('click', '.btn-edit-berita', function(){
        var kode = $(this).attr('data-kode');
        var judul = $(this).attr('data-judul');
        var desk  = $(this).attr('data-desk');

        $('#kode_berita').val(kode);
        $('#judul_berita').val(judul);
        $('#deskripsi_berita').val(desk);

        $('#berita-edit').show('slow');
      });







    });
  </script>
