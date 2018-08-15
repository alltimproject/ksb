<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_informasi extends CI_Model{

  function getKegiatan_verifikasi()
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan','tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    $this->db->where('tb_kegiatan.status_acara','verifikasi');

    return $this->db->get();
  }

  function get_kegiatan_id($id)
  {
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->join('tb_jadwal_kegiatan', 'tb_jadwal_kegiatan.id_jadwal = tb_kegiatan.id_jadwal');
    $this->db->where('tb_kegiatan.id_kegiatan', $id);
    return $this->db->get();
  }

  function uploadKtp()
  {
    $config['upload_path'] = './upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = '2048';
    $config['remove_space']  = TRUE;

    $this->load->library('upload', $config);
    if($this->upload->do_upload('file') ){
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }

  }

  function simpanPeserta($upload)
  {
    $nik           = $this->input->post('nik');
    $password      = $this->input->post('password');
    $email         = $this->input->post('email');
    $nama_depan    = $this->input->post('nama_depan');
    $nama_belakang = $this->input->post('nama_belakang');
    $alamat        = $this->input->post('alamat');
    $kontak        = $this->input->post('kontak');
    $jk            = $this->input->post('jk');
    $tgl_lahir     = $this->input->post('tgl_lahir');

    $data = array(
      'NIK'           => $nik,
      'email_peserta' => $email,
      'nama_depan'    => $nama_depan,
      'nama_belakang' => $nama_belakang,
      'password'      => $password,
      'alamat'        => $alamat,
      'kontak'        => $kontak,
      'jenis_kelamin' => $jk,
      'tgl_lahir'     => $tgl_lahir,
      'foto'          => $upload['file']['file_name']
    );
    $insert = $this->db->insert('tb_peserta', $data);
    if($insert){
      $this->session->set_flashdata('msg_scs','Terima kasih telah mendaftar, silahkan login dengan email dan password anda');
      redirect(base_url('register') );
    }


  }

  function checknik($nik)
  {
    $this->db->select('*');
    $this->db->from('tb_peserta');
    $this->db->where('nik', $nik);
    return $this->db->get();
  }

  function get_peserta_kegiatan($nik)
  {
    $this->db->select('*');
    $this->db->from('tb_konfirmasi');
    $this->db->where('id_kegiatan', $nik);
    $this->db->where('NIK',$this->session->userdata('nik_active'));
    return $this->db->get();
  }

}
