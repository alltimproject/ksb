<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kegiatan</h1><?php echo $this->session->flashdata('msg') ?>
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
             <a href="javascript:;" class="nav-link tambahjadwal-link">
               <i class="fa fa-inbox"></i> Tambah Jadwal Kegiatan
               <span class="badge bg-primary float-right"></span>
             </a>
           </li>
           <li class="nav-item">
             <a href="javascript:;" class="nav-link tambahkegiatan-link">
               <i class="fa fa-envelope-o"></i> Tambah Kegiatan
             </a>
           </li>
         </ul>
       </div>
       <!-- /.card-body -->
     </div>

   </div>
   <!-- /.col -->

        <div class="col-lg-3 col-6" id="show-box-kegiatan"></div>
        <div class="col-lg-3 col-6" id="show-box-kegiatan2"></div>
        </div>

        <div class="card" id="form-jadwal-kegiatan">
          <div class="card-title"></div>

          <form method="post" class="form-kegiatan" style="margin-left:20px; margin-right:20px; padding-top:20px;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kode Jadwal </label>
                  <input type="text" name="kode_jadwal" value="<?= $kode_jadwal  ?> " id="kode_jadwal" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
                </div>
                <div class="form-group">
                  <label>Jam Kegiatan</label>
                  <input type="text" class="form-control" name="jam_kegiatan" id="jam_kegiatan" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Kegiatan</label>
                  <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan" required>
                </div>
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" class="form-control" name="tempat_kegiatan" id="tempat_kegiatan" required>
                </div>
              </div>

              <div class="form-group">
                  <a href="javascript:;" class="btn btn-info simpan-jadwal">SIMPAN</a>
                  <a href="javascript:;" class="btn btn-warning update-jadwal">UPDATE</a>
                  <a href="javascript:;" class="btn btn-danger cancel-input-jadwal">Batal</a>
              </div>
            </div>
          </form>
        </div>

        <div class="card" id="form-kegiatan">
          <div class="card-title"></div>

          <form method="post" class="form-kegiatan"  style="margin-left:20px; margin-right:20px; padding-top:20px;">
            <div class="form-group">
              <label>Kode Kegiatan</label>
              <input type="text" class="form-control" style="width:20%;" value="<?= $kode_kegiatan ?> " id="id_kegiatan" name="id_kegiatan">
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pilih Jadwal Kegiatan</label>
                  <select class="form-control" name="jadwal_kegiatan" id="jadwal-kegiatan" required>
                    <option value=""> -- pilih jadwal kegiatan -- </option>
                    <?php foreach($jadwal_kegiatan as $jadwal){
                      echo "<option value='$jadwal->id_jadwal'> $jadwal->nama_kegiatan </option> ";
                    } ?>
                  </select>
                </div>
                <div id="detail-jadwal"></div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Deskripsi Kegiatan</label>
                  <textarea name="deskripsi" id="deskripsi" rows="8" cols="80" class="form-control" required></textarea>
                </div>

              </div>

              <div class="form-group">
                  <a href="javascript:;" class="btn btn-info simpan-kegiatan">SIMPAN</a>
                  <a href="javascript:;" class="btn btn-warning update-kegiatan">UPDATE</a>
                  <a href="javascript:;" class="btn btn-danger cancel-input-kegiatan">Batal</a>
              </div>
            </div>
          </form>
        </div>

      </div>
          <!-- /.row -->
          <div class="container-fluid">
            <div class="card" id="show-data-kegiatan"></div>
            <div class="card" id="show-data-jadwal"></div>
          </div>
           <!-- /.card -->

           <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                        <p>anda yakin ingin mengahapus jadwal ini ? </p>
                    </div>
                  </div>

                  <form class="form-hapus-jadwal" method="post">
                    <input type="hidden" name="id_jadwal" id="id_jadwal">
                </div>
                <div class="modal-footer">
                  <a href="javascript:;" class="btn btn-info submit-hapus-jadwal">Konfirmasi Hapus</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
                </form>
            </div>
          </div>
          <!-- Modal -->

          <!-- Modal -->
         <div id="myModal1" class="modal fade" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title"></h4>
               </div>
               <div class="modal-body">
                 <div class="panel panel-info">
                   <div class="panel-heading">
                       <p>anda yakin ingin mengahapus jadwal ini ? </p>
                   </div>
                 </div>

                 <form class="form-hapus-kegiatan" method="post">
                   <input type="hidden" name="id_kegiatan" id="id_kegiatan_id">
               </div>
               <div class="modal-footer">
                 <a href="javascript:;" class="btn btn-info submit-hapus-kegiatan">Konfirmasi Hapus</a>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div>
               </form>
           </div>
         </div>
         <!-- Modal -->


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>

