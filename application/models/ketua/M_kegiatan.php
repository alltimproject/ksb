<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model{

  function get_kegiatan()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan', 'tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    $this->db->where('tb_kegiatan.status_acara', 'verifikasi');
    return $this->db->get();
  }

}
