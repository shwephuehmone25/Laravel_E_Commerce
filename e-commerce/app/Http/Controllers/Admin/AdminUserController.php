<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportUser;
use App\Http\Controllers\Controller;
use App\Imports\ImportUser;
use App\Models\User;
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
        $users = User::all();

        return view('admin.user.index', compact('users'));
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

}