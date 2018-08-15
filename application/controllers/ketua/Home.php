<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ketua/m_home');
    $this->load->model('m_laporan');
    $this->load->model('ketua/m_kegiatan');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Home';
    $this->load->view('ketua/include/v_header', $data);

    $data['jumlah_kegiatan'] = $this->m_kegiatan->get_kegiatan()->num_rows();
    $data['jumlah_data']   = $this->m_home->get_validasi_kegiatan()->num_rows();
    $data['data_validasi'] = $this->m_home->get_validasi_kegiatan();
    $this->load->view('ketua/v_home', $data);

    $this->load->view('ketua/include/v_footer');
  }

  function konfirmasi_kegiatan($id_kegiatan)
  {
    $data  = array('status_acara' => 'verifikasi');
    $where = array('id_kegiatan' => $id_kegiatan);
    $this->db->where($where);
    $this->db->update('tb_kegiatan', $data);
    redirect(base_url('ketua/home') );
  }

  function batal_kegiatan($id_kegiatan)
  {
    $data  = array('status_acara' => 'dibatalkan');
    $where = array('id_kegiatan' => $id_kegiatan);
    $this->db->where($where);
    $this->db->update('tb_kegiatan', $data);
    redirect(base_url('ketua/home') );
  }

}
