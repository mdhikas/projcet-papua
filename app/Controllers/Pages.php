<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/dashboard');
    }

    public function nilai()
    {
        return view('pages/nilai');
    }

    public function nilai_mhs()
    {
        return view('pages/nilai_mhs');
    }

    public function tambah_data()
    {
        return view('pages/tambah_data');
    }
}
