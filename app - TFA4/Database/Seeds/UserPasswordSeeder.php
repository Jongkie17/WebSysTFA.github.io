<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserPasswordSeeder extends Seeder
{
    public function run()
    {
        $users = [
            'philip' => '123456',
            'aron'   => '123456',
            'benj'   => '123456',
            'james'  => '123456',
            'maria'  => '123456',
            'Cathy'  => '123456'
        ];

        foreach ($users as $username => $password) {
            $this->db->table('users')
                ->where('username', $username)
                ->update([
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);
        }
    }
}