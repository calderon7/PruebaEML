<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genere')->insert([
            ['genere' => 'Masculino'],
            ['genere' => 'Femenino'],
            ['genere' => 'Otro'],
        ]);
    }
}
