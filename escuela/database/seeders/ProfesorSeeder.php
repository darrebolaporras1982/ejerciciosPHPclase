<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesor=new Profesor();
        $profesor->nom_ape="Elisabeth Lekue";
        $profesor->profesion="Profesora de servidor";
        $profesor->grado_academico="ingeniera";
        $profesor->telefono=111111111;
        $profesor->save();
    }
}
