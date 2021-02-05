<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;

class UserController extends Controller
{
    protected $db, $builder, $users;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->users   = new UserModel();
    }

    public function index()
    {

        $data = [
            'title' => 'My Profile',
            'users' => $this->users->findAll()
        ];
        return view('user/user_index', $data);
    }
}
