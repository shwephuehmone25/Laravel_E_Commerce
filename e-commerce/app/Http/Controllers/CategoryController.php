<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get(5);

        return view('products.index', compact('categories'));
    }

    /**
     * Summary of show category lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategory()
    {
        $category = Category::all();

        return view('category.index', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::get();

        return view('products.show', compact('categories'));
    }
}