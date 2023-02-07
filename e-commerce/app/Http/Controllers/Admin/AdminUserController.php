<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Imports\ImportUser;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
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
        $users = User::orderBy('id', 'desc')->get();

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

        return view('admin.user.index', compact('user', 'users'))->with('message', 'Data added Successfully');
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
}