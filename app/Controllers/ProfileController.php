<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function profile()
    {
        $userModel = new UserModel();
        $username = session()->get('username');

        $data['user'] = $userModel->where('username', $username)->first();
        $data['title'] = 'Profile';

        return view('admin/profile', $data);
    }

    public function changePassword($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->back()->withInput()->with('error-pw', 'User not found');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'old_password' => [
                'label' => 'Old Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Old Password is required'
                ]
            ],
            'new_password' => [
                'label' => 'New Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'New Password is required',
                    'min_length' => 'New Password must be at least 8 characters long'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors-pw', $validation->getErrors());
        }

        if (!password_verify($this->request->getVar('old_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error-pw', 'Old password wrong!');
        }

        if (password_verify($this->request->getVar('new_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error-pw', 'New password cannot be the same');
        }

        $data = [
            'password' => password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(route_to('profile'))->with('status-pw', 'Password updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors-pw', $model->errors());
        }
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'User not found');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'required' => 'Username is required',
                    'min_length' => 'Username must be at least 3 characters long',
                    'max_length' => 'Username cannot exceed 50 characters',
                    'is_unique' => 'Username already exists'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please provide a valid email address',
                    'is_unique' => 'Email already exists'
                ]
            ],
            'name' => [
                'label' => 'Name',
                'rules' => 'required|alpha_space|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Name is required',
                    'alpha_space' => 'Name can only contain alphabetical characters and spaces',
                    'min_length' => 'Name must be at least 3 characters long',
                    'max_length' => 'Name cannot exceed 50 characters'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'name'     => $this->request->getPost('name')
        ];

        if ($model->skipValidation(true)->update($id, $data)) {
            return redirect()->to(route_to('profile'))->with('status', 'User updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
