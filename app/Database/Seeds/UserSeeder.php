<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Hash password using password_hash function
        $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);

        // Data yang akan dimasukkan ke dalam tabel users
        $data = [
            [
                'name'      => 'Admin',
                'username'  => 'admin',
                'email'     => 'admin@example.com', // Sesuaikan dengan email yang diinginkan
                'password'  => $hashedPassword,
                'role_id'   => 1, // Sesuaikan dengan ID role admin di tabel roles
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into users table
        $this->db->table('users')->insertBatch($data);
    }
}
