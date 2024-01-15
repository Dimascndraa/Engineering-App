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
        $admin = User::create([
            'departement_id' => 1,
            'name' => "Dimas Candra Pebriyanto",
            'username' => 'd.candra',
            'jabatan' => 'IT Support',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'departement_id' => 1,
            'name' => "Fizar Rama Waluyo",
            'username' => 'f.rama',
            'jabatan' => 'IT Support',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);

        $user->assignRole('user');
    }
}
