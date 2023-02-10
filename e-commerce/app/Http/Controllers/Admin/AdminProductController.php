<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product->id);

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        if ($request->file('image')) {
            if (File::exists(storage_path('app/public/images/') . $product->image)) {
                File::delete(storage_path('app/public/images/') . $product->image);
            }

            $imageName = time() . '.' . $request->file('image')->extension();

            // Storage Folder
            $request->image->move(storage_path('app/public/images'), $imageName);
            $product->image = $imageName;
        }
        $product->user_id = auth()->id();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categories()->sync($request->category);
        $product->save();

        return redirect()->route('products.lists')->with('info', 'A product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.lists')->with('success', 'Product has been deleted successfully');
    }
}