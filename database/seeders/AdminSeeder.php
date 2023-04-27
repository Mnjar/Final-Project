<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'id_admin' => 'adm',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'no_handphone' => ('082233445566'),
            'role' => 'admin',
        ]);
    }
}
