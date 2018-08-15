<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_peserta');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $nik     = $_GET['nik'];
    $jadwal  = $_GET['keg'];
    $cek_nik = $this->m_peserta->chek_nik($nik);

    if($cek_nik->num_rows() > 0 ){
          $where_update = array(
            'id_kegiatan' => $jadwal,
            'NIK' => $nik
          );
          $data_update  = array(
            'status_informasi' => 'konfirmasi'
          );
          $this->db->where($where_update);
          $this->db->update('tb_konfirmasi', $data_update);

          foreach($cek_nik->result() as $peserta )
          {
            $nama_lengkap = $peserta->nama_depan.' '.$peserta->nama_belakang;
          }
          $this->load->view('user/include/v_header');
          $data['nama_lengkap'] = $nama_lengkap;
          $data['jadwal']       = $this->m_peserta->check_jadwal($jadwal);
          $this->load->view('user/v_konfirmasi', $data);
          $this->load->view('user/include/v_footer');
    }else{
          echo "NIK TIDAK TERDAFTAR";
    }


  }

}
