<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Philip Malayao',
                'email' => 'Pmalayao@gmail.com',
                'phone' => '09171234567'
            ],
            [
                'full_name' => 'Juan Luna Seon',
                'email' => 'Sjuan@gmail.com',
                'phone' => '09181234567'
            ],
            [
                'full_name' => 'Jose Rizal Park',
                'email' => 'Pjose@gmail.com',
                'phone' => '09192345678'
            ],
            [
                'full_name' => 'Andres Bonfacio Kim',
                'email' => 'Kandres@gmail.com',
                'phone' => '09201234567'
            ],
            [
                'full_name' => 'Lapu-Lapu Jeong',
                'email' => 'Jlapu@gmail.com',
                'phone' => '09211234567'
            ]
        ];

        $data = [
            'customers' => $customers
        ];

        return view('customers', $data);
    }
}