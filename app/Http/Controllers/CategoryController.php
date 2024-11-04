<?php

namespace App\Http\Controllers;

use App\Models\Category;


class CategoryController extends Controller
{

    public function categories()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return Response()->json($categories);
    }

}
