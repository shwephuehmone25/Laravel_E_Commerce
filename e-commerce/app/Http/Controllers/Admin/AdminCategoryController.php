<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportCategory;
use App\Http\Controllers\Controller;
use App\Imports\ImportCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminCategoryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCatgory()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {

        $category = Category::create([
            'name' => $request->name,
        ]);

        return view('admin.category.index', compact('category'));
    }

    /**
     * Summary of show category lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategory()
    {
        $category = Category::orderBy('id', 'desc')->get();

        return view('admin.category.index', compact('category'));
    }

    public function exportCategory(Request $request)
    {

        return Excel::download(new ExportCategory, 'categories.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importCategory()
    {
        Excel::import(new ImportCategory, request()->file('cat_file'));

        return back();
    }
}