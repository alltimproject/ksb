<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tanggal');
    $this->load->model('user/m_berita');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('user/include/v_header');

    $data['get_berita'] = $this->m_berita->get_berita();
    $this->load->view('user/v_berita', $data);

    $this->load->view('user/include/v_footer');
  }

  function cariberita()
  {
    $cari = $this->input->post('cari');

    $selectDB =  $this->m_berita->getdatacari($cari);

    $output = '
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            ';
    if($cari == ""){
      $output .= '
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h2 class="text-center">Pencarian tidak boleh kosong , silahkan input pencariannya</h2>
                      </div>
                    </div>
                </div>

      ';
    }else if($selectDB->num_rows() > 0 ){
      $output .= '<div class="col-md-12">
                      <div class="card bg-info">
                        <div class="card-header">
                          <h2 class="text-center">Hasil pencarian : '.$selectDB->num_rows().' Berita</h2>
                        </div>
                      </div>
                  </div>';
      foreach($selectDB->result() as $key){
        $output .= '
                  <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h2>'. $key->judul_berita.'. <a class="btn btn-warning" href='.base_url('dashboard/detailberita/'.$key->id_berita).'>Lihat berita</a> </h2>
                        </div>
                      </div>
                  </div>
                ';
      }
    }else{
      $output .= '
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h2 class="text-center">Oppss .. Pencarian tidak ditemukan</h2>
                      </div>
                    </div>
                </div>
              ';
    }


     $output .= '
            </div>
          </div>
        </div>



    ';



    echo $output;


  }

}
