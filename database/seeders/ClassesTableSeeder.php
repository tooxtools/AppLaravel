<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("classes")->insert([
            ["libelle" => "6e"],
            ["libelle" => "5e"],
            ["libelle" => "4e"],
            ["libelle" => "3e"],
            ["libelle" => "Seconde"],
            ["libelle" => "Premiere"],
            ["libelle" => "Terminale"],

        ]);
    }
}
