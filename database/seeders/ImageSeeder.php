<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{

    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => '729901708_64c9e7faca2b2.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => '729901708_64c9e7faca2b2.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample3.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample4.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample5.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample6.jpg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'sample7.jpg',
                'title' => null
            ],
        ]);
    }
}
