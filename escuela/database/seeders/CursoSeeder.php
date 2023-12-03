<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso= new Curso();
        $curso->nombre="HTML";
        $curso->nivel="intermedio";
        $curso->horas_academicas=100;
        $curso->save();
    }
}
