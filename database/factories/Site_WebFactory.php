<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Site_WebFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'dominio' => $this->faker->sentence(1),
            'activo' => 1
        ];
    }
}
