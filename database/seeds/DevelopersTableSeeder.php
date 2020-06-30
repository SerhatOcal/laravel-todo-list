<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developers')->insert(
            [
                [
                    'name' => 'Developer 1',
                    'time' => 1,
                    'difficulty'   => 1
                ],
                [
                    'name' => 'Developer 2',
                    'time' => 1,
                    'difficulty'   => 2
                ],
                [
                    'name' => 'Developer 3',
                    'time' => 1,
                    'difficulty'   => 3
                ],
                [
                    'name' => 'Developer 4',
                    'time' => 1,
                    'difficulty'   => 4
                ],
                [
                    'name' => 'Developer 5',
                    'time' => 1,
                    'difficulty'   => 5
                ]
            ]);
    }
}
