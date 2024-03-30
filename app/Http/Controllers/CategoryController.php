<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function postCategory(Request $request){
        $category = Category::create($request->all());
        return response($category, 201);
    }

    public function getCategories()
    {
        return response()->json(Category::all(), 200);
    }

}
