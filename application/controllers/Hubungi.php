<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi extends CI_Controller{


  function index()
  {
    $this->load->view('user/include/v_header');


    $this->load->view('user/include/v_footer');
  }

  function tentangkami()
  {
    $this->load->view('user/include/v_header');

    $this->load->view('user/v_tentangkami');

    $this->load->view('user/include/v_footer');
  }

}
