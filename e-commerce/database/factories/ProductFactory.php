<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'name' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'description' => $this->faker->paragraph(5),
            'user_id' => User::factory(1)->create()->first(),
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
        ];
    }
}