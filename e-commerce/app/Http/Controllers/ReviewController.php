<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reviews = Review::all();
        $product = Product::find($request->product_id);

        return view('products.show', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;

        $review->body = $request->body;

        $review->user()->associate($request->user());

        $product = Product::find($request->product_id);

        $product->reviews()->save($review);

        return back();
    }
}