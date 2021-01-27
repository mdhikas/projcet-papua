<?php

namespace App\Controllers\Master;

use CodeIgniter\Controller;

use App\Models\Master\SemesterModel;

class SemesterController extends Controller {
  protected $semester_model;

  public function __construct() {
    $this->semester_model = new SemesterModel();
  }

  public function index() {
    $data['js'] = 'semester.js';

    return view('master/semester/semester_view', $data);
  }

  public function store() {
    $kode_semester = $_POST['kode_semester'];
    $keterangan = $_POST['keterangan'];

    $data['kode_semester'] = $kode_semester;
    $data['keterangan'] = $keterangan;

    if (!$this->semester_model->insert($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function update() {
    $kode_semester = $_POST['kode_semester'];
    $keterangan = $_POST['keterangan'];

    $data['kode_semester'] = $kode_semester;
    $data['keterangan'] = $keterangan;

    if ($this->semester_model->save($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function destroy() {
    $kode_semester = $_POST['kode_semester'];

    if ($this->semester_model->delete($kode_semester)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_records() {
    $semester_model = $this->semester_model;
    $where = ['kode_semester !=' => ''];
    $column_order   = array('', 'kode_semester', 'keterangan', '');
    $column_search  = array('kode_semester', 'keterangan');
    $order = array('kode_semester' => 'ASC');
    $lists = $semester_model->get_datatables('semester', $column_order, $column_search, $order, $where);
    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }

    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $kode_semester = "'" . $list['kode_semester'] . "'";
      $btn_edit = '<a href="javascript:void(0)" class="btn btn-warning btn-sm btn-edit" data-kode_semester="'.$list['kode_semester'].'" data-keterangan="'.$list['keterangan'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

      $btn_delete = '<button type="button" class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="destroy('.$kode_semester.')"><i class="fas fa-trash-alt"></i></button>';

      $row[]  = $start;
      $row[]  = $list['kode_semester'];
      $row[]  = $list['keterangan'];
      $row[]  = $btn_edit . ' ' . $btn_delete;

      $data[] = $row;
    }

    $sEcho = 1;
		if (isset($_POST['draw'])) {
			$sEcho = intval($_POST['draw']);
		}

    $output = array(
        "draw" => $sEcho,
        "recordsTotal" => $semester_model->count_all('semester', $where),
        "recordsFiltered" => $semester_model->count_filtered('semester', $column_order, $column_search, $order, $where),
        "data" => $data,
    );

    echo json_encode($output);
  }
}