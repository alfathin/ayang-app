<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(3,true),
            'price' => $this->faker->randomNumber(5,true),
            'category_id' => mt_rand(1,9),
            'store_id' => mt_rand(1,3),
            'stock' => $this->faker->randomNumber(3)
        ];
    }
}
