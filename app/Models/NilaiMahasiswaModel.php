<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMahasiswaModel extends Model {
  protected $table      = 'nilai_mahasiswa';
  protected $primaryKey = 'nilai_id';
  protected $allowedFields = ['nim', 'kode_mk', 'sks', 'bobot', 'nilai', 'semester'];

  protected $db;
  protected $bulder;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function insert_batch($data) {
    $this->builder = $this->db->table($this->table);
    return $this->builder->insertBatch($data);
  }
}