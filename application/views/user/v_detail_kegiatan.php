<div class="container">
  <div class="row">
    <div class="col-md-9 animated zoomIn" id="show-informasi">
      <?php foreach($detail_kegiatan->result() as $key):
        $tgl_kegiatan = new DateTime($key->tgl_kegiatan);
        $tgl_today    = new DateTime(date('Y-m-d'));
        $beda    = $tgl_kegiatan->diff($tgl_today);
       ?>
      <h2><?= $key->nama_kegiatan ?>  </h2>

      <?php if($this->session->flashdata('msg') ): ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3><?= $this->session->flashdata('msg') ?></h3>
        </div>
      </div>
      <?php endif; ?>

      <div class="card" style="margin-top:30px;">
        <div class="card-title bg-info">
            <h4 class="text-center">Deskripsi Kegiatan</h4>
        </div>
        <br>
            <p style="justify; font-size:18px; margin-left:15px; margin-right:20px; margin-top:20px;"><?= $key->deskripsi ?></p>
      </div>

      <div class="col-md-6">
        <div class="card" style="margin-top:30px;" >
          <div class="card-title bg-info">
            <h4 class="text-center">Tempat</h4>
          </div>
            <p style="font-size:18px; margin-left:15px; margin-right:15px;" class="text-center"><?= $key->tempat ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card" style="margin-top:30px;" >
          <div class="card-title bg-info">
            <h4 class="text-center">Jam</h4>
          </div>
            <p style="font-size:18px; margin-left:15px; margin-right:15px;" class="text-center"><?= $key->jam_kegiatan ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>


        <?php if($chekPesertaKegiatan->num_rows() != 1){ ?>
        <?php if($this->session->userdata('login_peserta') == 1): ?>
        <?php if($tgl_today <= $tgl_kegiatan){ ?>
        <div class="col-md-3" style="margin-top:30px;">
            <h3><?= $beda->days; ?> HARI LAGI </h3>
            <form action="<?= base_url('informasi/daftar') ?>" method="post">
              <input type="hidden" name="nik" value="<?= $this->session->userdata('nik_active') ?>">
              <input type="hidden" name="id_kegiatan" value="<?= $key->id_kegiatan ?> ">
              <input type="submit" onclick="return confirm('anda yakin ingin mendaftar ? ')" class="btn btn-block btn-secondary btn-lg" value="DAFTAR KEGIATAN" >
            </form>
        </div>
        <?php }else{ ?>
        <?php } ?>
        <?php endif; ?>
      <?php }else{ ?>
        <div class="col-md-3" style="margin-top:30px;">
              <button type="button" class="btn btn-block btn-secondary btn-lg">ANDA MENGIKUTI KEGIATAN INI</button>

        </div>
      <?php } ?>

  </div>
  <br><br>
               <div class="x_content" id="form-daftar" >
                   <form class="form-horizontal form-label-left" action="<?= base_url('informasi/daftarKegiatan'); ?>" method="post" enctype="multipart/form-data">
                     <h2 class="section">Formulir pendaftaran kegiatan</h2>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIK <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input name="nik" maxlength="16" minlength="16" onkeypress="return hanyaAngka(event)" class="form-control col-md-7 col-xs-12" placeholder="Masukan 16 digit NIK anda" required="required" type="text">
                       </div>

                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required" style="color:red" >*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="email" name="email" class="form-control col-md-7 col-xs-12" placeholder="Masukan Email anda" required="required" type="text">
                       </div>
                     </div>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Depan <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="nama_depan" name="nama_depan" required="required" placeholder="Masukan nama depan" class="form-control col-md-7 col-xs-12">
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Belakang <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="nama_belakang" name="nama_belakang" required="required" placeholder="Masukan nama belakang" class="form-control col-md-7 col-xs-12">
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Alamat <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="alamat" id="alamat" rows="3" class="form-control " cols="50"></textarea>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Kontak <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="kontak" name="kontak" required="required" placeholder="Masukan nomor telepom" class="form-control col-md-7 col-xs-12">
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Jenis Kelamin <span class="required" style="color:red">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="radio" name="jk" value="L">Laki - Laki<br>
                         <input type="radio" name="jk" value="P">Perempuan<br>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label for="password" class="control-label col-md-3">Tanggal Lahir <span class="required" style="color:red">*</span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="tgl_lahir" type="date" name="tgl_lahir"  class="form-control col-md-7 col-xs-12" required="required">
                       </div>
                     </div>

                     <div class="item form-group">
                       <label for="password" class="control-label col-md-3">Upload KTP <span class="required" style="color:red">*</span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="ktp" type="file" name="file"  class="form-control col-md-7 col-xs-12" required="required">
                       </div>
                     </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <input type="hidden" name="id_kegiatan" value="<?= $key->id_kegiatan ?>">
                         <a href="javascript:;" class="btn btn-primary btn-cancel">Cancel</a>
                         <input type="submit" name="submit" value="DAFTAR" class="btn btn-info btn-xs">
                       </div>
                     </div>
                   </form>
                 </div>


</div>
<br><br><br><br><br>
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){


      $('#form-daftar').hide();

      $('.btn-daftar').click(function(){
        $('#show-informasi').hide('slow', function(){
          $('#form-daftar').show('slow', function(){
            $('.btn-daftar').hide('slow');
          });
        });

      });

      $('.btn-cancel').click(function(){
        $('#form-daftar').hide('slow', function(){
          $('#show-informasi').show('slow', function(){
            $('.btn-daftar').show('slow');
          });
        });
      });


    });


    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))

		    return false;
		  return true;
		}
  </script>
