<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'イヤホン',
                'sort_order' => 1,
            ],
            [
                'name' => 'ヘッドホン',
                'sort_order' => 2,
            ],
            [
                'name' => 'アンプ',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'ワイヤレスイヤホン',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => '有線イヤホン',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'BlueTooth',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],

            [
                'name' => 'ワイヤレスヘッドホン',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => '有線ヘッドホン',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'BlueTooth',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],

            [
                'name' => '有線アンプ',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'ワイヤレスアンプ',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],

        ]);
    }
}
