<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta extends CI_Model{

  function get_peserta()
  {
    return $this->db->get('tb_peserta');
  }

  function chek_nik($nik)
  {
    $this->db->select('*');
    $this->db->from('tb_peserta');
    $this->db->where('NIK', $nik);
    return $this->db->get();
  }

  function check_jadwal($jadwal)
  {
    $this->db->select('*');
    $this->db->from('tb_jadwal_kegiatan');
    $this->db->where('id_jadwal', $jadwal);
    return $this->db->get();
  }

}
