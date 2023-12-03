<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profesor;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    protected $model=Profesor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_ape'=>$this->faker->sentence(),
            'profesion'=>$this->faker->sentence(),
            'grado_academico'=>$this->faker->sentence(),
            'telefono'=>$this->faker->phoneNumber()
        ];
    }
}
