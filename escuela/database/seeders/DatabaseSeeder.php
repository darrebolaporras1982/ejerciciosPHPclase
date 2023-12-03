<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Alumno;
use \App\Models\Profesor;
use \App\Models\Curso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //--> este seria para llamar al seeder --> $this->call(AlumnoSeeder::class);
        //--> este seria para llamar al seeder --> $this->call(ProfesorSeeder::class);
        //--> este seria para llamar al seeder --> $this->call(CursoSeeder::class);

        Alumno::factory(25)->create();
        Profesor::factory(25)->create();
        Curso::factory(25)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
