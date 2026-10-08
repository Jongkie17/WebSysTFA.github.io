<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        return view('login');
    }

    public function attempt()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username and password are required.');
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/customers');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}