<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductCategoryFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        return [
            'product_id' => Product::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}