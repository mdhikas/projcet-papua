<?php

namespace App\Controllers\User;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;

class UserController extends Controller
{
    protected $db, $builder, $users, $mahasiswa_model;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->users   = new UserModel();
        $this->mahasiswa_model = new MahasiswaModel();
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
        return view('user/my_profile', $data);
    }
}
