<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class AdminController extends Controller
{
    protected $db, $builder, $group, $users;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->group   = new GroupModel();
        $this->users   = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'User List';

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();
        return view('admin/index', $data);
    }

    public function edit($id = 0)
    {
        $this->builder->select('users.id as userid, auth_groups.id as groupsid, username, email, fullname, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit User List Data',
            'validation' => \Config\Services::validation(),
            'user' => $query->getRow(),
            'groups' => $this->group->findAll(),
        ];

        // $data['title'] = 'Edit User Data';
        // $data['user'] = $query->getResult();

        // if (empty($data['user'])) {
        //     return redirect()->to('admin/index');
        // }

        return view('admin/edit', $data);
    }

    public function update()
    {
        $datausers = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'fullname' => $_POST['fullname'],
        ];

        // $datagroups = [
        //     $this->input->post('role')
        // ];


        // dd($user);
        $this->users->insert($datausers);
        // if ($this->users->save($datausers)) {
        //     return json_encode(['status' => 1]);
        // } else {
        //     return json_encode(['status' => 0]);
        // }
        // $this->group->insert($datagroups);

        return view('admin/index');
    }

    public function create()
    {

        $data['title'] = 'Tambah Data User';
        return view('admin/create', $data);
    }

    public function delete($id)
    {
        $this->user->delete($id);
        session()->setFlashData('pesan', 'Data Berhasil dihapus');

        return view('admin/index');
    }
}
