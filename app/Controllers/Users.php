<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $data['users'] = (new UserModel())->findAll();

        return view('users/index', $data);
    }
}
