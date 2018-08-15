<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user/m_informasi');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('user/include/v_header');

    $this->load->view('user/v_register');

    $this->load->view('user/include/v_footer');
  }

  function daftarakun()
  {
    $data = array();
    $nik         = $this->input->post('nik');
    $checknik    = $this->m_informasi->checknik($nik);
    if(isset($_POST['submit']) )
    {
        if(strlen($nik) != 16) {
          $this->session->set_flashdata('msg', 'Nik harus 16 digit !');
          redirect(base_url('register') );
        }else if($checknik->num_rows() > 0 ){
          $this->session->set_flashdata('msg','NIK sudah digunakan silahkan cek kembali nik anda');
          redirect(base_url('register') );
        }else{
          $upload = $this->m_informasi->uploadKtp();
          if($upload['result'] == "success"){
          $this->m_informasi->simpanPeserta($upload);
          echo "berhasil";
        }
      }
    }

  }

}
