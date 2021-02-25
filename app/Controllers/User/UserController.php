<?php

namespace App\Controllers\User;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use App\Models\NilaiMahasiswaModel;

class UserController extends Controller
{
    protected $db, $builder, $users, $mahasiswa_model;

    public function __construct()
    {
        helper('nilai');
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->users   = new UserModel();
        $this->mahasiswa_model = new MahasiswaModel();
        $this->nilai_model = new NilaiMahasiswaModel();
    }

    public function index($username = false)
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
        // $mahasiswa = $this->mahasiswa_model->select('nama')->find($nim);
        $data = [
            'js' => 'chart_nilai.js',
            'title' => 'KHS',
            'nilai' => $nilai
        ];
        return view('user/user_nilai', $data);
    }

    public function skpi()
    {
        $data = [
            'title' => 'Upload SKPI'
        ];

        return view('user/user_skpi', $data);
    }
}
