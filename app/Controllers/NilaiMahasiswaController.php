<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\NilaiMahasiswaModel;
use App\Models\MahasiswaModel;

class NilaiMahasiswaController extends Controller
{
  protected $nilai_model;
  protected $mahasiswa_model;

  public function __construct()
  {
    helper('nilai');
    $this->nilai_model = new NilaiMahasiswaModel();
    $this->mahasiswa_model = new MahasiswaModel();
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

    return view('mahasiswa/nilai_create_view', $data);
  }

  public function store()
  {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_semester = $_POST['kode_semester'];

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
      return json_encode(['status' => 1]);
    } else {
      return json_encode(['status' => 0]);
    }
  }

  public function get_mahasiswa_by_nim()
  {
    $nim = $_POST['query'];

    $data = $this->mahasiswa_model->get_mahasiswa_by_nim($nim);
    $output = "";
    $output .= '<ul class="list-group">';
    if ($data) {
      foreach ($data as $k => $v) {
        $temp_nim = "'" . $v['nim'] . "'";
        $output .= '<li class="list-group-item"><a href="javascript:void(0)" class="nim" onclick="get_list_nilai_mahasiswa(' . $temp_nim . ')">' . $v['nim'] . '</a></li>';
      }
    } else {
      $output .= '<li class="list-group-item">Data Tidak Ditemukan</li>';
    }
    $output .= '</ul>';

    return json_encode(['data' => $output]);
  }

  public function get_list_nilai_mahasiswa()
  {
    $nim = $_GET['nim'];
    $data = $this->nilai_model->get_nilai_mahasiswa_by_nim($nim);
    $mahasiswa = $this->mahasiswa_model->select('nama')->find($nim);

    $output = "";
    if ($data) {
      foreach ($data as $k => $v) {
        $ips = $v['nilai_bobot'] / $v['total_sks'];
        $output .= '
          <tr>
            <td class="text-center">' . ++$k . '</td>
            <td>' . $v['semester'] . '</td>
            <td>' . $v['total_sks'] . '</td>
            <td>' . $v['nilai_bobot'] . '</td>
            <td>' . number_format($ips, 2) . '</td>
          </tr>
        ';
      }
    } else {
      $output .= '
        <tr>
          <td colspan="5" class="text-center">Data Belum Ada</td>
        </tr>
      ';
    }
    $res['nim'] = $nim;
    $res['nama'] = $mahasiswa['nama'];
    $res['data'] = $output;
    return json_encode($res);
  }
}
