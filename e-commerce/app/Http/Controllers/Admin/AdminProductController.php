<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Summary of show product lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProducts()
    {
        $categories = Category::all();

        $products = Product::all();

        return view('admin.product.index', compact('products', 'categories'));
    }
}