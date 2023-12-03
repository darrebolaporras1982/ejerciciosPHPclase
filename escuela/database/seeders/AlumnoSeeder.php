<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumno=new Alumno();
        $alumno->nom_ape='David Arrebola';
        $alumno->edad=41;
        $alumno->direccion='txotena 12';
        $alumno->telefono=111111111;
        $alumno->save();
    }
}
