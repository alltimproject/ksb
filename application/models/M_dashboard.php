<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

  function fetch_validasi()
  {
    $this->db->select('*');
    $this->db->from('tb_konfirmasi');
    $this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan = tb_konfirmasi.id_kegiatan');
    $this->db->join('tb_peserta','tb_peserta.NIK = tb_konfirmasi.NIK');
    $this->db->where('tb_konfirmasi.status_informasi', 'menunggu');
    return $this->db->get();
  }
  function getNamakegiatan($where)
  {
    $this->db->select('*');
    $this->db->from('tb_jadwal_kegiatan');
    $this->db->where($where);
    return $this->db->get();
  }

  function getPeserta($nik)
  {
    $this->db->select('*');
    $this->db->from('tb_peserta');
    $this->db->where('NIK', $nik);
    return $this->db->get();
  }

  function getKegiatan()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_konfirmasi', 'tb_kegiatan.id_kegiatan = tb_konfirmasi.id_kegiatan');

    return $this->db->get();
  }

  function getKegiatan2()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan', 'tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    $this->db->where('tgl_kegiatan >=', date('Y-m-d'));
    return $this->db->get();
  }

  function get_jadwal($id_jadwal)
  {
    $this->db->select('*');
    $this->db->from('tb_jadwal_kegiatan');
    $this->db->where('id_jadwal', $id_jadwal);
    return $this->db->get();
  }

  function get_peserta_jadwal($id)
  {
    $this->db->select('*');
    $this->db->from('tb_konfirmasi');
    $this->db->join('tb_peserta','tb_peserta.NIK = tb_konfirmasi.NIK');
    $this->db->where('tb_konfirmasi.id_kegiatan', $id);
    return $this->db->get();
  }

  function get_detail_kegiatan($where)
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->where($where);
    return $this->db->get();
  }

  function get_kegiatan_dibatalkan()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->where('status_acara', 'dibatalkan');
    return $this->db->get();

  }




}
