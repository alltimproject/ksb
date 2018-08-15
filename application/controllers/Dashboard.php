<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user/m_dashboard');
    $this->load->model('user/m_informasi');
    $this->load->helper('tanggal');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('user/include/v_header');

    $data['data_kegiatan'] = $this->m_informasi->getKegiatan_verifikasi();
    $data['data_berita']   = $this->m_dashboard->getBerita_dashboard()->result();
    $data['get_komentar']  = $this->m_dashboard->get_komentar();
    $this->load->view('user/v_dashboard', $data);

    $this->load->view('user/include/v_footer');
  }

  function detailberita($id)
  {
    $this->load->view('user/include/v_header');

    $where = array('id_berita' => $id);
    $data['get_komentar']  = $this->m_dashboard->get_komentar_berita($where);
    $data['detail_berita'] = $this->m_dashboard->get_detail_berita($where)->result();
    $this->load->view('user/v_detail_berita', $data);

    $this->load->view('user/include/v_footer');
  }

  function simpanKomentar()
  {
    $id_berita = $this->input->post('id_berita');
    $email    = $this->input->post('email');
    $komentar = $this->input->post('isi_komentar');

    $data = array(
      'id_berita'       => $id_berita,
      'email'           => $email,
      'isi_komentar'    => $komentar,
      'tgl_komentar'    => date('Y-m-d'),
      'status_komentar' => 'menunggu'

    );

    $this->db->insert('tb_komentar', $data);
  }


}
