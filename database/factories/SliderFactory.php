<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{

    public function definition(): array
    {
        $images = [
            'slider-01.jpg', 'slider-01.jpg', 'slider-01.jpg', 'slider-01.jpg'
        ];

        return [
            'site_web_id' => 1,
            'titulo' => $this->faker->sentence(5),
            'imagen' => $this->faker->randomElement($images),
            'link' => 'www.google.com',
            'spam' => $this->faker->sentence(1),
            'activo' => $this->faker->boolean,
        ];
    }
}
