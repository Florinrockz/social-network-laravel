<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortByDesc('id');
        return view('category.index')->withCategories($categories);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'unique:categories|required|max:255'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->user_id = Auth::user()->id;

        $category->save();

        \Session::flash('success','Category added successfully');

        return redirect('/category');
    }
}
