<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'juan_admin',
                'full_name' => 'Juan Admin',
                'role' => 'Admin'
            ],
            [
                'username' => 'maria_cashier',
                'full_name' => 'Maria Santos',
                'role' => 'Cashier'
            ],
            [
                'username' => 'mark_staff',
                'full_name' => 'Mark Reyes',
                'role' => 'Staff'
            ],
            [
                'username' => 'angela_cashier',
                'full_name' => 'Angela Garcia',
                'role' => 'Cashier'
            ],
            [
                'username' => 'kevin_staff',
                'full_name' => 'Kevin Mendoza',
                'role' => 'Staff'
            ]
        ];

        $data = [
            'users' => $users
        ];

        return view('users', $data);
    }
}