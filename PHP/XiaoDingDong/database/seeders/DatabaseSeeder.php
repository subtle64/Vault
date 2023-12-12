<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TransactionDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CartDetailsSeeder::class,
            CartHeaderSeeder::class,
            MenuSeeder::class,
            TransactionDetailsSeeder::class,
            TransactionHeaderSeeder::class,
        ]);
    }
}


