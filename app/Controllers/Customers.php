<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index(): string
    {
        return view('customers/index', [
            'customers' => (new CustomerModel())->findAll(),
        ]);
    }

    public function newCustomer(): string
    {
        return $this->showForm();
    }

    public function create()
    {
        $values = $this->customerValues();

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validateData($values, $rules)) {
            return $this->showForm(null, $values, $this->validator->getErrors());
        }

        (new CustomerModel())->insert([
            ...$values,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found');
        }

        return $this->showForm($customer);
    }

    public function update(int $id)
    {
        $model    = new CustomerModel();
        $customer = $model->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found');
        }

        $values = $this->customerValues();

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validateData($values, $rules)) {
            return $this->showForm($customer, $values, $this->validator->getErrors());
        }

        $model->update($id, $values);

        return redirect()->to(site_url('customers'));
    }

    private function customerValues(): array
    {
        return [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ];
    }

    private function showForm(
        ?array $customer = null,
        array $values = [],
        array $errors = []
    ): string {
        return view('customers/form', [
            'customer' => $customer,
            'values'   => $values !== [] ? $values : ($customer ?? []),
            'errors'   => $errors,
            'action'   => $customer === null
                ? site_url('customers')
                : site_url('customers/' . $customer['id']),
        ]);
    }
}
