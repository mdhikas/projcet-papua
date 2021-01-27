<?php

namespace App\Controllers\Master;

use CodeIgniter\Controller;

use App\Models\Master\JurusanModel;
use App\Models\Master\FakultasModel;

class JurusanController extends Controller {
  protected $jurusan_model;
  protected $fakultas_model;

  public function __construct() {
    $this->jurusan_model = new JurusanModel();
    $this->fakultas_model = new FakultasModel();
  }

  public function index() {
    $data['js'] = 'jurusan.js';
    $data['fakultas'] = $this->fakultas_model->findAll();

    return view('master/jurusan/jurusan_view', $data);
  }

  public function store() {
    $kode_jurusan = $_POST['kode_jurusan'];
    $jenjang = $_POST['jenjang'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $kode_fakultas = $_POST['kode_fakultas'];

    $data['kode_jurusan'] = $kode_jurusan;
    $data['jenjang'] = $jenjang;
    $data['nama_jurusan'] = $nama_jurusan;
    $data['kode_fakultas'] = $kode_fakultas;

    if (!$this->jurusan_model->insert($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function update() {
    $kode_jurusan = $_POST['kode_jurusan'];
    $jenjang = $_POST['jenjang'];
    $nama_jurusan = $_POST['nama_jurusan'];
    $kode_fakultas = $_POST['kode_fakultas'];

    $data['kode_jurusan'] = $kode_jurusan;
    $data['jenjang'] = $jenjang;
    $data['nama_jurusan'] = $nama_jurusan;
    $data['kode_fakultas'] = $kode_fakultas;

    if ($this->jurusan_model->save($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function destroy() {
    $kode_jurusan = $_POST['kode_jurusan'];

    if ($this->jurusan_model->delete($kode_jurusan)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_records() {
    $jurusan_model = $this->jurusan_model;
    $where = ['kode_jurusan !=' => ''];
    $column_order   = array('', 'kode_jurusan', 'jenjang' . ' ' . 'nama_jurusan', 'kode_fakultas', '');
    $column_search  = array('kode_jurusan', 'jenjang', 'nama_jurusan', 'kode_fakultas', 'fakultas.nama_fakultas');
    $order = array('kode_fakultas' => 'ASC');
    $lists = $jurusan_model->get_datatables('jurusan', $column_order, $column_search, $order, $where);
    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }
    
    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $kode_jurusan = "'" . $list['kode_jurusan'] . "'";

      $btn_edit = '<a href="javascript:void(0)" class="btn btn-warning btn-sm btn-edit" data-kode_fakultas="'.$list['kode_fakultas'].'" data-kode_jurusan="'.$list['kode_jurusan'].'" data-jenjang="'.$list['jenjang'].'" data-nama_jurusan="'.$list['nama_jurusan'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

      $btn_delete = '<button type="button" class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="destroy('.$kode_jurusan.')"><i class="fas fa-trash-alt"></i></button>';

      $row[]  = $start;
      $row[]  = $list['kode_jurusan'];
      $row[]  = $list['jenjang'] . ' ' . $list['nama_jurusan'];
      $row[]  = $list['kode_fakultas'];
      $row[]  = $btn_edit . ' ' . $btn_delete;

      $data[] = $row;
    }

    $sEcho = 1;
		if (isset($_POST['draw'])) {
			$sEcho = intval($_POST['draw']);
		}

    $output = array(
        "draw" => $sEcho,
        "recordsTotal" => $jurusan_model->count_all('jurusan', $where),
        "recordsFiltered" => $jurusan_model->count_filtered('jurusan', $column_order, $column_search, $order, $where),
        "data" => $data,
    );

    echo json_encode($output);
  }
}