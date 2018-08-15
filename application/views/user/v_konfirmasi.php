<div class="container">
  <h1 class="text-center">Hallo, <?= $nama_lengkap ?> </h1>
  <p class="text-center" style="font-size:20px;">Terima kasih, Konfirmasi anda berhasil. Anda sudah menjadi peserta KSB, Berikut adalah jadwal kegiatan yang anda ikuti : </p>
  <table class="table table-striped">
    <tr style="background-color:black; color:white">
      <th>Nama kegiatan</th>
      <th>Tanggal kegiatan</th>
      <th>Jam kegiatan</th>
    </tr>
    <?php foreach($jadwal->result() as $key): ?>
      <tr>
        <td><?= $key->nama_kegiatan ?></td>
        <td><?= $key->tgl_kegiatan ?></td>
        <td><?= $key->jam_kegiatan ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
