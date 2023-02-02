<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Summary of show user lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUser()
    {
        $users = User::all();

        return view('user.index', compact('users'));
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

    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportUser, 'users.xlsx');
    }

}