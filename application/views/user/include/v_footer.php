
<!-- ####################################################################################################### -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?= base_url().'assets/jquery/jquery.min.js' ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

<script src="<?= base_url().'assets/js/morris.min.js' ?>"></script>

<script src="<?= base_url().'assets/js/wow.min.js' ?>"></script>

<script src="<?= base_url().'assets/dataTables/jquery.dataTables.min.js' ?>"></script>
<script src="<?= base_url().'assets/dataTables/dataTables.bootstrap4.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url().'assets/js/adminlte.js' ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url().'assets/js/demo.js' ?>"></script>
<script type="text/javascript">
$(function() {
  new WOW().init();
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.btn-cari', function(){
      var data = $('.form-cari').serialize();
      $.ajax({
       type:'POST',
       url:'<?= base_url('berita/cariberita') ?>',
       data:data,
       success:function(data){

        $('#tampil-berita').html(data);
       }
      });

    });
  });
</script>
<!-- ####################################################################################################### -->
<div class="wrapper col8"  >
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">IRSAN</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
