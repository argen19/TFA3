<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $data['customers'] = (new CustomerModel())->findAll();

        return view('customers/index', $data);
    }
}
