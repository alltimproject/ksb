<?php
foreach($detail_berita as $key): ?>
<div class="wrapper">
  <div class="container  animated fadeIn">
    <div class="panel panel-info text-center" style="margin-right:20px;" >

    <h1><?= $key->judul_berita ?> <small><?= $key->tgl_berita ?> </small> </h1>

    </div>

    <div class="col-md-6">
      <div class="thumbnail">
        <a href="/w3images/nature.jpg" target="_blank">
          <img src="<?= base_url('images/'.$key->foto_berita) ?>" alt="Nature" style="width:100%;">
          <div class="caption">
            <p class="justify"></p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-6">
        <p><?= $key->deskripsi_berita ?></p>
    </div>
  </div>
</div>

<?php endforeach; ?>
<div class="container" style="background-image: url('images/bg222.png');">
                      <div>
                        <h4>KOMENTAR</h4>
                         <!-- end of user messages -->

                        <?php if($get_komentar->num_rows() > 0 ){ ?>
                          <div id="msg">
                          <div class="panel panel-info">
                            <div class="panel-heading">
                              Komentar, berhasil di tambahkan . komentar akan tampil setelah verifikasi oleh admin
                            </div>
                          </div>
                        </div>
                          <blockquote class="message ">
                            <form class="form-komentar" method="post">
                              <input type="hidden" name="id_berita" value="<?= $key->id_berita ?>">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="email">
                              </div>
                              <div class="form-group">
                                <label>Komentar</label>
                                <textarea name="isi_komentar" class="form-control" rows="5" id="isi_komentar" cols="80"></textarea>
                              </div>
                              <div class="form-group text-right">
                                <a href="javascript:;" class="btn btn-info tombol-simpan">POST</a>
                              </div>
                            </form>
                           </blockquote>
                        <?php foreach($get_komentar->result() as $key): ?>
                        <ul class="messages">
                          <li>
                            <div class="message_date">
                              <h5 class="date text-info"><?= tanggal_indo($key->tgl_komentar) ?></h5>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading"><?= $key->email ?></h4>
                              <blockquote class="message "><?= $key->isi_komentar ?></blockquote>
                              <br />

                            </div>
                          </li>
                        </ul>
                      <?php endforeach; ?>
                    <?php }else{ ?>
                      <div class="message_wrapper">
                        <h4 class="heading">Tidak ada komentar</h4>
                        <div id="msg">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            Komentar, berhasil di tambahkan . komentar akan tampil setelah verifikasi oleh admin
                          </div>
                        </div>
                      </div>
                        <blockquote class="message ">
                          <form class="form-komentar" method="post">
                            <input type="hidden" name="id_berita" value="<?= $key->id_berita ?>">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="email">
                            </div>
                            <div class="form-group">
                              <label>Komentar</label>
                              <textarea name="isi_komentar" class="form-control" rows="5" id="isi_komentar" cols="80"></textarea>
                            </div>
                            <div class="form-group text-right">
                              <a href="javascript:;" class="btn btn-info tombol-simpan">POST</a>
                            </div>
                          </form>
                         </blockquote>
                        <br />
                      </div>
                    <?php } ?>
                      <!-- end of user messages -->
                    </div>
                   </div>
                  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
                  <script type="text/javascript">
                    $(document).ready(function(){

                      $('#msg').hide();

                      $(".tombol-simpan").click(function(){
                        var data = $('.form-komentar').serialize();

                        $.ajax({
                          type:'POST',
                          url:"<?= base_url('dashboard/simpanKomentar') ?>",
                          data:data,
                          success:function(){
                            $('#email').val('');
                            $('#isi_komentar').val('');
                            $('#msg').show('slow');
                          }
                        });



                      });


                    });
                  </script>
