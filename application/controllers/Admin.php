<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_system');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('admin/v_login');
  }

  function actionlogin()
  {
    $kode = $this->input->post('kode');
    $pass = $this->input->post('password');

    $data = array(
      'kode_user' => $kode,
      'password'  => $pass
    );

    $cek = $this->m_system->cekdata($data);
    if($cek->num_rows() > 0 )
    {
      foreach($cek->result() as $key_cek)
      {
        $username = $key_cek->username;
        $level    = $key_cek->level;
      }
      $session_user = array(
        'login' => 1,
        'level_active' => $level,
        'user_active'  => $username
      );
      $this->session->set_userdata($session_user);
      if($level == "ADMIN")
      {
        $this->session->set_flashdata('msg','Welcome '.$username );
        redirect(base_url('adm/dashboard') );
      }else if($level == "KETUA")
      {
        $this->session->set_flashdata('msg','Welcome '.$username);
        redirect(base_url('ketua/home') );
      }
    }else{
        $this->session->set_flashdata('msg','Username / Password salah');
        redirect(base_url('admin') );
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin') );
  }

}
