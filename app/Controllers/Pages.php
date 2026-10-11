<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index(): string
    {
        return view('pages/index');
    }

    public function about(): string
    {
        return view('pages/about');
    }
}
