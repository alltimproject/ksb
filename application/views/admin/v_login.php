<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="<?= base_url().'assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url().'assets/custome/styleloginadmin.css'?>">
    <script src="<?= base_url().'assets2/bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= base_url().'assets2/jquery/jquery.min.js' ?>"></script>
  </head>
  <body>

    <div class="container" style="background-image: url('cover/cover.png');">
        <div class="card card-container" style="background-color:rgb(168, 195, 194, 0.3)">
          <center><img src="<?= base_url('images/ksblogo.png') ?> " width="50px;" ></center>
            <p id="profile-name" class="profile-name-card">LOGIN ADMIN</p>
            <form class="form-signin" method="post" action="<?= base_url().'admin/actionlogin'?>" >
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="kode" class="form-control" placeholder="Enter Your ID" required autofocus>
                <input type="password" name="password" class="form-control form-password" placeholder="Password" required>
                <input type="checkbox" class="form-checkbox">Show Password

                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->

            <!-- notifications -->
            <?php if($this->session->flashdata('msg') ): ?>
            <div class="panel panel-danger">
                <div class="panel-heading">
                  <?= $this->session->flashdata('msg'); ?>
                </div>
            </div>
          <?php endif; ?>
            <!--- end notif -->
        </div><!-- /card-container -->

        <br>
          <br>
            <br>




    </div><!-- /container -->
  </body>
</html>
<script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript">
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
