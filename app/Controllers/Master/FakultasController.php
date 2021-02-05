<?php

namespace App\Controllers\Master;

use CodeIgniter\Controller;

use App\Models\Master\FakultasModel;

class FakultasController extends Controller
{
  protected $fakultas_model;

  public function __construct()
  {
    $this->fakultas_model = new FakultasModel();
  }

  public function index()
  {
    $data['title'] = 'Data Fakultas';
    $data['js'] = 'fakultas.js';

    return view('master/fakultas/fakultas_view', $data);
  }

  public function store()
  {
    $kode_fakultas = $_POST['kode_fakultas'];
    $nama_fakultas = $_POST['nama_fakultas'];

    $data['kode_fakultas'] = $kode_fakultas;
    $data['nama_fakultas'] = $nama_fakultas;

    if (!$this->fakultas_model->insert($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function update()
  {
    $kode_fakultas = $_POST['kode_fakultas'];
    $nama_fakultas = $_POST['nama_fakultas'];

    $data['kode_fakultas'] = $kode_fakultas;
    $data['nama_fakultas'] = $nama_fakultas;

    if ($this->fakultas_model->save($data)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function destroy()
  {
    $kode_fakultas = $_POST['kode_fakultas'];

    if ($this->fakultas_model->delete($kode_fakultas)) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_records()
  {
    $fakultas_model = $this->fakultas_model;
    $where = ['kode_fakultas !=' => ''];
    $column_order   = array('', 'kode_fakultas', 'nama_fakultas', '');
    $column_search  = array('kode_fakultas', 'nama_fakultas');
    $order = array('kode_fakultas' => 'ASC');
    $lists = $fakultas_model->get_datatables('fakultas', $column_order, $column_search, $order, $where);
    $data = array();
    $start = 0;
    if (isset($_POST['start'])) {
      $start = $_POST['start'];
    }

    foreach ($lists as $list) {
      $start++;
      $row    = array();

      $btn_edit = '<a href="javascript:void(0)" class="btn btn-warning btn-sm btn-edit" data-kode_fakultas="' . $list['kode_fakultas'] . '" data-nama_fakultas="' . $list['nama_fakultas'] . '" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></a>';

      $btn_delete = '<button type="button" class="btn btn-danger btn-delete btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" data-kode_fakultas="' . $list['kode_fakultas'] . '"><i class="fas fa-trash-alt"></i></button>';

      $row[]  = $start;
      $row[]  = $list['kode_fakultas'];
      $row[]  = $list['nama_fakultas'];
      $row[]  = $btn_edit . ' ' . $btn_delete;

      $data[] = $row;
    }

    $sEcho = 1;
    if (isset($_POST['draw'])) {
      $sEcho = intval($_POST['draw']);
    }

    $output = array(
      "draw" => $sEcho,
      "recordsTotal" => $fakultas_model->count_all('fakultas', $where),
      "recordsFiltered" => $fakultas_model->count_filtered('fakultas', $column_order, $column_search, $order, $where),
      "data" => $data,
    );

    echo json_encode($output);
  }
}
