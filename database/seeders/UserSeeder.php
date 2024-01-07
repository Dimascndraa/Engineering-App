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
                'departement_id' => 1,
                'name' => "Dimas Candra Pebriyanto",
                'username' => 'd.candra',
                'jabatan' => 'IT Support',
                'password' => bcrypt('password'),
                'role' => 'superadmin',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
