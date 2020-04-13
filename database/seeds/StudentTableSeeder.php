<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
        ['name'=>'php2020','age'=>89],
        [ 'name'=>'php2021','age'=>89]
        ]);
    }
}
