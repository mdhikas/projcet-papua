<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\MahasiswaModel;
use App\Models\Master\JurusanModel;

class MahasiswaController extends Controller {
  protected $mahasiswa_model;
  protected $jurusan_model;
  protected $uri;

  public function __construct() {
    $this->mahasiswa_model = new MahasiswaModel();
    $this->jurusan_model = new JurusanModel();
    $this->uri = new \CodeIgniter\HTTP\URI();
    $this->uri = service('uri');
  }

  public function index() {
    $data['js'] = 'mahasiswa.js';
    return view('mahasiswa/mahasiswa_view', $data);
  }

  public function create() {
    $data['js'] = 'mahasiswa.js';
    $data['jurusan'] = $this->jurusan_model->findAll();

    return view('mahasiswa/mahasiswa_create_view', $data);
  }

  public function store() {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $jurusan = $_POST['jurusan'];

    $data['nim'] = $nim;
    $data['nama'] = $nama;
    $data['tempat_lahir'] = $tempat_lahir;
    $data['tanggal_lahir'] = $tanggal_lahir;
    $data['email'] = $email;
    $data['jenis_kelamin'] = $jenis_kelamin;
    $data['nik'] = $nik;
    $data['kode_jurusan'] = $jurusan;

    if ($this->mahasiswa_model->insert($data)) {
      return json_encode(['status' => 0]);
    } else {
      return json_encode(['status' => 1]);
    }
  }

  public function edit() {
    $nim = $this->uri->getSegment(3);

    $data['js'] = 'mahasiswa.js';
    $data['jurusan'] = $this->jurusan_model->findAll();
    $data['mahasiswa'] = $this->mahasiswa_model->find($nim);
    
    return view('mahasiswa/mahasiswa_edit_view', $data);
  }

  public function update() {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nik = $_POST['nik'];
    $jurusan = $_POST['jurusan'];

    $data['nim'] = $nim;
    $data['nama'] = $nama;
    $data['tempat_lahir'] = $tempat_lahir;
    $data['tanggal_lahir'] = $tanggal_lahir;
    $data['email'] = $email;
    $data['jenis_kelamin'] = $jenis_kelamin;
    $data['nik'] = $nik;
    $data['kode_jurusan'] = $jurusan;

    if ($this->mahasiswa_model->save($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function destroy() {
    $nim = $_POST['nim'];

    if ($this->mahasiswa_model->delete($nim)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_mahasiswa_by_nim() {
    $nim = $_POST['query'];

    $data = $this->mahasiswa_model->get_mahasiswa_by_nim($nim);
    $output = "";
    $output .= '<ul class="list-group">';
    if ($data) {
      foreach ($data as $k => $v) {
        $temp_nim = "'" . $v['nim'] . "'";
        $output .= '<li class="list-group-item"><a href="javascript:void(0)" class="nim" onclick="get_nama_mahasiswa('.$temp_nim.')">'.$v['nim'].'</a></li>';
      }
    } else {
      $output .= '<li class="list-group-item">Data Tidak Ditemukan <br><a href="'.base_url('mahasiswa/create').'">+ Tambah Mahasiswa</a></li>';
    }
    $output .= '</ul>';

    return json_encode(['data' => $output]);
  }
    
  public function get_nama_mahasiswa_by_nim() {
    $nim = $_POST['nim'];

    $mahasiswa = $this->mahasiswa_model->select('nama')->find($nim);

    return json_encode(['nama' => $mahasiswa['nama']]);
  }

  public function get_records() {
    $mahasiswa_model = $this->mahasiswa_model;
    $where = ['nim !=' => 0];
    $column_order   = array('', 'nim', 'nama', 'email', 'jurusan.nama_jurusan', '');
    $column_search  = array('nim', 'nama', 'email', 'jurusan.jenjang', 'jurusan.nama_jurusan');
    $order = array('nim' => 'ASC');
    $lists = $mahasiswa_model->get_datatables('mahasiswa', $column_order, $column_search, $order, $where);
    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
        $start = $_POST['start'];
    }
    
    foreach ($lists as $list) {
        $start++;
        $row    = array();

        $btn_edit = '<a href="'. base_url('mahasiswa/edit/' . $list['nim']) .'" class="btn btn-warning btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

        $btn_delete = '<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="destroy('. $list['nim'] .')"><i class="fas fa-trash-alt"></i></button>';

        $row[]  = $start;
        $row[]  = $list['nim'];
        $row[]  = $list['nama'];
        $row[]  = $list['email'];
        $row[]  = $list['jenjang'] . " " . $list['nama_jurusan'];
        $row[]  = $btn_edit . ' ' . $btn_delete;

        $data[] = $row;
    }

    $sEcho = 1;
		if (isset($_POST['draw'])) {
			$sEcho = intval($_POST['draw']);
		}

    $output = array(
        "draw" => $sEcho,
        "recordsTotal" => $mahasiswa_model->count_all('mahasiswa', $where),
        "recordsFiltered" => $mahasiswa_model->count_filtered('mahasiswa', $column_order, $column_search, $order, $where),
        "data" => $data,
    );

    echo json_encode($output);
  }
}