<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_peserta');
    $this->load->helper('tanggal');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Peserta';
    $this->load->view('admin/include/v_header', $data);
    $data['get_peserta'] = $this->m_peserta->get_peserta();
    $this->load->view('admin/v_peserta', $data);
    $this->load->view('admin/include/v_footer');
  }

  function hapusPeserta($nik)
  {
    $data = array('NIK' => $nik);
    $this->db->where($data);
    $this->db->delete('tb_peserta');
    redirect(base_url('adm/peserta') );
  }

}
