<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MahasiswaController extends Controller {
  public function index() {
    return view('mahasiswa/mahasiswa_view');
  }
}