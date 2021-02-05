<?php

namespace App\Controllers\Master;

use CodeIgniter\Controller;

use App\Models\Master\MataKuliahModel;
use App\Models\Master\JurusanModel;

class MataKuliahController extends Controller {
  protected $matkul_model;
  protected $jurusan_model;

  public function __construct() {
    $this->matkul_model = new MataKuliahModel();
    $this->jurusan_model = new JurusanModel();
  }

  public function index() {
    $data['js'] = 'matkul.js';
    $data['jurusan'] = $this->jurusan_model->findAll();

    return view('master/matkul/matkul_view', $data);
  }

  public function store() {
    $kode_jurusan = $_POST['kode_jurusan'];
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];

    $data = [];
    foreach ($kode_matkul as $km_key => $km_value) {
      $data[$km_key]['kode_jurusan'] = $kode_jurusan;
      $data[$km_key]['kode_mk'] = $km_value;
      $data[$km_key]['nama_mk'] = $nama_matkul[$km_key];
      $data[$km_key]['jumlah_sks'] = $sks[$km_key];
    }

    $result = $this->matkul_model->insert_batch($data);
    return json_encode($result);
  }

  public function update() {
    $kode_jurusan = $_POST['kode_jurusan'];
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];

    $data['kode_mk'] = $kode_matkul;
    $data['nama_mk'] = $nama_matkul;
    $data['jumlah_sks'] = $sks;
    $data['kode_jurusan'] = $kode_jurusan;

    if ($this->matkul_model->save($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function destroy() {
    $kode_matkul = $_POST['kode_matkul'];

    if ($this->matkul_model->delete($kode_matkul)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_matkul_by_kode_mk() {
    $kode_mk = $_GET['query'];
    $index = $_GET['index'];

    $data = $this->matkul_model->get_matkul_by_kode_mk($kode_mk);

    $output = "";
    $output .= '<ul class="list-group">';
    if ($data) {
      foreach ($data as $k => $v) {
        $temp_kode_mk = "'" . $v['kode_mk'] . "'";
        $output .= '<li class="list-group-item"><a href="javascript:void(0)" onclick="get_nama_matkul('. $index .', '.$temp_kode_mk.')">'.$v['kode_mk'].'</a></li>';
      }
    } else {
      $output .= '<li class="list-group-item">Data Tidak Ditemukan</li>';
    }
    $output .= '</ul>';

    return json_encode(['data' => $output]);
  }

  public function get_nama_matkul_by_kode_mk() {
    $kode_mk = $_GET['kode_mk'];
    $matkul = $this->matkul_model->select('nama_mk, jumlah_sks')->find($kode_mk);
    return json_encode(['nama_mk' => $matkul['nama_mk'], 'sks' => $matkul['jumlah_sks']]);
  }

  public function get_records() {
    $matkul_model = $this->matkul_model;
    $where = ['kode_mk !=' => ''];
    $column_order   = array('', 'nama_jurusan', 'kode_mk', 'nama_mk', 'jumlah_sks', '');
    $column_search  = array('kode_mk', 'nama_mk', 'jumlah_sks', 'jurusan.kode_jurusan', 'jurusan.jenjang', 'jurusan.nama_jurusan');
    $order = array('kode_mk' => 'ASC');
    $lists = $matkul_model->get_datatables('mata_kuliah', $column_order, $column_search, $order, $where);
    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }
    
    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $kode_mk = "'" . $list['kode_mk'] . "'";
      $btn_edit = '<a href="javascript:void(0)" class="btn btn-warning btn-sm btn-edit" data-kode_jurusan="'.$list['kode_jurusan'].'" data-kode_mk="'.$list['kode_mk'].'" data-nama_mk="'.$list['nama_mk'].'" data-sks="'.$list['jumlah_sks'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

      $btn_delete = '<button type="button" class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="destroy('.$kode_mk.')"><i class="fas fa-trash-alt"></i></button>';

      $row[]  = $start;
      $row[]  = $list['jenjang'] . ' ' . $list['nama_jurusan'];
      $row[]  = $list['kode_mk'];
      $row[]  = $list['nama_mk'];
      $row[]  = $list['jumlah_sks'];
      $row[]  = $btn_edit . ' ' . $btn_delete;

      $data[] = $row;
    }

    $sEcho = 1;
		if (isset($_POST['draw'])) {
			$sEcho = intval($_POST['draw']);
		}

    $output = array(
        "draw" => $sEcho,
        "recordsTotal" => $matkul_model->count_all('mata_kuliah', $where),
        "recordsFiltered" => $matkul_model->count_filtered('mata_kuliah', $column_order, $column_search, $order, $where),
        "data" => $data,
    );

    echo json_encode($output);
  }
}