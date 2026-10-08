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

            $uploadRules = [
                'avatar' => [
                    'label' => 'Avatar',
                    'rules' => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
                ]
            ];

            if (!$this->validate($uploadRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadPath = ROOTPATH . 'public/uploads/avatars';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $newName = $avatar->getRandomName();

            $avatar->move($uploadPath, $newName);

            // Create a display-ready thumbnail
            $thumbnailName = 'thumb_' . $newName;
            $thumbnailPath = $uploadPath . '/' . $thumbnailName;

            $image = service('image');

            $image->withFile($uploadPath . '/' . $newName)
                ->fit(150, 150)
                ->save($thumbnailPath);

            // Remove the original after creating the thumbnail
            if (file_exists($uploadPath . '/' . $newName)) {
                unlink($uploadPath . '/' . $newName);
            }

            $data['avatar'] = $thumbnailName;
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users');
    }
}