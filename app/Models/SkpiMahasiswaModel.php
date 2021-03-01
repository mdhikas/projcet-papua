<?php

namespace App\Models;

use CodeIgniter\Model;

class SkpiMahasiswaModel extends Model
{
    protected $table      = 'skpi_mahasiswa';
    protected $primaryKey = 'id_skpi';
    protected $allowedFields = ['nim', 'judul_kegiatan', 'tanggal_sertif', 'nama_penyelenggara', 'berkas'];

    protected $db;
    protected $bulder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // public function get_skpi_mahasiswa_by_nim($username = false)
    // {
    //     $this->builder = $this->db->table($this->table);
    // }
}
