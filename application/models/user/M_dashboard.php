<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  function getBerita()
  {
    return $this->db->get('tb_berita');
  }
  function get_detail_berita($id)
  {
    $this->db->select('*');
    $this->db->from('tb_berita');
    $this->db->where($id);

    return $this->db->get();
  }
  function getKegiatanVerifikasi()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->where('status_acara','verifikasi');
    return $this->db->get();
  }

  function get_komentar_berita($where)
  {
    $this->db->select('*');
    $this->db->from('tb_komentar');
    $this->db->where($where);
    $this->db->where('status_komentar','konfirmasi');

    return $this->db->get();
  }

  function get_komentar()
  {
    $this->db->select('*');
    $this->db->from('tb_komentar');
    $this->db->join('tb_berita', 'tb_berita.id_berita = tb_komentar.id_berita');
    return $this->db->get();
  }

  function getBerita_dashboard()
  {
    $query = $this->db->query("SELECT * FROM tb_berita LIMIT 4");
    return $query;
  }

}
