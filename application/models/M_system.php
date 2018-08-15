<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_system extends CI_Model{

  function cekdata($data)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where($data);
    return $this->db->get();
  }

  function getUser()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    return $this->db->get();
  }

  function pesertawhere($where)
  {
    $this->db->select('*');
    $this->db->from('tb_peserta');
    $this->db->where($where);

    return $this->db->get();
  }

}
