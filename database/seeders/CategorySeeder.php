<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => '野菜',
            ],
            [
                'id' => 2,
                'name' => '果物',
            ],
            [
                'id' => 3,
                'name' => '飲料',
            ],
        ]);
    }
}
