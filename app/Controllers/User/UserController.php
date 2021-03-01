<?php

namespace App\Controllers\User;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use App\Models\NilaiMahasiswaModel;
use App\Models\SkpiMahasiswaModel;
use App\Models\IpsModel;

class UserController extends Controller
{
    protected $db, $builder, $users, $mahasiswa_model, $skpi_model;

    public function __construct()
    {
        helper('nilai');
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->users   = new UserModel();
        $this->mahasiswa_model = new MahasiswaModel();
        $this->nilai_model = new NilaiMahasiswaModel();
        $this->skpi_model = new SkpiMahasiswaModel();
        $this->ips_model = new IpsModel();
    }

    public function profile($username = false)
    {
        $this->builder->select('users.id as userid, username, users.nim as usernim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin');
        $this->builder->join('mahasiswa', 'mahasiswa.nim = users.nim');
        $this->builder->where('username', $username);
        $query = $this->builder->get();

        $data = [
            'title' => 'My Profile',
            'user' => $query->getRow()
        ];
        // dd($data['user']);
        return view('user/user_profile', $data);
    }

    public function nilai($nim = false)
    {
        $nilai = $this->nilai_model->get_nilai_mahasiswa_by_nim($nim);
        $nilai_ips = $this->ips_model->where(['nim' => $nim])->orderBy('semester', 'ASC')->findAll();

        // $mahasiswa = $this->mahasiswa_model->select('nama')->find($nim);
        $data_js['dtNilai'] = json_encode($nilai_ips);
        $data = [
            'js_inline' => view("mahasiswa/nilai_detail_chart", $data_js),
            'title' => 'KHS',
            'nilai' => $nilai,
        ];
        return view('user/user_nilai', $data);
    }

    // public function skpi($username = false)
    // {
    //     $this->builder->select('judul_kegiatan, tanggal_sertif, nama_penyelenggara, berkas');
    //     $this->builder->join('skpi_mahasiswa', 'skpi_mahasiswa.nim = users.nim');
    //     $this->builder->join('mahasiswa', 'mahasiswa.nim = users.nim');
    //     $this->builder->where('username', $username);
    //     $query = $this->builder->get();

    //     $data = [
    //         'title' => 'Upload SKPI',

    //         'skpi' => $query->getResultArray()
    //     ];
    //     return view('user/user_skpi', $data);
    // }
    public function skpi($username = false)
    {
        $data = [
            'title' => 'Upload SKPI'
        ];
        return view('user/user_skpi', $data);
    }

    public function skpi_create($username = false)
    {
        $data = [
            'title' => 'Tambah SKPI',
        ];
        return view('user/user_skpi_create', $data);
    }

    public function skpi_store()
    {

        $data = [
            'title' => 'Tambah SKPI'
        ];
        return view('user/user_skpi', $data);
    }
}
