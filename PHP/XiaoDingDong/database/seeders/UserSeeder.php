<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        User::create([
            'username' => 'Jason',
            'email' => 'jason@gmail.com',
            'password' => bcrypt('123123'),
            'is_admin' => 0,
        ]);
    }
}
