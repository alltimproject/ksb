<div class="container">
  <div class="col-md-4">

  </div>
  <div class="col-md-4 wow animate fadeInUp ">
    <div class="card">
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-danger">
        <h4><?= $this->session->flashdata('msg') ?> </h4>
      </div>
      <?php endif; ?>
      <?php if($this->session->flashdata('msg_scs')): ?>
      <div class="alert alert-success">
        <h4><?= $this->session->flashdata('msg_scs') ?> </h4>
      </div>
      <?php endif; ?>
      <center><h1>REGISTRASI AKUN</h1> </center>
      <form action="<?= base_url('register/daftarakun')  ?>" method="post" style="margin-left:10px; margin-right:10px;" enctype="multipart/form-data">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" maxlength="16" minlength="16" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Masukan NIK anda" required>
        </div>
        <div class="form-group">
          <label>Email peserta</label>
          <input type="text" name="email" placeholder="Masukan Email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Nama Depan</label>
          <input type="text" name="nama_depan" placeholder="Maasukan Nama Depan" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text" name="nama_belakang" placeholder="Maasukan Nama belakang" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Maasukan Password" class="form-control form-password" required>
          <input type="checkbox" class="form-checkbox"> show password
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" placeholder="Maasukan Alamat" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Kontak</label>
          <input type="text" name="kontak" placeholder="Maasukan Kontak" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select class="form-control" name="jk">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal lahir</label>
          <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="file" placeholder="Maasukan Kontak" class="form-control" required>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-info btn-sm" name="submit" value="DAFTAR" ><br>
          <a href="<?= base_url('Loginpeserta')  ?> ">klik disini untuk login</a>
        </div>
      </form>
    </div>




  </div>
  <div class="col-md-4">

  </div>
</div>
<script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript">
function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}

$(document).ready(function(){
 $('.form-checkbox').click(function(){
   if($(this).is(':checked') )
   {
     $('.form-password').attr('type','text');
   }else {
     $('.form-password').attr('type','password');
   }
 });
});

</script>
