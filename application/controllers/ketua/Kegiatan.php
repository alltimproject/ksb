<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ketua/m_kegiatan');
    $this->load->helper('tanggal');
    $this->load->model('m_laporan');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Daftar Kegiatan';
    $this->load->view('ketua/include/v_header', $data);


    $data['get_jadwal'] = $this->m_kegiatan->get_kegiatan();
    $this->load->view('ketua/v_kegiatan', $data);

    $this->load->view('ketua/include/v_footer');
  }

  function lihatPeserta($id_kegiatan)
  {
    $data['title'] = 'Lihat Peserta';
    $this->load->view('ketua/include/v_header', $data);

    $data['data_peserta'] = $this->m_laporan->get_peserta($id_kegiatan);
    $this->load->view('ketua/v_lihatkegiatan', $data);

    $this->load->view('ketua/include/v_footer');
  }

}
