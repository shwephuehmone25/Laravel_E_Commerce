<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Imports\ImportUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AdminUserController extends Controller
{
    /**
     * Summary of show user lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUser()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.create');
    }

    /**
     * Store a newly created users in storage.
     *
     * @param  \Illuminate\Http\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $users = User::orderBy('id', 'desc')->get();

        return view('admin.user.index', compact('user', 'users'))->with('success', 'User is added successfully');
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

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user.lists')->with('info', 'A user updated successfully');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportUsers(Request $request)
    {

        return Excel::download(new ExportUser, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importUser()
    {
        Excel::import(new ImportUser, request()->file('file'));

        return back();
    }

    /**
     * Summary of show user lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUserByChart()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->orderBy('created_at')
            ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();

        return view('admin.chart', compact('labels', 'data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.lists')->with('success', 'User has been deleted successfully');
    }
}