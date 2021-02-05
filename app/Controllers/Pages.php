<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MahasiswaModel;
use Myth\Auth\Models\UserModel;

class Pages extends Controller
{

    protected $user, $mahasiswa;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->mahasiswa = new MahasiswaModel();
    }

    public function index()
    {
        $data['title'] = 'Papua';
        $data['user'] = $this->user->countAllResults();
        $data['mahasiswa'] = $this->mahasiswa->countAllResults();

        return view('pages/dashboard', $data);
    }

    // public function nilai()
    // {
    //     return view('pages/nilai');
    // }

    // public function nilai_mhs()
    // {
    //     return view('pages/nilai_mhs');
    // }

    // public function tambah_data()
    // {
    //     return view('pages/tambah_data');
    // }
}
