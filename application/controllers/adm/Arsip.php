<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_arsip');
    $this->load->helper('tanggal');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Arsip Kegiatan';
    $this->load->view('admin/include/v_header', $data);

    $data['get_arsip'] = $this->m_arsip->get_arsip_kegiatan()->result();
    $this->load->view('admin/v_arsip', $data);

    $this->load->view('admin/include/v_footer');
  }

  function detailarsip($kode)
  {
    $data['title'] = 'Detail Arsip';
    $this->load->view('admin/include/v_header', $data);

    $data['get_detail_arsip'] = $this->m_arsip->get_detail_arsip($kode)->result();
    $data['dokumentasi']      = $this->m_arsip->get_dokumentasi($kode);
    $this->load->view('admin/v_detail_arsip', $data);

    $this->load->view('admin/include/v_footer');
  }

  function simpanDokumentasi()
  {
    $kode = $this->input->post('id_kegiatan');
    $data = array();
        if($this->input->post('submit') )
        {
          $upload = $this->m_arsip->uploadDokumentasi();
          if($upload['result'] == "success")
          {
            $this->m_arsip->simpanDokumentasi($upload);
            $this->session->set_flashdata('msg', 'Upload Foto Dokumentasi Berhasil');
            redirect(base_url('adm/arsip/detailarsip/'.$kode) );
          }else{
            $data['message'] = $upload['error'];
          }
        }
        echo print_r($data);
  }

}
