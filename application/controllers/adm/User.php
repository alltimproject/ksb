<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_system');

    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Kelola User';
    $this->load->view('admin/include/v_header', $data);

    $data['get_user'] = $this->m_system->getUser();
    $this->load->view('admin/v_user', $data);

    $this->load->view('admin/include/v_footer');
  }

  function fetch_user()
  {
    $selectUser = $this->m_system->getUser();
    $output = '
          <div class="card">


          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Kode user</th>
                <th>Username</th>
                <th>Level</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
     ';
     foreach($selectUser->result() as $key){
       $output .= '
            <tr>
            <td>'.$key->kode_user.'</td>
            <td>'.$key->username.'</td>
            <td>'.$key->level.'</td>
            <td>
              <a href="javascript:;" data-kode="'.$key->kode_user.'" data-user="'.$key->username.'" data-level="'.$key->level.'" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil"></i></a>
              <a href-"javascript:;" data-kode="'.$key->kode_user.'" class="btn btn-danger btn-xs btn-hapus"> <i class="fa fa-trash"></i> </a>
            </td>
            </tr>
       ';
     }



    $output .= '
          </tbody>
        </table>
      </div>
    ';



     echo $output;
  }

  function simpanUser()
  {
    $kode_user = $this->input->post('kode_user');
    $username  = $this->input->post('username');
    $level     = $this->input->post('level');
    $pasword   = $this->input->post('password');

    $data = array(
      'kode_user' => $kode_user,
      'username'  => $username,
      'level'     => $level,
      'password'  => $pasword
    );

    $this->db->insert('tb_user', $data);
    echo "berhasil di tambah";

  }

  function hapusUser()
  {
    $kode = $this->input->post('kode');
    $where = array('kode_user' => $kode);
    $this->db->where($where);
    $this->db->delete('tb_user');

    echo "Data user berhasil dihapus";
  }

  function updateUser()
  {
    $kode_user = $this->input->post('kode_user');
    $username  = $this->input->post('username');
    $level     = $this->input->post('level');
    $pasword   = $this->input->post('password');

    $data = array(
      'username' => $username,
      'password' => $pasword,
      'level'    => $level
    );

    $where = array(
      'kode_user' => $kode_user
    );

    $this->db->where($where);
    $this->db->update('tb_user', $data);
    echo "Data user berhasil di update";

  }




}
