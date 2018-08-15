<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelola User</h1>
            <?php if($this->session->flashdata('msg') ){ ?>
              <div class="panel panel-info">
                <div class="panel panel-heading">
                  <?php echo $this->session->flashdata('msg') ?>
                </div>
              </div>
            <?php } ?>
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
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">

          </div>
          <form class="form-user" method="post">
            <div class="form-group">
              <label>Kode user</label>
              <input type="text" class="form-control" id="kode_user" name="kode_user" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label>Level akses</label>
              <select class="form-control" id="level" name="level" required>
                <option value=""> -- Pilih level -- </option>
                <option value="ADMIN">ADMINISTRATOR</option>
                <option value="KETUA">KETUA</option>
              </select>
            </div>
            <div class="form-group">
              <a href="javascript:;" class="btn btn-info btn-simpan">SIMPAN</a>
              <a href="javascript:;" class="btn btn-warning btn-update">UPDATE</a>
              <a href="javascript:;" class="btn btn-danger btn-batal">BATAL</a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="col-md-6">
      <div id="show-user">  </div>
    </div>
    </div>

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
        <p>Anda yakin ingin mengahpus data ini</p>
      </div>
      <div class="modal-footer">
        <form class="form-hapus" method="post">
          <input type="hidden" id="kode" name="kode">
          <a href="javascript:;" class="btn btn-info btn-xs btn-submit-hapus">Konfirmasi Hapus</a>
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
      loaduser();
      $('.btn-batal').hide();
        $('.btn-update').hide();

      function loaduser()
      {
        $.ajax({
          method:'POST',
          url:'<?= base_url() ?>adm/user/fetch_user',
          success:function(data)
          {
            $('#show-user').html(data);
          }
        });
      }

      $(document).on('click', '.btn-edit', function(){
        $('.btn-simpan').hide('slow', function(){
              $('.btn-update').show('slow');
                  $('.btn-batal').show('slow');
        });
        var kode  = $(this).attr('data-kode');
        var user  = $(this).attr('data-user');
        var level = $(this).attr('data-level');

        $('#kode_user').val(kode);
        $('#level').val(level);
        $('#username').val(user);


      });

      $(document).on('click', '.btn-batal', function(){
            $('.btn-simpan').show('slow', function(){
              $('.btn-update').hide();
              $('.btn-batal').hide();
              $('#kode_user').val("");
              $('#level').val("");
              $('#username').val("");
              $('#password').val("");
            });
      });

      $(document).on('click','.btn-simpan', function(){
        var data = $('.form-user').serialize();

        var kode_user = $('#kode_user').val();
        var pass      = $('#password').val();
        var username  = $('#username').val();
        var lv        = $('#level').val();


        if(kode_user == '' || pass == '' || username == '' || lv == ''){
          alert('Ada data yang kosong');
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url('adm/user/simpanUser') ?>',
            data:data,
            success:function(data){
              alert(data);
              loaduser();
              $('#kode_user').val("");
              $('#level').val("");
              $('#username').val("");
              $('#password').val("");
            }
          });
        }
      });

      $(document).on('click','.btn-hapus', function(){
        $('#myModal').modal('show');
        var kode = $(this).attr('data-kode');
        $('#kode').val(kode);
      });

      $(document).on('click', '.btn-submit-hapus', function(){
      var data = $('.form-hapus').serialize();

      $.ajax({
        type:'POST',
        url:'<?= base_url('adm/user/hapusUser') ?>',
        data:data,
        success:function(data){
          alert(data);
          loaduser();
          $('myModal').modal('hide');
        }
      });
      });

      $(document).on('click', '.btn-update', function(){
        var data = $('.form-user').serialize();

        var kode = $('#kode_user').val();
        var user = $('#username').val();
        var pass = $('#password').val();
        var level = $('#level').val();

        if(pass == ""){
          alert('Password harap diisi');
        }else{
          $.ajax({
            type:'POST',
            url:'<?= base_url('adm/user/updateUser') ?>',
            data:data,
            success:function(data){
              alert(data);
              loaduser();
            }
          });
        }

      });



    });
  </script>
