<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kegiatan');
    $this->load->model('m_laporan');
    $this->load->library('pdf');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Laporan';
    $this->load->view('admin/include/v_header', $data);

    $data['jadwal_kegiatan'] = $this->m_kegiatan->fetch_jadwal();
    $this->load->view('admin/v_laporan', $data);

    $this->load->view('admin/include/v_footer');
  }

  function show_kegiatan_laporan($kode)
  {
    $where = array('tb_jadwal_kegiatan.id_jadwal' => $kode);
    $fetch_kegiatan = $this->m_laporan->get_kegiatan_kode($where);
    $output = '
            <div class="card">
              <div class="card-header">
                <div class="card-title"></div>
                <a class="btn btn-info" target="_blank" style="color:white;" href="'.base_url('adm/laporan/print_kegiatan/'.$kode).'">PRINT LAPORAN </a>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <div class="card-title">
                    <h3>Kegiatan</h3>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="20%;">Nama kegiatan</th>
                      <th>Tanggal kegiatan</th>
                      <th>Jam</th>
                      <th width="20%;">Tempat</th>
                      <th width="70%;">Deskripsi Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>

    ';
    if($fetch_kegiatan->num_rows() > 0 )
    {
      foreach($fetch_kegiatan->result() as $keg){
        $output .= '
                    <tr>
                      <td>'.$keg->nama_kegiatan.'</td>
                      <td>'.$keg->tgl_kegiatan.'</td>
                      <td>'.$keg->jam_kegiatan.'</td>
                      <td>'.$keg->tempat.'</td>
                      <td>'.$keg->deskripsi.'</td>
                    </tr>
        ';
      }
    }else{
      echo "data tidak ada";
    }


    $output .= '
                 </tbody>
                </table>
              </div>
            </div>
    ';
    //--------------------------------------------------------------------------
    if($fetch_kegiatan->num_rows() > 0 ){
        $id_kegiatan = $keg->id_kegiatan;
        $selectPeserta = $this->m_laporan->get_peserta($id_kegiatan);
    }



    $output .= '
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                  <h3>'.$selectPeserta->num_rows().' Peserta</h3>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>NIK</th>
                    <th width="20%;">Nama Lengkap</th>
                    <th>Email</th>
                    <th width="20%;">Jenis Kelamin</th>
                    <th width="20%;">Kontak</th>
                    <th width="70%;">Foto</th>
                  </tr>
                </thead>
                <tbody>
    ';
    foreach($selectPeserta->result() as $peserta){
      $output .= '
                <tr>
                  <td>'.$peserta->NIK.'</td>
                  <td>'.$peserta->nama_depan.' '.$peserta->nama_belakang.'</td>
                  <td>'.$peserta->email_peserta.'</td>
                  <td>'.$peserta->jenis_kelamin.'</td>
                  <td>'.$peserta->kontak.'</td>
                  <td><img src="'.base_url('upload/'.$peserta->foto).'" width="150px">
                      <a href="'.base_url('upload/'.$peserta->foto).'" target="__blank">Lihat KTP </a>
                  </td>
                </tr>
      ';
    }
    $output .= '
                 </tbody>
                </table>
              </div>
            </div>
    ';


    echo $output;
  }

  function print_kegiatan($kode)
  {


    // $pdf = new FPDF('l','mm','A4');
    // // membuat halaman baru
    // $pdf->AddPage();
    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(190,7,'','C',0,1);
    // $pdf->Cell(10,7,'',0,1);
    // $pdf->SetFont('Arial','B',10);
    //
    // $pdf->SetFillColor(230,230,230);
    // $pdf->Cell(278,16,'Laporan Kegiatan ',1,1,'C',1);
    // $pdf->SetFillColor(230,230,230);
    //
    //
    //
    //     $where = array('tb_jadwal_kegiatan.id_jadwal' => $kode);
    //     $fetch_kegiatan = $this->m_laporan->get_kegiatan_kode($where);
    //     foreach($fetch_kegiatan->result() as $key1){
    //       $pdf->Cell(139,6,'Nama Kegiatan',1,0,1,1);
    //       $pdf->Cell(139,6,$key1->nama_kegiatan,1,1,1,0);
    //       $pdf->Cell(139,6,'Tanggal dan Jam kegiatan',1,0,1,1);
    //       $pdf->Cell(139,6,$key1->tgl_kegiatan.' / '.$key1->jam_kegiatan,1,1,1,0);
    //       $pdf->Cell(139,6,'Tempat',1,0,1,1);
    //       $pdf->Cell(139,6,$key1->tempat,1,1,1,0);
    //       $pdf->Cell(139,6,'Deksripsi Kegiatan',1,0,1,0);
    //       $pdf->Cell(139,6,$key1->deskripsi,1,1,1,1);
    //     }

    $this->load->library('MC_TABLE');
  $pdf=new MC_Table("L","mm","legal");
  $pdf->addPage();
  $pdf->SetMargins(1,1,1);
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','B',11);
  $pdf->Image('images/ksblogo.png',6,6,20,20);
  $pdf->SetX(40);
  $pdf->MultiCell(70.5,0.5,'LAPORAN KEGIATAN',0,'L');
  $pdf->SetFont('Helvetica','BI',7);
  $pdf->SetX(40);
  $pdf->MultiCell(70.5,10.5,'KAMPUNG SIAGA BENCANA  ',0,'L');
  $pdf->SetFont('Arial','',10);

  //------------------- GARIS ATAS -------->
      $pdf->Line(1,30.8,350.6,30.8);
      $pdf->SetLineWidth(0.9);

      $pdf->Line(1,31.8,350.6,31.8);
      $pdf->SetLineWidth(0,6);
  //------------------- GARIS ATAS -------->

  $pdf->ln(5);
  //Table with 20 rows and 4 columns

  $pdf->SetWidths(array(94,55,35,45,120));
    $pdf->Ln();

      $pdf->Row(array(
                  array("Nama Kegiatan"),
                  array("Tanggal Kegiatan"),
                  array("Jam Kegiatan"),
                  array("Tempat"),
                  array("Deksripsi Kegiatan")
      ));
      $where = array('tb_jadwal_kegiatan.id_jadwal' => $kode);
         $fetch_kegiatan = $this->m_laporan->get_kegiatan_kode($where);
         foreach($fetch_kegiatan->result() as $key1){
           $pdf->Row(array(
                       array($key1->nama_kegiatan),
                       array($key1->tgl_kegiatan),
                       array($key1->jam_kegiatan),
                       array($key1->tempat),
                       array($key1->deskripsi)
           ));
         }
        $pdf->ln(5);
      $pdf->SetFont('Arial','B',11);
      $pdf->Cell(180,20,'Peserta Kegiatan');
      $pdf->ln(5);
      //Table with 20 rows and 4 columns

      $pdf->SetWidths(array(54,55,55,25,45,45,35,30));
        $pdf->Ln();

          $pdf->Row(array(
                      array("NIK"),
                      array("Nama Lengkap"),
                      array("Email"),
                      array("Jenis Kelamin"),
                      array("Kontak"),
                      array("Tanggal Lahir"),
                      array("Konfirmasi Email"),
                      array("Paraf")
          ));
          $id_kegiatan = $key1->id_kegiatan;
          $selectPeserta = $this->m_laporan->get_peserta($id_kegiatan);
          foreach($selectPeserta->result() as $peserta){
            if($peserta->jenis_kelamin == "P"){
              $jk = 'Perempuan';
            }else{
              $jk = 'Laki - Laki';
            }

            if($peserta->status_informasi == "proses"){
              $status = "Belum ada konfirmasi dari peserta";
            }else{
              $status = "sudah di konfirmasi";
            }

            $pdf->Row(array(
                        array($peserta->NIK),
                        array($peserta->nama_depan.' '.$peserta->nama_belakang),
                        array($peserta->email_peserta),
                        array($jk),
                        array($peserta->kontak),
                        array($peserta->tgl_lahir),
                        array($status),
                        array("")
            ));
            }





    $pdf->Output();
  }

}
