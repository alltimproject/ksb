<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_berita');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Berita ';
    $this->load->view('admin/include/v_header', $data);

    $data['kode_berita'] = $this->m_berita->kode_berita();
    $data['berita'] = $this->m_berita->getBerita()->result();
    $this->load->view('admin/v_berita', $data);
    $this->load->view('admin/include/v_footer');
  }

  function simpanberita()
  {
    $data = array();

      if($this->input->post('submit') )
      {
        $upload = $this->m_berita->uploadFoto();
        if($upload['result'] == "success"){
        $this->m_berita->simpanberita($upload);
        redirect(base_url('adm/berita') );
      }else{
        $data['message'] = $upload['error'];
      }
    }

    echo print_r($data);
  }

  function showKomentar()
  {
    $select_komentar = $this->m_berita->get_komentar();
    $daftar_komentar = $this->m_berita->daftar_komentar();
    $output = '
      <div class="card-header">
        <h3 class="card-title">
            <b>'.$select_komentar->num_rows().' Daftar validasi Komentar </b>
        </h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <tr>
            <th>#</th>
            <th style="font-size:82%;">Email</th>
            <th style="font-size:82%;">Isi Komentar</th>
            <th style="font-size:82%;">Tanggal Komentar</th>
            <th style="font-size:82%;">Judul Berita</th>
            <th> Opsi </th>
          </tr>
    ';
    $no = 1;
    if($select_komentar->num_rows() > 0 ){
      foreach($select_komentar->result() as $key){
        $output .= '
             <tr>
             <td>'.$no++.' </td>
             <td>'.$key->email.'</td>
             <td>'.$key->isi_komentar.' </td>
             <td>'.$key->tgl_komentar.'</td>
             <td>'.$key->judul_berita.'</td>
             <td>
             <button type="button" data-status="'.$key->status_komentar.'" data-email="'.$key->email.'" data-id_berita="'.$key->id_berita.'" class="btn btn-info btn-xs btn-validasi" data-toggle="modal" data-target="#myModal">Verifikasi</button>
              </td>
             </tr>
        ';
      }

      $output .= '
        </table>
        </div>
      ';
    }else{
      $output .= '<tr><td colspan="5" class="text-center"> Tidak ada komentar yang di validasi </td></tr> ';
    }



    $output .= '
      <div class="card-header">
        <h3 class="card-title">
          <b>'.$daftar_komentar->num_rows().' Daftar Komentar </b>
        </h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <tr>
            <th>#</th>
            <th style="font-size:82%;">Email</th>
            <th style="font-size:82%;">Isi Komentar</th>
            <th style="font-size:82%;">Tanggal Komentar</th>
            <th style="font-size:82%;">Judul Berita</th>

          </tr>
    ';
    $no = 1;
    foreach($daftar_komentar->result() as $key){
      $output .= '
           <tr>
           <td>'.$no++.' </td>
           <td>'.$key->email.'</td>
           <td>'.$key->isi_komentar.' </td>
           <td>'.$key->tgl_komentar.'</td>
           <td>'.$key->judul_berita.'</td>

           </tr>
      ';
    }

    $output .= '
      </table>
      </div>
    ';





    echo $output;
  }

  function validasi_komentar()
  {
    $id_berita = $this->input->post('id_berita');
    $email     = $this->input->post('email');

    $data = array(
      'status_komentar' => 'konfirmasi'
    );

    $where = array(
      'id_berita' => $id_berita,
      'email'     => $email
    );

    $this->db->where($where);
    $this->db->update('tb_komentar', $data);
  }

  function hapusBerita($id)
  {
    $where = array('id_berita' => $id);
    $this->db->where($where);
    $this->db->delete('tb_berita');
    redirect(base_url('adm/berita') );
  }

  function updateBerita()
  {
    $kode  = $this->input->post('kode_berita');
    $judul = $this->input->post('judul_berita');
    $desk  = $this->input->post('deskripsi_berita');


    $data  = array(
      'judul_berita' => $judul,
      'deskripsi_berita' => $desk
    );
    $where = array('id_berita' => $kode);
    $this->db->where($where);
    $this->db->update('tb_berita', $data);

    $this->session->set_flashdata('msg', 'Berita berhasil di update');
    redirect(base_url('adm/berita') );
  }



}
