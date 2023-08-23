<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ShopSeeder extends Seeder
{

    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'test_shop',
                'information' => 'sample text sample text sample text sample text sample text sample text',
                'filename' => '/895841011_64e5a7d828df4.jpg',
                'is_selling' => true,
                'created_at' => '2021/07/10 11:11:11'
            ],
            [
                'owner_id' => 2,
                'name' => 'test_shop',
                'information' => 'sample text sample text sample text sample text sample text sample text',
                'filename' => '',
                'is_selling' => true,
                'created_at' => '2021/07/10 11:11:11'
            ],
        ]);
    }
}
