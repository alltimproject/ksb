<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model{


  function kode_berita()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(id_berita,2)) AS kode_berita FROM tb_berita WHERE DATE(tgl_berita)=CURDATE() ");
    $kd = "";
    if($q->num_rows() > 0 )
    {
      foreach ($q->result() as $key)
      {
        $tmp = ((int)$key->kode_berita)+1;
        $kd  = sprintf("%02s", $tmp);
      }

    }else{
      $kd = "01";
    }
    $date = date('my');
    return 'BB'.$date.''.$kd;
  }



  function uploadFoto()
  {
    $config['upload_path']   = './images/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = '2048';
    $config['remove_space']  = TRUE;


    $this->load->library('upload', $config);
    if($this->upload->do_upload('foto') ){
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }

  }

  function simpanberita($upload)
  {
    $kode_berita = $this->input->post('kode_berita');
    $judul       = $this->input->post('judul_berita');
    $deskripsi   = $this->input->post('deskripsi_berita');

    $data      = array(
      'id_berita'        => $kode_berita,
      'judul_berita'     => $judul,
      'deskripsi_berita' => $deskripsi,
      'foto_berita'      => $upload['file']['file_name']
    );
    $this->db->insert('tb_berita', $data);
  }

  function getBerita()
  {
    return $this->db->get('tb_berita');
  }

  function get_komentar()
  {
    $this->db->select('*');
    $this->db->from('tb_komentar');
    $this->db->join('tb_berita','tb_berita.id_berita = tb_komentar.id_berita');
    $this->db->where('status_komentar','menunggu');

    return $this->db->get();
  }

  function daftar_komentar()
  {
    $this->db->select('*');
    $this->db->from('tb_komentar');
    $this->db->join('tb_berita','tb_berita.id_berita = tb_komentar.id_berita');
    $this->db->where('status_komentar','konfirmasi');

    return $this->db->get();
  }

  function select_where_berita($id)
  {
    $this->db->select('*');
    $this->db->from("tb_berita");
    $this->db->where('id_berita' , $id);
    return $this->db->get();
  }



}
