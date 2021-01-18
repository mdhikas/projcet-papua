<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class JurusanModel extends Model {
  protected $table      = 'jurusan';
  protected $primaryKey = 'kode_jurusan';
  protected $allowedFields = ['kode_jurusan', 'jenjang', 'nama_jurusan', 'kode_fakultas'];
}