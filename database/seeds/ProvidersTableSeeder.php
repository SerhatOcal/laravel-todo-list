<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert(
        [
            [
                'title' => 'Provider1',
                'url'   => 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa'
            ],
            [
                'title' => 'Provider2',
                'url'   => 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7'
            ]
        ]);
    }
}
