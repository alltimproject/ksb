<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_arsip extends CI_Model{

  function get_arsip_kegiatan()
  {
    $query = $this->db->query("SELECT * FROM tb_kegiatan, tb_jadwal_kegiatan WHERE tb_kegiatan.id_jadwal = tb_jadwal_kegiatan.id_jadwal AND tgl_kegiatan <= NOW() ");
    return $query;
  }

  function get_detail_arsip($kode)
  {
    $query = $this->db->query("SELECT * FROM tb_kegiatan, tb_jadwal_kegiatan WHERE tb_kegiatan.id_jadwal = tb_jadwal_kegiatan.id_jadwal AND tgl_kegiatan <= NOW() AND id_kegiatan = '$kode' ");
    return $query;
  }

  function uploadDokumentasi()
  {
    $config['upload_path']   = './dokumentasi/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = '2048';
    $config['remove_space']  = TRUE;

      $this->load->library('upload', $config);
      if($this->upload->do_upload('dok') ){
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        return $return;
      }else{
        $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        return $return;
      }
  }

  function simpanDokumentasi($upload)
  {
    $kode = $this->input->post('id_kegiatan');
    $data = array(
      'id_kegiatan' => $kode,
      'foto_kegiatan' => $upload['file']['file_name']
    );
    $this->db->insert('tb_informasi', $data);
  }

  function get_dokumentasi($kode)
  {
    $this->db->select('*');
    $this->db->from('tb_informasi');
    $this->db->where('id_kegiatan', $kode);

    return $this->db->get();
  }






}
