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
}
