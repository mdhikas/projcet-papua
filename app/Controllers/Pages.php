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
        if (in_groups('superadmin')) {

            $data['title'] = 'Papua | Admin';
            // $data['js'] = 'script_admin.js';
            $data['jml_user'] = $this->user->countAllResults();
            $data['jml_mahasiswa'] = $this->mahasiswa->countAllResults();
            $data_js['dtMhs'] = json_encode($this->mahasiswa->get_total_mhs_per_tahun());
            $data_js['dtIpk'] = json_encode($this->mahasiswa->get_total_mhs_per_tahun());
            $data['js_inline'] = view("admin/detail_chart_admin", $data_js);
            return view('pages/dashboard_admin', $data);
        } else {
            $data['title'] = 'Papua';
            $data['js'] = 'script_user.js';
            return view('pages/dashboard_user', $data);
        }
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
