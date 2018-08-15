<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model{

  function get_kegiatan_kode($where)
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan','tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    $this->db->where($where);
    return $this->db->get();
  }

  function get_peserta($id_kegiatan)
  {
    $this->db->select('*');
    $this->db->from('tb_konfirmasi');
    $this->db->join('tb_peserta', 'tb_peserta.NIK = tb_konfirmasi.NIK');
    $this->db->where('tb_konfirmasi.id_kegiatan', $id_kegiatan);
    $this->db->where('tb_konfirmasi.status_informasi','konfirmasi');
    return $this->db->get();
  }

}
