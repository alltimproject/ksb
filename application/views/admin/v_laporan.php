<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1><?php echo $this->session->flashdata('msg') ?>
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <h4>Pilih kegiatan</h4>
            </div>
            <form class="form-laporan-kegiatan" method="post">
              <div class="form-group">
                <label> laporan kegiatan </label>
                <select class="form-control" name="kegiatan" id="selectKegiatan">
                  <option value=""> -- pilih kegiatan -- </option>
                  <?php foreach($jadwal_kegiatan->result() as $key){
                    echo "<option value='$key->id_jadwal'> $key->nama_kegiatan </option>";
                  } ?>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>

    <div id="show_kegiatan_laporan"></div>














      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#selectKegiatan').change(function(){
        var kode = $('#selectKegiatan').val();

        if(kode == ""){
          alert('Silahkan pilih kegiatan');
        }else{
          $.ajax({
            url:'<?= base_url() ?>adm/laporan/show_kegiatan_laporan/'+kode,
            type:'POST',
            success:function(data){
              $('#show_kegiatan_laporan').html(data);
            }
          });
        }


      });
















    });
  </script>
