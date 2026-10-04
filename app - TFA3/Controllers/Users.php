<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    
    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll()
        ];

        return view('users', $data);
    }

    
    public function new()
    {
        return view('user_form');
    }

    
    public function create()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
            'avatar' => null
        ]);

        return redirect()->to('/users');
    }

    
    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users');
        }

        return view('user_form', [
            'user' => $user
        ]);
    }

    
    public function update($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users');
        }

        $rules = [
            'username' => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        
        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

            $rules = [
                'avatar' => [
                    'label' => 'Avatar',
                    'rules' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
                ]
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $newName = $avatar->getRandomName();

            $avatar->move(ROOTPATH . 'public/uploads/avatars', $newName);

            $data['avatar'] = $newName;
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users');
    }
}