<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NilaiMahasiswaModel;
use App\Models\MahasiswaModel;
use App\Models\IpsModel;
use App\Models\Master\SemesterModel;

class NilaiMahasiswaController extends Controller
{
  protected $nilai_model;
  protected $mahasiswa_model;
  protected $ips_model;
  protected $semester_model;
  protected $uri;

  public function __construct()
  {
    helper('nilai');
    $this->nilai_model = new NilaiMahasiswaModel();
    $this->mahasiswa_model = new MahasiswaModel();
    $this->ips_model = new IpsModel();
    $this->semester_model = new SemesterModel();
    $this->uri = new \CodeIgniter\HTTP\URI();
    $this->uri = service('uri');
  }

  public function index()
  {
    $data['title'] = 'Nilai';
    $data['js'] = 'mahasiswa_nilai.js';

    return view('mahasiswa/nilai_view', $data);
  }

  public function create()
  {
    $data['title'] = 'Tambah Nilai';
    $data['js'] = 'mahasiswa_nilai.js';
    $data['semester'] = $this->semester_model->orderBy('kode_semester', 'DESC')->findAll();

    return view('mahasiswa/nilai_create_view', $data);
  }

  public function store()
  {

    $nim = $_POST['nim'];
    $kode_semester = $_POST['kode_semester'];
    $total_sks = $_POST['total_sks'];
    $ips = $_POST['ips'];

    $data = [];
    foreach ($_POST['kode_mk'] as $k => $v) {
      $data[$k]['nim'] = $nim;
      $data[$k]['kode_mk'] = $v;
      $data[$k]['nilai'] = $_POST['grade'][$k];
      $data[$k]['sks'] = $_POST['sks'][$k];
      $data[$k]['bobot'] = bobot($_POST['grade'][$k]);
      $data[$k]['semester'] = $kode_semester;
    }

    $store = $this->nilai_model->insert_batch($data);

    if ($store) {
      $data_ips['nim'] = $nim;
      $data_ips['jumlah_sks'] = $total_sks;
      $data_ips['ips'] = round($ips, 2);
      $data_ips['semester'] = $kode_semester;

      $store_ips = $this->ips_model->insert($data_ips);
      if ($store_ips) {
        return json_encode(['status' => 1]);
      } else {
        return json_encode(['status' => 0]);
      }
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function show()
  {
    $nim = $this->uri->getSegment(4);

    $mahasiswa = $this->mahasiswa_model->find($nim);
    $nilai_mahasiswa = $this->ips_model->where(['nim' => $nim])->orderBy('semester', 'ASC')->findAll();
    $data['title'] = 'Detail Nilai';
    $data['mahasiswa'] = $mahasiswa;
    $data['nilai'] = $nilai_mahasiswa;

    return view('mahasiswa/nilai_detail_view', $data);
  }

  public function get_records()
  {
    $ips_model = $this->ips_model;
    $where = ['id_ips !=' => 0];
    $column_order   = array('', 'nim', 'nama', 'jurusan.nama_jurusan', 'jumlah_sks', 'ips', '');
    $column_search  = array('nim', 'nama', 'jurusan.jenjang', 'jurusan.nama_jurusan', 'jumlah_sks', 'ips');
    $order = array('id_ips' => 'ASC');
    $lists = $ips_model->get_datatables('ips_mahasiswa', $column_order, $column_search, $order, $where);

    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }

    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $btn_detail = '<a href="' . base_url('mahasiswa/nilai/detail/' . $list['nim']) . '" class="btn btn-primary btn-sm btn-flat">Detail</a>';

      $row[]  = $start;
      $row[]  = $list['nim'];
      $row[]  = $list['nama'];
      $row[]  = $list['jenjang'] . " " . $list['nama_jurusan'];
      $row[]  = $list['total_sks'];
      $row[]  = number_format($list['ipk'], 2);
      $row[]  = $btn_detail;

      $data[] = $row;
    }

    $sEcho = 1;
    if (isset($_POST['draw'])) {
      $sEcho = intval($_POST['draw']);
    }

    $output = array(
      "draw" => $sEcho,
      "recordsTotal" => $ips_model->count_all('ips_mahasiswa', $where),
      "recordsFiltered" => $ips_model->count_filtered('ips_mahasiswa', $column_order, $column_search, $order, $where),
      "data" => $data,
    );

    echo json_encode($output);
  }
}
