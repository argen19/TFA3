<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users/index', [
            'users' => (new UserModel())->findAll(),
        ]);
    }

    public function newUser(): string
    {
        return $this->showForm();
    }

    public function create()
    {
        $values = $this->userValues();

        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validateData($values, $rules)) {
            return $this->showForm(null, $values, $this->validator->getErrors());
        }

        $data = [
            ...$values,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // The SQL in the supplied ZIP has a required "role" column.
        if (db_connect()->fieldExists('role', 'users')) {
            $data['role'] = 'Staff';
        }

        (new UserModel())->insert($data);

        return redirect()->to(site_url('users'));
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found');
        }

        return $this->showForm($user);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found');
        }

        $values = $this->userValues();
        $avatar = $this->request->getFile('avatar');

        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|max_length[100]',
        ];

        $hasNewAvatar = $avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasNewAvatar) {
            $rules['avatar'] =
                'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]'
                . '|max_size[avatar,2048]';
        }

        if (! $this->validateData($values, $rules)) {
            return $this->showForm($user, $values, $this->validator->getErrors());
        }

        if ($hasNewAvatar) {
            $directory = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';

            if (! is_dir($directory) || ! is_writable($directory)) {
                return $this->showForm($user, $values, [
                    'avatar' => 'The avatar folder is missing or is not writable.',
                ]);
            }

            // Use the validated image type, never the filename supplied by the browser.
            $extension = $avatar->getMimeType() === 'image/png' ? 'png' : 'jpg';
            $filename  = bin2hex(random_bytes(16)) . '.' . $extension;
            $target    = $directory . DIRECTORY_SEPARATOR . $filename;

            try {
                $saved = service('image')
                    ->withFile($avatar->getTempName())
                    ->fit(200, 200, 'center')
                    ->save($target);

                if (! $saved) {
                    throw new \RuntimeException('Image service could not save the avatar.');
                }
            } catch (\Throwable $exception) {
                log_message('error', 'Avatar processing failed: {message}', [
                    'message' => $exception->getMessage(),
                ]);

                return $this->showForm($user, $values, [
                    'avatar' => 'The image could not be prepared. Try another JPG or PNG.',
                ]);
            }

            // Save only the filename in the database.
            $values['avatar'] = $filename;
        }

        $model->update($id, $values);

        return redirect()->to(site_url('users'));
    }

    private function userValues(): array
    {
        return [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];
    }

    private function showForm(
        ?array $user = null,
        array $values = [],
        array $errors = []
    ): string {
        return view('users/form', [
            'user'   => $user,
            'values' => $values !== [] ? $values : ($user ?? []),
            'errors' => $errors,
            'action' => $user === null
                ? site_url('users')
                : site_url('users/' . $user['id']),
        ]);
    }
}
