<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->randomElement(['Minuman', 'Makanan']),
            'stock' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(5000, 50000),
        ];
    }
}