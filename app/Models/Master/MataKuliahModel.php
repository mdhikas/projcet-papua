<?php

namespace App\Models\Master;

use CodeIgniter\Model;

class MataKuliahModel extends Model {
  protected $table      = 'mata_kuliah';
  protected $primaryKey = 'kode_mk';
  protected $allowedFields = ['kode_mk', 'nama_mk', 'jumlah_sks', 'kode_jurusan'];

  protected $db;
  protected $builder;

  public function __construct() {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  public function insert_batch($data) {
    $this->builder = $this->db->table($this->table);
    return $this->builder->insertBatch($data);
  }

  public function get_matkul_by_kode_mk($kode_mk) {
    $this->builder = $this->db->table($this->table);
    $this->builder->like('kode_mk', $kode_mk);
    $query = $this->builder->get();
    return $query->getResultArray();
  }

  protected function _get_datatables_query($table, $column_order, $column_search, $order) {
    $this->builder = $this->db->table($table);

    $i = 0;

    foreach ($column_search as $item) {
      if (isset($_POST['search']['value'])) {
        if ($i === 0) {
          $this->builder->groupStart();
          $this->builder->like($item, $_POST['search']['value']);
        } else {
          $this->builder->orLike($item, $_POST['search']['value']);
        }

        if (count($column_search) - 1 == $i)
          $this->builder->groupEnd();
      }
      $i++;
    }

    if (isset($_POST['order'])) {
      $this->builder->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($order)) {
       $order = $order;
      $this->builder->orderBy(key($order), $order[key($order)]);
    }
  }

  public function get_datatables($table, $column_order, $column_search, $order, $data = '') {
    $this->_get_datatables_query($table, $column_order, $column_search, $order);
    
    if (isset($_POST['length']) && $_POST['length'] != -1)
      $this->builder->limit($_POST['length'], $_POST['start']);
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->select('kode_mk, nama_mk, jumlah_sks, jurusan.kode_jurusan, jurusan.jenjang, jurusan.nama_jurusan');
    $this->builder->join('jurusan', 'jurusan.kode_jurusan = mata_kuliah.kode_jurusan');
    $query = $this->builder->get();
    return $query->getResultArray();
 }

  public function count_filtered($table, $column_order, $column_search, $order, $data = '') {
    $this->_get_datatables_query($table, $column_order, $column_search, $order);
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->get();
    return $this->builder->countAll();
  }

  public function count_all($table, $data = '') {
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->from($table);
    return $this->builder->countAll();
  }
}