<div class="container">
  <div class="col-md-4">

  </div>
  <div class="col-md-4 wow animate fadeInUp">

    <div class="card">
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-danger">
        <h4><?= $this->session->flashdata('msg') ?> </h4>
      </div>
      <?php endif; ?>
      <center><h1>LOGIN</h1> </center>
      <form action="<?=base_url('Loginpeserta/aksiLogin') ?>" method="post" style="margin-left:10px; margin-right:10px;">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Masukan Email" required>
        </div>
        <div class="form-group">
          <label>Passwod</label>
          <input type="password" name="password" placeholder="******" class="form-control form-password" required>
        </div>
        <div class="form-group">
          <label>Show Passwod</label>
          <input type="checkbox" class="form-checkbox">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info btn-sm" name="button">LOGIN</button><br>
          <a href="<?= base_url('register')  ?> ">Klik disini untuk buat akun</a>
        </div>
      </form>
    </div>



  </div>
  <div class="col-md-4">

  </div>
</div>
<script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $('.form-checkbox').click(function(){

      if($(this).is(':checked') )
      {
        $('.form-password').attr('type','text');
      }else
      {
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
