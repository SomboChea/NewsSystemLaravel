<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Category::all();

        return $categories;
    }

    public function create(Request $request)
    {
        $rules = [
            "name" => "required|max:50"
        ];

        $category = new \App\Category();
        $category->name = $request->get('name');
        $category->parent_id = $request->get('parent_id', 0);
        $category->save();

        return \response(['status' => 'success'], 200);
    }
}
