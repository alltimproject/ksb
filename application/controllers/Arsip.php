<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user/m_informasi');
    $this->load->model('m_arsip');
    $this->load->helper('tanggal');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
   $this->load->view('user/include/v_header');

   $data['data_kegiatan'] = $this->m_informasi->getKegiatan_verifikasi()->result();
   $this->load->view('user/v_arsip_kegiatan', $data);

   $this->load->view('user/include/v_footer');
  }

  function dokumentasi_keg($kode)
  {
    $this->load->view('user/include/v_header');

    $data['detail_kegiatan'] = $this->m_informasi->get_kegiatan_id($kode);
    $data['get_dokumentasi'] = $this->m_arsip->get_dokumentasi($kode);
    $this->load->view('user/v_dokumentasi',$data);

    $this->load->view('user/include/v_footer');
  }

}
