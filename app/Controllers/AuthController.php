<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $model = new RoleModel();
        $roles = $model->findAll();
        return view('auth/register', ['title' => 'Register', 'roles' => $roles]);
    }

    public function store()
    {
        $userModel = new UserModel();

        if (!$userModel->validate($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role_id' => intval($this->request->getVar('role_id')),
        ];

        if ($userModel->save($data)) {
            return redirect()->to(base_url('auth/login'))->with('message', 'Registration successful. Please login.');
        } else {
            $errors = ['Error saving user data. Please try again.'];
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(route_to('dashboard'));
        }
        return view('auth/login', ['title' => 'Login']);
    }

    public function authenticate()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'identifier' => 'required',
            'password' => 'required|min_length[8]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $identifier = $this->request->getVar('identifier');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();

        $user = $userModel->where('email', $identifier)
            ->orWhere('username', $identifier)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'id' => $user['id'],
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to(base_url('admin/dashboard'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid username/email or password');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('auth/login'));
    }
}
