<?php

namespace Database\Seeders;

use App\Models\CartHeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartHeader::create([
            'user_id' => 1,
        ]);

        CartHeader::create([
            'user_id' => 2,
        ]);
    }
}
