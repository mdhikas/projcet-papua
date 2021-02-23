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

  public function get_nilai_mahasiswa_by_nim($nim) {
    $this->builder = $this->db->table($this->table);
    $this->builder->select('nim, semester, sum(sks) as total_sks, sum(sks * bobot) as nilai_bobot');
    $this->builder->groupBy('semester');
    $this->builder->orderBy('semester', 'DESC');
    $this->builder->where('nim', $nim);
    $query = $this->builder->get();
    return $query->getResultArray();
  }
}