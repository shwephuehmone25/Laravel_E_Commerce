<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        User::findOrFail($id);

        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $user->bio = $request->bio;
        $user->save();

        return view('user.profile')
            ->with("info", "User Info changed successfully!");
    }

}