<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kegiatan');
    if($this->session->userdata('login') != 1 )
    {
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Kegiatan';
    $data['kode_kegiatan'] = $this->m_kegiatan->get_id_kegiatan();
    $data['kode_jadwal']   = $this->m_kegiatan->get_id_jadwal();
    $data['jadwal_kegiatan'] = $this->m_kegiatan->fetch_jadwal()->result();
    $this->load->view('admin/include/v_header', $data);
    $this->load->view('admin/v_kegiatan', $data);
    $this->load->view('admin/include/v_footer');
  }

  function simpanJadwal()
  {
      $kd            = $this->input->post('kode_jadwal');
      $nama_kegiatan = $this->input->post('nama_kegiatan');
      $jam_kegiatan  = $this->input->post('jam_kegiatan');
      $tanggal_keg   = $this->input->post('tanggal_kegiatan');
      $tempat        = $this->input->post('tempat_kegiatan');

      $data = array(
        'id_jadwal'     => $kd,
        'nama_kegiatan' => $nama_kegiatan,
        'tgl_kegiatan'  => $tanggal_keg,
        'jam_kegiatan'  => $jam_kegiatan,
        'tempat'        => $tempat
      );
      $this->db->insert('tb_jadwal_kegiatan', $data);
      echo "Berhasil menyimpan jadwal";
  }

  function updateJadwal()
  {
    $kd            = $this->input->post('kode_jadwal');
    $nama_kegiatan = $this->input->post('nama_kegiatan');
    $jam_kegiatan  = $this->input->post('jam_kegiatan');
    $tanggal_keg   = $this->input->post('tanggal_kegiatan');
    $tempat        = $this->input->post('tempat_kegiatan');

    $data = array(
      'nama_kegiatan' => $nama_kegiatan,
      'tgl_kegiatan'  => $tanggal_keg,
      'jam_kegiatan'  => $jam_kegiatan,
      'tempat'        => $tempat
    );
    $where = array(
      'id_jadwal' => $kd
    );
    $this->db->where($where);
    $this->db->update('tb_jadwal_kegiatan', $data);
    echo "Berhasil merubah data jadwal kegiatan";

  }

  function fetch_jadwal()
  {
    $output = "";

    $selectDB  = $this->m_kegiatan->fetch_jadwal();
    if($selectDB->num_rows() > 0 ){
      $output = '
            <div class="card-header">
              <h3 class="card-title"></h3>
              <b>Daftar Jadwal Kegiatan</b>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped" id="example2">
                <tr>
                  <th>#</th>
                  <th style="font-size:82%;">Nama Kegiatan</th>
                  <th style="font-size:82%;">Tanggal Kegiatan</th>
                  <th style="font-size:82%;">Jam Kegiatan</th>
                  <th style="font-size:82%;">Tempat</th>
                  <th style="font-size:92%;"></th>
                </tr>
      ';
      $no = 1;
      foreach($selectDB->result() as $jadwal){
        $cek_exist = $this->m_kegiatan->cek_kodejadwal_exist($jadwal->id_jadwal);
        if($cek_exist->num_rows() > 0 ){
          $tombol = '<a style="font-size:85%;" href="#form-jadwal-kegiatan" data-id="'.$jadwal->id_jadwal.'" data-nama="'.$jadwal->nama_kegiatan.'" data-tgl="'.$jadwal->tgl_kegiatan.'" data-jam="'.$jadwal->jam_kegiatan.'" data-tempat="'.$jadwal->tempat.'" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil"></i></a>';
        }else{
          $tombol = '<a style="font-size:85%;" href="#form-jadwal-kegiatan" data-id="'.$jadwal->id_jadwal.'" data-nama="'.$jadwal->nama_kegiatan.'" data-tgl="'.$jadwal->tgl_kegiatan.'" data-jam="'.$jadwal->jam_kegiatan.'" data-tempat="'.$jadwal->tempat.'" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil"></i></a> ';
          $tombol .= '<a style="font-size:85%;" class="btn btn-danger btn-xs btn-hapus-jadwal" data-id="'.$jadwal->id_jadwal.'"><i class="fa fa-trash"></i></a>';
        }
        $output .= '
        <tr>
          <td>'.$no++.'</td>
          <td>'.$jadwal->nama_kegiatan.'</td>
          <td>'.$jadwal->tgl_kegiatan.'</td>
          <td>'.$jadwal->jam_kegiatan.'</td>
          <td>'.$jadwal->tempat.'</td>
          <td>'.$tombol.'</td>
        </tr>
        ';
      }
        $output .= '
          </table>
        </div>
        ';
    }
    echo $output;
  }

  function fetch_kegiatan()
  {
    $select = $this->m_kegiatan->getallkegiatan();
    $output = '
        <div class="card-header">
          <h3 class="card-title"></h3>
          <b>Daftar Kegiatan</b>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped" id="example2">
            <tr>
              <th>#</th>
              <th style="font-size:82%;">ID Kegiatan</th>
              <th style="font-size:82%;">Nama Kegiatan</th>
              <th style="font-size:82%;">Tanggal Kegiatan</th>
              <th style="font-size:82%;" width="45%">Deskripsi</th>
              <th style="font-size:82%;">Status Acara</th>
              <th> </th>
            </tr>
    ';
    $no = 1;
    if($select->num_rows() > 0 )
    {

      foreach($select->result() as $data )
      {
        $output .= '
        <tr>
          <td>'.$no++.'</td>
          <td>'.$data->id_kegiatan.'</td>
          <td>'.$data->nama_kegiatan.'</td>
          <td>'.$data->tgl_kegiatan.'<br>'.$data->jam_kegiatan.'</td>
          <td>'.$data->deskripsi.'</td>
          <td>'.$data->status_acara.'</td>
          <td>
            <a href="#form-kegiatan" data-id="'.$data->id_kegiatan.'" data-jadwal="'.$data->id_jadwal.'" data-deskripsi="'.$data->deskripsi.'" class="btn btn-info btn-edit-kegiatan"><i class="fa fa-pencil"></i></a>
            <a href="javascript:;" data-id="'.$data->id_kegiatan.'" class="btn btn-danger btn-hapus-kegiatan"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        ';
      }
      $output .= '
          </table>
        </div>
      ';

    }


    echo $output;
  }

  function fetch_box()
  {
    $selectDB = $this->m_kegiatan->fetch_jadwal();
    $output = '
        <div class="small-box bg-info">
          <div class="inner">
            <h3>'.$selectDB->num_rows().'</h3>

            <p>Jadwal Kegiatan</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>

        </div>

    ';
    echo $output;
  }
  function fetch_box2()
  {
    $selectDB = $this->m_kegiatan->getallkegiatan();
    $output = '
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>'.$selectDB->num_rows().'</h3>

            <p>Kegiatan</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>

        </div>

    ';

    echo $output;
  }

  function get_kode_jadwal()
  {
    $data = $this->m_kegiatan->get_id_jadwal();
    echo json_encode($data);
  }
  function get_kode_kegiatan()
  {
    $data = $this->m_kegiatan->get_id_kegiatan();
    echo json_encode($data);
  }

  function showJadwal($kode)
  {
    $where = array('id_jadwal' => $kode);
    $data  = $this->m_kegiatan->getJadwal_id($where)->result();
    echo json_encode($data);
  }

  function simpanKegiatan()
  {
    $id         = $this->input->post('id_kegiatan');
    $kode       = $this->input->post('jadwal_kegiatan');
    $deskripsi  = $this->input->post('deskripsi');

    $cek_kodejadwal_exist = $this->m_kegiatan->cek_kodejadwal_exist($kode);
    if($cek_kodejadwal_exist->num_rows() > 0 ){
      echo "kode jadwal sudah digunakan , silahkan gunkan jadwal lain";
    }else{
      $data = array(
        'id_kegiatan'   => $id,
        'id_jadwal'     => $kode,
        'deskripsi'     => $deskripsi,
        'status_acara'  => 'proses'
      );
      $this->db->insert('tb_kegiatan', $data);
      echo "Kegiatan Berhasil Di Tambahkan ";
    }
  }

  function hapusJadwal()
  {
    $id_jadwal = $this->input->post('id_jadwal');
    $where = array('id_jadwal' => $id_jadwal);
    $this->db->where($where);
    $this->db->delete('tb_jadwal_kegiatan');
    echo "Jadwal Berhasil Dihapus";
  }

  function updateKegiatan()
  {
    $id_kegiatan = $this->input->post('id_kegiatan');
    $jadwal      = $this->input->post('jadwal_kegiatan');
    $deskripsi   = $this->input->post('deskripsi');

    $where = array(
      'id_kegiatan' => $id_kegiatan
    );
    $data  = array(
      'deskripsi'   => $deskripsi
    );

    $this->db->where($where);
    $this->db->update('tb_kegiatan', $data);
    echo "Kegiatan Berhasil dirubah";
  }

  function hapusKegiatan()
  {
    $id_kegiatan = $this->input->post('id_kegiatan');

    $where = array('id_kegiatan' => $id_kegiatan);
    $this->db->where($where);
    $this->db->delete('tb_kegiatan');
    echo "Kegiatan berhasil di hapus .. ";
  }




}
