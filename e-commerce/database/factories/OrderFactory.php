<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'product_id' => Product::all()->random()->id,
            'quantity' => $this->faker->randomDigit,
            'total_price' => $this->faker->numberBetween($min = 5000, $max = 10000),
            //'date_of_order' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];
    }
}