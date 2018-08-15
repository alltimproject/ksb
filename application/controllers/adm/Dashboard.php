<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_dashboard');
    $this->load->helper('tanggal');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Dashboard';
    $this->load->view('admin/include/v_header', $data);

    $data['jumlah_dibatalkan'] = $this->m_dashboard->get_kegiatan_dibatalkan()->num_rows();
    $data['jumlahKeg']         = $this->m_dashboard->getKegiatan2()->num_rows();
    $data['jumlah_validasi']   = $this->m_dashboard->fetch_validasi()->num_rows();
    $this->load->view('admin/v_dashboard',$data);

    $this->load->view('admin/include/v_footer');
  }

  function fetch_validasi()
  {
    $selectValidasi = $this->m_dashboard->fetch_validasi();

    $output = '

      ';

    if($selectValidasi->num_rows() > 0 ){
      foreach($selectValidasi->result() as $val)
      {
      $output .= '
        <div class="card-body" id="tampil-validasi">
          <div class="callout callout-danger">
            <h5><span class="right badge badge-danger">New</span> - '.$val->nama_depan.' '.$val->nama_belakang.' , ingin mengikuti kegiatan  </h5>
            <p><b>Deskripsi Kegiatan : </b> '.$val->deskripsi.' </p>
            <p class="text-right">
              <a href="'.base_url('upload/'.$val->foto).'" style="text-decoration:none" target="_blank" class="btn btn-info btn0-xs">Lihat Foto Ktp </a>
              <a href="javascript:;" style="text-decoration:none;" data-id_jadwal="'.$val->id_jadwal.'" data-foto="'.$val->foto.'" data-kegiatan="'.$val->id_kegiatan.'" data-nik="'.$val->NIK.'" class="btn btn-info btn-xs tombol-validasi">Detail Peserta</a>
            </p>
          </div>
        </div>
       </div>
          ';
      }//endforeach valisasi
    }// end if
    else{
      $output .= '

      ';
    }
    echo $output;
  }

  function showdetailValidasi($id_jadwal)
  {
    $where = array('id_jadwal' => $id_jadwal);
    $data  = $this->m_dashboard->getNamakegiatan($where)->result();
    echo json_encode($data);
  }

  function showdetailPeserta($nik)
  {
    foreach ($this->m_dashboard->getPeserta($nik)->result() as $key ) {
      $nama_depan    = $key->nama_depan;
      $nama_belakang = $key->nama_belakang;
      $alamat        = $key->alamat;
      $kontak        = $key->kontak;
      $email         = $key->email_peserta;
      $jk            = $key->jenis_kelamin;
      $foto          = $key->foto;
    }
    if($jk == 'P'){
      $jenis_kelamin = 'Perempuan';
    }else{
      $jenis_kelamin = 'Laki - Laki';
    }
    $data['depan_name']    = $nama_depan.' '.$nama_belakang;
    $data['jk']            = $jenis_kelamin;
    $data['email_peserta'] = $email;
    $data['alamat']        = $alamat;
    $data['kontak']        = $kontak;
    $data['foto']          = $foto;
    $data['data']          = $this->m_dashboard->getPeserta($nik)->result();

    echo json_encode($data);
  }

  function simpanValidasiPeserta()
  {

    if(isset($_POST['submit']) ){
      //-----
      $nik            = $this->input->post('nik');
      $email_peserta  = $this->input->post('email_peserta');
      $nama_peserta   = $this->input->post('nama_peserta');
      $id_kegiatan    = $this->input->post('id_kegiatan');
      $id_jadwal      = $this->input->post('id_jadwal');
      //-----
      $config = [
   							'useragent' => 'CodeIgniter',
   							'protocol'  => 'smtp',
   							'mailpath'  => '/usr/sbin/sendmail',
   							'smtp_host' => 'ssl://smtp.gmail.com',
   							'smtp_user' => 'kampungsiagabencana2018@gmail.com',   // Ganti dengan email gmail Anda.
   							'smtp_pass' => 'kampungsiaga2018',             // Password gmail Anda.
   							'smtp_port' => 465,
   							'smtp_keepalive' => TRUE,
   							'smtp_crypto' => 'SSL',
   							'wordwrap'  => TRUE,
   							'wrapchars' => 80,
   							'mailtype'  => 'html',
   							'charset'   => 'utf-8',
   							'validate'  => TRUE,
   							'crlf'      => "\r\n",
   							'newline'   => "\r\n",
   					];
          $config['mailtype'] = 'html';
          $this->email->initialize($config);

          $this->email->to($email_peserta);
          $this->email->from('KSB','Kampung siaga bencana');
          $this->email->subject('Pendaftaran berhasil di verifikasi');

          foreach($this->m_dashboard->get_jadwal($id_jadwal)->result() as $key_jadwal ){
            $nama_kegiatan = $key_jadwal->nama_kegiatan;
            $tgl_kegiatan  = $key_jadwal->tgl_kegiatan;
            $jam_keg       = $key_jadwal->jam_kegiatan;
            $tempat        = $key_jadwal->tempat;
          }


          $data['url_link']       = base_url().'konfirmasi?nik='.$nik.'&&keg='.$id_kegiatan;
          $data['namalengkap']    = $nama_peserta;
          $data['nama_kegiatan']  = $nama_kegiatan;
          $data['tgl_kegiatan']   = $tgl_kegiatan;
          $data['tempat']         = $tempat;
          $data['jam']            = $jam_keg;
          $html = $this->load->view('mail/email_validasi_kegiatan', $data, TRUE);
          $this->email->message($html);
          if($this->email->send() ){
            $where = array(
              'NIK'         => $nik,
              'id_kegiatan' => $id_kegiatan
            );
          $data  = array('status_informasi' => 'proses');
          $this->db->where($where);
          $this->db->update('tb_konfirmasi', $data);

            $this->session->set_flashdata('notifvalidasi','Peserta berhasil di validasi, email undangan telah dikirim kepada peserta');
            redirect(base_url('adm/dashboard') );


          }else{
            // echo  $this->email->print_debugger();
            $this->session->set_flashdata('notifvalidasi','Gagal validasi peserta, check internet Komputer anda . email tidak dapat dikirim kepada peserta');
            redirect(base_url('adm/dashboard'));
          }

    }else{
      $id_kegiatan    = $this->input->post('id_kegiatan');
      $nik            = $this->input->post('nik');
      $email_peserta  = $this->input->post('email_peserta');
      $nama_peserta   = $this->input->post('nama_peserta');
      $id_jadwal      = $this->input->post('id_jadwal');

      $config = [
   							'useragent' => 'CodeIgniter',
   							'protocol'  => 'smtp',
   							'mailpath'  => '/usr/sbin/sendmail',
   							'smtp_host' => 'ssl://smtp.gmail.com',
   							'smtp_user' => 'kampungsiagabencana2018@gmail.com',   // Ganti dengan email gmail Anda.
   							'smtp_pass' => 'kampungsiaga2018',             // Password gmail Anda.
   							'smtp_port' => 465,
   							'smtp_keepalive' => TRUE,
   							'smtp_crypto' => 'SSL',
   							'wordwrap'  => TRUE,
   							'wrapchars' => 80,
   							'mailtype'  => 'html',
   							'charset'   => 'utf-8',
   							'validate'  => TRUE,
   							'crlf'      => "\r\n",
   							'newline'   => "\r\n",
   					];
          $config['mailtype'] = 'html';
          $this->email->initialize($config);

          $this->email->to($email_peserta);
          $this->email->from('KSB','Kampung siaga bencana');
          $this->email->subject('Pendaftaran Gagal diverifikasi');

          $data['namalengkap']    = $nama_peserta;
          $html = $this->load->view('mail/email_dibatalkan_kegiatan', $data, TRUE);
          $this->email->message($html);
          if($this->email->send() ){
            $where = array(
              'NIK'         => $nik,
              'id_kegiatan' => $id_kegiatan
            );
            $data  = array('status_informasi' => 'dibatalkan');
            $this->db->where($where);
            $this->db->update('tb_konfirmasi', $data);

            $this->session->set_flashdata('notifvalidasi','Validasi berhasil di batalkan karena tidak ada kesesuaian data');
            redirect(base_url('adm/dashboard') );
          }else{
            $this->session->set_flashdata('notifvalidasi','Gagal membatalkan peserta, check kembali koneksi komputer anda');
            redirect(base_url('adm/dashboard') );
          }






    }




  }

  function lihatkegiatan()
  {
    $data['data'] = $this->m_dashboard->getKegiatan()->result();
    $this->load->view('admin/v_lihat_kegiatan', $data);
  }

  function fetch_kegiatan()
  {
    $selectKegiatan = $this->m_dashboard->getKegiatan2();
    $output = '
    <div class="card" id="tampil-kegiatan">
      <div class="card-header">
        '.$selectKegiatan->num_rows().' Kegiatan
      </div>
      <table class="table table-striped">
          <tr>
            <th>Judul Kegiatan</th>
            <th>Tanggal Kegiatan</th>
            <th>jam kegiatan</th>
            <th>tempat</th>
            <th>status kegiatan </th>
            <th>Opsi</th>
          </tr>
    ';
    if($selectKegiatan->num_rows() > 0 )
    {
      foreach($selectKegiatan->result() as $key )
      //
      // $tgl_keg = new DateTime($key->tgl_kegiatan);
      // $tgl_today    = new DateTime(date('Y-m-d'));
      // $beda         = $tgl_keg->diff($tgl_today);
      {

        $output .= '
          <tr>
            <td>'.$key->nama_kegiatan.'</td>
            <td>'.tanggal_indo($key->tgl_kegiatan).'</br> </h4>
            </td>
            <td>'.$key->jam_kegiatan.'</td>
            <td>'.$key->tempat.'</td>
            <td>'.$key->status_acara.' </td>
            <td>
            <a href="'.base_url('adm/dashboard/detail_kegiatan/'.$key->id_kegiatan).'" class="btn btn-info btn-xs">Lihat Peserta</a>
            </td>
          </tr>
        ';
      }
    }

    $output .= '
        </table>
      </div>
    ';

    echo $output;
  }

  function detail_kegiatan($id)
  {
    $data['title'] = 'Detail Kegiatan';
    $this->load->view('admin/include/v_header', $data);

    $where = array('id_kegiatan' => $id);

    $data['getPeserta'] = $this->m_dashboard->get_peserta_jadwal($id);
    foreach($this->m_dashboard->get_detail_kegiatan($where)->result() as $key ){
      $id_jadwal = $key->id_jadwal;
    }
    $where2 = array('id_jadwal' => $id_jadwal);
    $data['jadwal_keg'] = $this->m_dashboard->getNamakegiatan($where2);

    $this->load->view('admin/v_detailkegiatan', $data);

    $this->load->view('admin/include/v_footer');

  }

}
