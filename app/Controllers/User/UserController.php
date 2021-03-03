<?php

namespace App\Controllers\User;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use App\Models\NilaiMahasiswaModel;
use App\Models\SkpiMahasiswaModel;
use App\Models\IpsModel;

class UserController extends Controller
{
  protected $db, $builder, $users, $mahasiswa_model, $skpi_model;

  public function __construct()
  {
    helper(['nilai', 'text', 'date']);
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('users');
    $this->users   = new UserModel();
    $this->mahasiswa_model = new MahasiswaModel();
    $this->nilai_model = new NilaiMahasiswaModel();
    $this->skpi_model = new SkpiMahasiswaModel();
    $this->ips_model = new IpsModel();
  }

  public function profile($username = false)
  {
    $this->builder->select('users.id as userid, username, users.nim as usernim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin');
    $this->builder->join('mahasiswa', 'mahasiswa.nim = users.nim');
    $this->builder->where('username', $username);
    $query = $this->builder->get();

    $data = [
      'title' => 'My Profile',
      'user' => $query->getRow()
    ];
    // dd($data['user']);
    return view('user/user_profile', $data);
  }

  public function nilai($nim = false)
  {
    $nilai = $this->nilai_model->get_nilai_mahasiswa_by_nim($nim);
    $nilai_ips = $this->ips_model->where(['nim' => $nim])->orderBy('semester', 'ASC')->findAll();

    // $mahasiswa = $this->mahasiswa_model->select('nama')->find($nim);
    $data_js['dtNilai'] = json_encode($nilai_ips);
    $data = [
      'js_inline' => view("mahasiswa/nilai_detail_chart", $data_js),
      'title' => 'KHS',
      'nilai' => $nilai,
    ];
    return view('user/user_nilai', $data);
  }

  // public function skpi($username = false)
  // {
  //     $this->builder->select('judul_kegiatan, tanggal_sertif, nama_penyelenggara, berkas');
  //     $this->builder->join('skpi_mahasiswa', 'skpi_mahasiswa.nim = users.nim');
  //     $this->builder->join('mahasiswa', 'mahasiswa.nim = users.nim');
  //     $this->builder->where('username', $username);
  //     $query = $this->builder->get();

  //     $data = [
  //         'title' => 'Upload SKPI',

  //         'skpi' => $query->getResultArray()
  //     ];
  //     return view('user/user_skpi', $data);
  // }
  public function skpi($username = false)
  {
    $data = [
      'js'    => 'skpi.js',
      'title' => 'Upload SKPI'
    ];

    return view('user/user_skpi', $data);
  }

  public function skpi_create($username = false)
  {
    $data = [
      'js'    => 'skpi.js',
      'title' => 'Tambah SKPI',
    ];
    return view('user/user_skpi_create', $data);
  }

  public function skpi_store()
  {
    $file = $this->request->getFile('file');
    $judul_kegiatan = $_POST['judul_kegiatan'];
    $nama_penyelenggara = $_POST['nama_penyelenggara'];
    $tanggal_sertif = $_POST['tanggal_sertif'];

    $nim = user()->nim;

    if (!$file->isValid()) {
      $data['berkas'] = "";
      return json_encode(['status' => FALSE]);
    } else {
      $ext = $file->getExtension();
      $file->move(ROOTPATH . 'files/skpi/', random_string('unique') . "." . $ext);
      $data['berkas'] = $file->getName();
    }

    $data['nim'] = $nim;
    $data['judul_kegiatan'] = $judul_kegiatan;
    $data['tanggal_sertif'] = $tanggal_sertif;
    $data['nama_penyelenggara'] = $nama_penyelenggara;
    
    if (!$this->skpi_model->insert($data)) {
      return json_encode(['status' => FALSE]);
    } else {
      return json_encode(['status' => TRUE]);
    }
  }

  public function skpi_update() {
    $file = $this->request->getFile('file');
    $id_skpi = $_POST['id_skpi'];
    $judul_kegiatan = $_POST['judul_kegiatan'];
    $nama_penyelenggara = $_POST['nama_penyelenggara'];
    $tanggal_sertif = $_POST['tanggal_sertif'];

    if (isset($file)) {
      $skpi = $this->skpi_model->find($id_skpi);
      $old_file = $skpi['berkas'];
      unlink(ROOTPATH . 'files/skpi/' . $old_file, null);

      $ext = $file->getExtension();
      $file->move(ROOTPATH . 'files/skpi/', random_string('unique') . "." . $ext);
      $data['berkas'] = $file->getName();
    }

    $data['id_skpi'] = $id_skpi;
    $data['judul_kegiatan'] = $judul_kegiatan;
    $data['tanggal_sertif'] = $tanggal_sertif;
    $data['nama_penyelenggara'] = $nama_penyelenggara;

    if (!$this->skpi_model->save($data)) {
      return json_encode(['status' => FALSE]);
    } else {
      return json_encode(['status' => TRUE]);
    }
  }

  public function skpi_destroy() {
    $id_skpi = $_POST['id'];
    $skpi = $this->skpi_model->find($id_skpi);
    unlink(ROOTPATH . 'files/skpi/' . $skpi['berkas'], null);
    if (!$this->skpi_model->delete($id_skpi)) {
      return json_encode(['status' => FALSE]);
    } else {
      return json_encode(['status' => TRUE]);
    }
  }

  public function skpi_get_records() {
    $skpi_model = $this->skpi_model;
    $where = ['id_skpi !=' => 0];
    $column_order   = array('', 'judul_kegiatan', 'tanggal_sertif', 'nama_penyelenggara', '');
    $column_search  = array('judul_kegiatan', 'tanggal_sertif', 'nama_penyelenggara',);
    $order = array('id_skpi' => 'ASC');
    $lists = $skpi_model->get_datatables('skpi_mahasiswa', $column_order, $column_search, $order, $where);

    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }

    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $btn_edit = '<a href="javascript:void(0)" data-id="'.$list['id_skpi'].'" data-judul="'.$list['judul_kegiatan'].'" data-penyelenggara="'.$list['nama_penyelenggara'].'" data-tanggal="'.$list['tanggal_sertif'].'" class="btn btn-warning btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

      $btn_delete = '<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="destroy(' . $list['id_skpi'] . ')"><i class="fas fa-trash-alt"></i></button>';

      $row[]  = $start;
      $row[]  = $list['judul_kegiatan'];
      $row[]  = changeDateFormatToID($list['tanggal_sertif']);
      $row[]  = $list['nama_penyelenggara'];
      $row[]  = $list['berkas'];
      $row[]  = $btn_edit . ' ' . $btn_delete;

      $data[] = $row;
    }

    $sEcho = 1;
    if (isset($_POST['draw'])) {
      $sEcho = intval($_POST['draw']);
    }

    $output = array(
      "draw" => $sEcho,
      "recordsTotal" => $skpi_model->count_all('skpi_mahasiswa', $where),
      "recordsFiltered" => $skpi_model->count_filtered('skpi_mahasiswa', $column_order, $column_search, $order, $where),
      "data" => $data,
    );

    echo json_encode($output);
  }
}
