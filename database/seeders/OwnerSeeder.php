<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'test',
                'email' => 'test2@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],
            [
                'name' => 'test',
                'email' => 'test3@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],
            [
                'name' => 'test',
                'email' => 'test4@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],            [
                'name' => 'test',
                'email' => 'test5@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],            [
                'name' => 'test',
                'email' => 'test6@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],            [
                'name' => 'test',
                'email' => 'test7@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],            [
                'name' => 'test',
                'email' => 'test8@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],            [
                'name' => 'test',
                'email' => 'test9@test.com',
                'password' => Hash::make("ibk12345"),
                'created_at' => '2021/07/10 11:11:11'
            ],
        ]);
    }
}
