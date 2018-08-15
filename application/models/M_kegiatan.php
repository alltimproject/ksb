<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model{

  function get_id_jadwal()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(id_jadwal,2)) AS kd_jadwal FROM tb_jadwal_kegiatan WHERE DATE(tgl_post)=CURDATE() ");
    $kd = "";
    if($q->num_rows() > 0 )
    {
      foreach ($q->result() as $key)
      {
        $tmp = ((int)$key->kd_jadwal)+1;
        $kd  = sprintf("%02s", $tmp);
      }

    }else{
      $kd = "01";
    }
    $date = date('my');
    return $date.''.$kd;
  }



  function get_id_kegiatan()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(id_kegiatan, 2)) AS kd_kegiatan FROM tb_kegiatan WHERE DATE(tgl_post_kegiatan)=CURDATE() ");
    $kd = "";
    if($q->num_rows() > 0 )
    {
      foreach($q->result() as $key)
      {
        $tmp = ((int)$key->kd_kegiatan)+1;
        $kd  = sprintf("%02s", $tmp);
      }
    }else{
      $kd = "01";
    }
    $date = date('my');
    return $date.''.$kd;
  }

  function fetch_jadwal()
  {
    return $this->db->get('tb_jadwal_kegiatan');
  }

  function getJadwal_id($where)
  {
    $this->db->select('*');
    $this->db->from('tb_jadwal_kegiatan');
    $this->db->where($where);
    return $this->db->get();
  }

  function getallkegiatan()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan', 'tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    return $this->db->get();
  }

  function cek_kodejadwal_exist($kode)
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->where('id_jadwal', $kode);
    return $this->db->get();
  }

}
