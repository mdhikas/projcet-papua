<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NilaiMahasiswaModel;

class NilaiMahasiswaController extends Controller {
  protected $nilai_model;

  public function __construct() {
    $this->nilai_model = new NilaiMahasiswaModel();
  }
  
  public function index() {
    return view('mahasiswa/nilai_view');
  }

  public function create() {
    $data['js'] = 'mahasiswa_nilai.js';

    return view('mahasiswa/nilai_create_view', $data);
  }

  public function store() {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_semester = $_POST['kode_semester'];

    $data = [];
    foreach ($_POST['kode_mk'] as $k => $v) {
      $data[$k]['nim'] = $nim;
      $data[$k]['kode_mk'] = $v;
      $data[$k]['nilai'] = $_POST['grade'][$k];
      $data[$k]['semester'] = $kode_semester;
    }

    $store = $this->nilai_model->insert_batch($data);

    if ($store) {
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }
}