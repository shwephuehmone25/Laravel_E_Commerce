<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{

    public function create()
    {
        return view('user.create');
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        $user = User::findOrFail($id);

        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->file('image')) {

            $userImage = time() . '.' . $request->file('image')->extension();
            $request->image->move(storage_path('app/public/images'), $userImage);
            $user->image = $userImage;
        }
        $user->name = $request->name;
        $user->address = $request->address;
        $user->save();

        return view('user.profile')
            ->with("info", "User Info changed successfully!");
    }

    public function getMyPost($user_id)
    {
        $user = User::findOrFail($user_id = auth()->id());
        $products = Product::filter(request('search'))
            ->whereBelongsTo($user)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('user.mypost', compact('products'));
    }

    public function getContact()
    {
        $products = Product::all();

        return view('layouts.contact', compact('products'));
    }
}