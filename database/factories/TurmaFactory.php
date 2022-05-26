<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TurmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'nome_escola' => $this->faker->company(),
            'ano' => rand(1990, 2022),
            'serie' => rand(1, 9).'º ano'  
        ];
    }
}
