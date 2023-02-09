<?php

namespace App\Http\Controllers;

use App\Contracts\Likeable;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\UnlikeRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('user')
            ->with('categories')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display a listing of pr$products.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllProducts()
    {
        $categories = Category::all();

        $products = Product::with('categories')
            ->filter(request('search'))
            ->latest('created_at')
            ->get();

        $latest = Product::with('categories')
            ->latest('created_at')
            ->take(10)
            ->get();

        return view('products.index', compact('products', 'categories', 'latest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created products in storage.
     *
     * @param  \Illuminate\Http\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(storage_path('app/public/images'), $imageName);
        $images = [];
        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $imageName = time() . rand(1, 99) . '.' . $request->image->extension();
                $image->move(storage_path('app/public/images'), $imageName);

                $images[]['url'] = $imageName;
            }
        }

        foreach ($images as $key => $image) {
            Image::create($image);
        }
        $product = Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            //'image' => $imageName,
        ]);
        $product->categories()->sync($request->category);

        return redirect()->route('lists')->with('success', 'A product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', $id)->get();

        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product->id);

        if (empty($product) || auth()->id() != $product->user_id) {

            abort(403);
        } else {

            return view('products.edit', compact('categories', 'product'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        if ($request->file('image')) {
            if (file_exists('app/public/images/')) {
                unlink('app/public/images/' . $product->image);
                //File::delete(storage_path('app/public/images/') . $product->image);
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

        return redirect()->route('lists')->with('info', 'A product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // if (File::exists(storage_path('app/public/images/') . $product->image)) {
        //     File::delete(storage_path('app/public/images/') . $product->image);
        // }
        if (file_exists(storage_path('app/public/images/'))) {
            unlink(storage_path('app/public/images/'));
        }
        $product->categories()->sync([]);
        $product->delete();

        return redirect()->route('lists')->with('warning', 'A Product is deleted Successfully');
    }

    /**
     * Summary of relatedProducts
     * @param mixed $post_id
     * @return mixed
     */
    public function relatedProducts($category_id)
    {
        $currentCategory = Category::find($category_id);
        $categories = $currentCategory->get();

        $products = $currentCategory->products()->paginate(10);

        $latest = Product::with('categories')
            ->filter(request('search'))
            ->latest('created_at')
            ->take(3)
            ->get();

        return view('category.show', compact('products', 'categories', 'latest'));
    }

    public function like(LikeRequest $request)
    {
        $request->user()->like($request->likeable());

        if ($request->ajax()) {
            return response()->json([
                'likes' => $request->likeable()->likes()->count(),
            ]);
        }

        return redirect()->back();
    }

    public function unlike(UnlikeRequest $request)
    {
        $request->user()->unlike($request->likeable());

        if ($request->ajax()) {

            return response()->json([
                'likes' => $request->likeable()->likes()->count(),
            ]);
        }

        return redirect()->back();
    }

    public function cart()
    {
        return view('cart');
    }

    /**
     * Store a newly added products in session.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'A Product is added to cart successfully!');
    }

    /**
     * Update the specified product in cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart is updated successfully');
        }
    }

    /**
     * Remove the specified product from cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'A Product is removed successfully');
        }
    }
}