<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminCategoryController extends Controller
{
    /**
     * Summary of show category lists
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategory()
    {
        $category = Category::all();

        return view('admin.category.index', compact('category'));
    }

    public function exportCategory(Request $request)
    {
        return Excel::download(new ExportCategory, 'categories.xlsx');
    }
}