<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => "Dimas Candra Pebriyanto",
                'email' => "dimascndraa18@gmail.com",
                'email_verified_at' => now(),
                'username' => 'd.candra',
                'password' => bcrypt('password'),
                'role' => 'superadmin',
            ], [
                'name' => "Admin",
                'email' => "admin@dummy.com",
                'email_verified_at' => now(),
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ], [
                'name' => "User",
                'email' => "user@dummy.com",
                'email_verified_at' => now(),
                'username' => 'user',
                'password' => bcrypt('user'),
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
