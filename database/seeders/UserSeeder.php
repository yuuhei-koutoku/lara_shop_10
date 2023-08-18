<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => '田中 太郎',
            'email' => 'user1@example.com',
            'password' => Hash::make('11111111'),
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
