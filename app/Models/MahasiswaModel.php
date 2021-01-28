<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table      = 'mahasiswa';
  protected $primaryKey = 'nim';
  protected $allowedFields = ['nim', 'nama', 'tanggal_lahir', 'tempat_lahir', 'email', 'jenis_kelamin', 'nik', 'kode_jurusan'];

  protected $db;
  protected $builder;

  public function __construct()
  {
    parent::__construct();
    $this->db = \Config\Database::connect();
  }

  protected function _get_datatables_query($table, $column_order, $column_search, $order)
  {
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

  public function get_datatables($table, $column_order, $column_search, $order, $data = '')
  {
    $this->_get_datatables_query($table, $column_order, $column_search, $order);
    if (isset($_POST['length']) && $_POST['length'] != -1)
      $this->builder->limit($_POST['length'], $_POST['start']);
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->select('*');
    $this->builder->join('jurusan', 'jurusan.kode_jurusan = mahasiswa.kode_jurusan');
    $query = $this->builder->get();
    return $query->getResultArray();
  }

  public function count_filtered($table, $column_order, $column_search, $order, $data = '')
  {
    $this->_get_datatables_query($table, $column_order, $column_search, $order);
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->get();
    return $this->builder->countAll();
  }

  public function count_all($table, $data = '')
  {
    if ($data) {
      $this->builder->where($data);
    }
    $this->builder->from($table);
    return $this->builder->countAll();
  }
}
