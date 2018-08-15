<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpeserta extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_system');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('user/include/v_header');

    $this->load->view('user/v_loginpeserta');

    $this->load->view('user/include/v_footer');
  }

  function aksiLogin()
  {
    $email    = $this->input->post('email');
    $password = $this->input->post('password');

    $where = array(
      'email_peserta' => $email,
      'password'      => $password
    );
    $cek = $this->m_system->pesertawhere($where);
    if($email == '' && $password == ''){
      $this->session->set_flashdata('msg','email / password tidak boleh kosong');
      redirect(base_url('Loginpeserta') );
    }else if($cek->num_rows() > 0 )
    {
      foreach($cek->result() as $peserta)
      {
        $nama_pserta = $peserta->nama_depan.' '.$peserta->nama_belakang;
        $nik_peserta = $peserta->NIK;
      }
      $data_session = array(
        'login_peserta' => 1,
        'peserta_active' => $nama_pserta,
        'nik_active'     => $nik_peserta
      );
      $this->session->set_userdata($data_session);
      $this->session->set_flashdata('msg', 'Welcome'.$nama_pserta);
      redirect(base_url());
    }else{
      $this->session->set_flashdata('msg','email / password salah');
      redirect(base_url('Loginpeserta') );
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url() );
  }





}
