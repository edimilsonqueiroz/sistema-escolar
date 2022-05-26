<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name('male'|'female'),
            'data_nascimento' => $this->faker->date(),
            'cpf' => rand(111, 999).''.rand(111, 999).''.rand(111,999).''.rand(11,99),
            'sexo' => $this->faker->title('male'|'female')  
        ];
    }
}
