<?php

namespace Database\Seeders;

use App\Models\ProductOrder;
use Illuminate\Database\Seeder;

class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductOrder::factory()->count(5)->create();
    }
}