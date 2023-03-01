<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Sports',
                ],
                [
                    'id' => 2,
                    'name' => 'Finance',
                ],
                [
                    'id' => 3,
                    'name' => 'Movies',
                ],
            ]
        );
    }
}
