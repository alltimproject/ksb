<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user/m_informasi');
    $this->load->helper('tanggal');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('user/include/v_header');

    $data['jumlah_keg']    = $this->m_informasi->getKegiatan_verifikasi()->num_rows();
    $data['data_kegiatan'] = $this->m_informasi->getKegiatan_verifikasi()->result();
    $this->load->view('user/v_informasi', $data);
    $this->load->view('user/include/v_footer');
  }


  function lihatkegiatan($id)
  {
    $this->load->view('user/include/v_header');

    $data['chekPesertaKegiatan'] = $this->m_informasi->get_peserta_kegiatan($id);
    $data['detail_kegiatan']     = $this->m_informasi->get_kegiatan_id($id);
    $this->load->view('user/v_detail_kegiatan', $data);
    $this->load->view('user/include/v_footer');
  }

  function daftarKegiatan()
  {
    $data = array();

    $nik         = $this->input->post('nik');
    $id_kegiatan = $this->input->post('id_kegiatan');
    $checknik    = $this->m_informasi->checknik($nik);
    if(isset($_POST['submit']) )
    {
        if(strlen($nik) != 16) {
          $this->session->set_flashdata('msg', 'Nik harus 16 digit !');
        }else if($checknik->num_rows() > 0 ){
          $this->session->set_flashdata('msg','NIK sudah digunakan silahkan cek kembali nik anda');
          redirect(base_url('informasi/lihatkegiatan/'.$id_kegiatan) );
        }else{
          $upload = $this->m_informasi->uploadKtp();
          if($upload['result'] == "success"){
          $this->m_informasi->simpanPeserta($upload);
          echo "berhasil";
        }
    }
    }
  }

  function daftar()
  {
     $nik         = $this->input->post('nik');
     $id_kegiatan = $this->input->post('id_kegiatan');

     $data = array(
       'id_kegiatan' => $id_kegiatan,
       'NIK'         => $nik,
       'status_informasi' => 'menunggu'
     );
     $insert = $this->db->insert('tb_konfirmasi', $data);
     if($insert){
       $this->session->set_flashdata('msg', 'Terima kasih telah mendaftar, email undangan akan dikirim setalah proses validasi oleh admin');
       redirect(base_url('informasi/lihatkegiatan/'.$id_kegiatan) );
     }
  }






}