<script type="text/javascript">
    $(document).ready(function(){


      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('.update-jadwal').hide();
      $('.update-kegiatan').hide();
      $('#form-jadwal-kegiatan').hide();
      $('#form-kegiatan').hide();
      loadjadwal();
      loadBoxkegiatan();
      loadBoxkegiatan2();
      // loadkodejadwal();
      // loadkodeKegiatan();
      loadkegiatan();
      setInterval(function(){
          loadjadwal();
            loadkegiatan();
      },10000)
      //-------- load data ------------------------------
      function loadjadwal()
      {
        $.ajax({
          url:'<?= base_url() ?>adm/kegiatan/fetch_jadwal',
          method:'POST',
          success:function(data){
            $('#show-data-jadwal').html(data);
          }
        });
      }
      function loadkegiatan()
      {
        $.ajax({
          url:'<?= base_url() ?>adm/kegiatan/fetch_kegiatan',
          method:'POST',
          success:function(data){
            $('#show-data-kegiatan').html(data);
          }
        });
      }
      function loadBoxkegiatan()
      {
        $.ajax({
          url:'<?= base_url() ?>adm/kegiatan/fetch_box',
          method:'POST',
          success:function(data){
            $('#show-box-kegiatan').html(data);
          }
        });
      }
      function loadBoxkegiatan2()
      {
        $.ajax({
          url:'<?= base_url() ?>adm/kegiatan/fetch_box2',
          method:'POST',
          success:function(data){
            $('#show-box-kegiatan2').html(data);
          }
        });
      }
      // function loadkodejadwal()
      // {
      //   $.ajax({
      //     type:'ajax',
      //     url:'<?= base_url('adm/kegiatan/get_kode_jadwal')  ?>',
      //     async:false,
      //     dataType:'json',
      //     success:function(data){
      //       var html = data;
      //       $('#kode_jadwal').val(html);
      //     }
      //
      //   });
      // }
      // function loadkodeKegiatan()
      // {
      //   $.ajax({
      //     type:'ajax',
      //     url:'<?= base_url('adm/kegiatan/get_kode_kegiatan') ?>',
      //     async:false,
      //     dataType:'json',
      //     success:function(data){
      //       var html = data;
      //       $('#id_kegiatan').val(html);
      //     }
      //   });
      // }
      //-------- load jadwal ------------------------------

      $('.tambahjadwal-link').click(function(){
        $('.tambahjadwal-link').addClass('active');
          $('.tambahkegiatan-link').removeClass('active');
        $('#form-jadwal-kegiatan').show('slow');
          $('#form-kegiatan').hide('fadeOut');
          $('#show-box-kegiatan').show('slow');
          $('#show-box-kegiatan2').hide('slow');
          $('#show-data-kegiatan').hide('slow', function(){
            $('#show-data-jadwal').show('slow');
              $('.update-jadwal').hide();
              $('.simpan-jadwal').show();
          });
      });

      $('.cancel-input-jadwal').click(function(){
          $('.tambahjadwal-link').removeClass('active');
          $('#form-kegiatan').hide('slow');
          $('#form-jadwal-kegiatan').hide('slow');
          $('#show-box-kegiatan2').show('slow');
          $('#show-box-kegiatan').show('slow');
          $('#show-data-kegiatan').show('slow');
            $('#show-data-jadwal').show('slow');
      });

      $('.cancel-input-kegiatan').click(function(){
          $('.tambahjadwal-link').removeClass('active');
          $('#form-jadwal-kegiatan').hide('slow');
          $('#show-box-kegiatan2').show('slow');
          $('#show-box-kegiatan').show('slow');
          $('#form-kegiatan').hide('slow');
          $('#detail-jadwal').hide('slow');
            $('#show-data-kegiatan').show('slow');
              $('#show-data-jadwal').show('slow');
              $('#deskripsi').val("");
              $('#jadwal-kegiatan').val("");
              loadkegiatan();
              loadkodeKegiatan();
      });

      $('.tambahkegiatan-link').click(function(){
          $('.tambahkegiatan-link').addClass('active');
            $('.tambahjadwal-link').removeClass('active');
            $('#form-kegiatan').show('slow');
            $('#form-jadwal-kegiatan').hide('fadeOut');
            $('#show-box-kegiatan2').show('slow');
            $('#show-box-kegiatan').hide('slow');
            $('#show-data-jadwal').hide('slow', function(){
              $('#show-data-kegiatan').show('slow');
            });
      });

      //insert jadwal---------------------------------------
      $('.simpan-jadwal').click(function(){

        var data = $('.form-kegiatan').serialize();
        var nama_kegiatan   = $('#nama_kegiatan').val();
        var tempat_kegiatan = $('#tempat_kegiatan').val();
        var jam_kegiatan    = $('#jam_kegiatan').val();
        var tanggal_kegiatan = $('#tanggal_kegiatan').val();



        if(nama_kegiatan == "" || tempat_kegiatan == "" || jam_kegiatan == "" || tanggal_kegiatan == ""){
          alert('Tidak boleh ada field yang kosong');
        }else{
          $.ajax({
            type:"POST",
            url:'<?= base_url('adm/kegiatan/simpanJadwal') ?>',
            data:data,
            success:function(data){
              alert(data);

              $('.form-jadwal-kegiatan').hide('slow');
              loadjadwal();
              loadBoxkegiatan();
              loadBoxkegiatan2();
              $('.form-kegiatan')[0].reset();
              window.location.href = '<?= base_url('adm/kegiatan') ?>';
            }
          });
        }

      });
      //-----------------------------------------------------

      $('#jadwal-kegiatan').change(function(){
        var kode = $('#jadwal-kegiatan').val();
        if(kode == ""){
          alert('silahkan pilih jadwal kegiatan');
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url() ?>adm/kegiatan/showJadwal/'+kode,
            dataType:'json',
            success:function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++)
              {
                html += '<table class="table table-striped">'+
                        '<tbody>'+
                          '<tr>'+
                            '<th> Nama Kegiatan  </th>'+
                            '<td>: '+data[i].nama_kegiatan+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<th> Tanggal Kegiatan  </th>'+
                            '<td>: '+data[i].tgl_kegiatan+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<th> Jam  </th>'+
                            '<td>: '+data[i].jam_kegiatan+'</td>'+
                          '</tr>'+
                          '<tr>'+
                            '<th> Tempat  </th>'+
                            '<td>: '+data[i].tempat+'</td>'+
                          '</tr>'+
                        '</tbody>'+
                        '</table>';
              }

              $('#detail-jadwal').html(html).show('fadeIn');
            }
          });
        }

      });
      //---------
      //simpan kegiatan
      $('.simpan-kegiatan').click(function(){
        var deskripsi = $('#deskripsi').val();
        if(deskripsi == ""){
          alert('Deksirpsi Harus Diisi ! ');
        }else{
          var data = $('.form-kegiatan').serialize();
          $.ajax({
            type:'POST',
            url:'<?= base_url() ?>adm/kegiatan/simpanKegiatan',
            data:data,
            success:function(data){
              alert(data);
              $('#deskripsi').val("");

              loadkegiatan();
              loadBoxkegiatan2();
              loadjadwal();

              window.location.href = '<?= base_url('adm/kegiatan') ?>';
            }
          });
        }

      });

      $(document).on('click','.btn-edit',function(){
        var id_jadwal = $(this).attr('data-id');
        var nama_kegiatan = $(this).attr('data-nama');
        var jam_kegiatan  = $(this).attr('data-jam');
        var tgl_kegiatan  = $(this).attr('data-tgl');
        var tempat        = $(this).attr('data-tempat');

        $('#form-jadwal-kegiatan').show('slow');

        $('#nama_kegiatan').val(nama_kegiatan);
        $('#jam_kegiatan').val(jam_kegiatan);
        $('#tanggal_kegiatan').val(tgl_kegiatan);
        $('#tempat_kegiatan').val(tempat);
        $('#kode_jadwal').val(id_jadwal);

        $('.update-jadwal').show('slow',function(){
          $('.simpan-jadwal').hide('slow');
        })
      });

      $('.update-jadwal').click(function(){
        var data = $('.form-kegiatan').serialize();
        var nama_kegiatan   = $('#nama_kegiatan').val();
        var tempat_kegiatan = $('#tempat_kegiatan').val();
        var jam_kegiatan    = $('#jam_kegiatan').val();
        var tanggal_kegiatan = $('#tanggal_kegiatan').val();



        if(nama_kegiatan == "" || tempat_kegiatan == "" || jam_kegiatan == "" || tanggal_kegiatan == ""){
          alert('Tidak boleh ada field yang kosong');
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url('adm/kegiatan/updateJadwal') ?>',
            data:data,
            success:function(data){
              alert(data);
              $('[name=nama_kegiatan]').val("");
              $('[name=tanggal_kegiatan]').val("");
              $('[name=jam_kegiatan]').val("");
              $('[name=tempat_kegiatan]').val("");
              loadjadwal();
              window.location.href = '<?= base_url('adm/kegiatan') ?>';


            }
          });
        }
      });

      $(document).on('click','.btn-hapus-jadwal',function(){
        $('#myModal').modal('show');
        var id_jadwal = $(this).attr('data-id');
        $('#id_jadwal').val(id_jadwal);
      });

      $('.submit-hapus-jadwal').click(function(){
        var data = $('.form-hapus-jadwal').serialize();

        $.ajax({
            type:"POST",
            url:'<?= base_url('adm/kegiatan/hapusJadwal') ?>',
            data:data,
            success:function(data)
            {
              alert(data);

              loadkegiatan();
              loadBoxkegiatan2();
              loadjadwal();
              window.location.href = '<?= base_url('adm/kegiatan') ?>';

            }
        });
      });

      $(document).on('click','.btn-edit-kegiatan', function(){
        var id_kegiatan = $(this).attr('data-id');
        var id_jadwal   = $(this).attr('data-jadwal');
        var deskripsi   = $(this).attr('data-deskripsi');

        $('#form-kegiatan').show('slow', function(){
          $('.update-kegiatan').show('slow');
          $('.simpan-kegiatan').hide('slow');
        });
        $('#id_kegiatan').val(id_kegiatan);
        $('#jadwal-kegiatan').val(id_jadwal);
        $('#deskripsi').val(deskripsi);
      });

      $(document).on('click','.update-kegiatan', function(){
          var data = $('.form-kegiatan').serialize();

          $.ajax({
            type:"POST",
            url:'<?= base_url('adm/kegiatan/updateKegiatan') ?>',
            data:data,
            success:function(data){
              alert(data);
              loadkegiatan();
              window.location.href = '<?= base_url('adm/kegiatan') ?>';

            }
          });
      });

      $(document).on('click', '.btn-hapus-kegiatan', function(){
        $('#myModal1').modal('show');
        var id = $(this).attr('data-id');
        $('#id_kegiatan_id').val(id);
      });

      $(document).on('click', '.submit-hapus-kegiatan', function(){
        var data = $('.form-hapus-kegiatan').serialize();
        $.ajax({
          type:"POST",
          url:'<?= base_url('adm/kegiatan/hapusKegiatan') ?>',
          data:data,
          success:function(data){
            alert(data);
            $('#myModal1').modal('hide');
            loadkegiatan();
            window.location.href = '<?= base_url('adm/kegiatan') ?>';

          }
        });
      });

    });
</script>
