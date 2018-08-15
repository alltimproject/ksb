<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model{

  function get_berita()
  {
    return $this->db->get('tb_berita');
  }

  function getdatacari($cari)
  {
    $query = $this->db->query("SELECT * FROM tb_berita WHERE judul_berita LIKE '%$cari%' ");
    return $query;
  }

}
