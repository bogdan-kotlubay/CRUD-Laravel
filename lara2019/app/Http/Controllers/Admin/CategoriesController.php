<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::all();

    	return view('admin.categories.index', ['categories'	=>	$categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact(
            'categories'
        ));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title'	=>	'required', //обязательно
            'description'   =>  'required'
    	]);
    	$category = Category::add($request->all());
    	$category->uploadImage($request->file('image'));
    	return redirect()->route('categories.index');
    }

    public function edit($id)
    {
    	$categories = Category::find($id);
        $cats = Category::pluck('title', 'id')->all();
        $selectedParentCat = $categories->only('parent_id');
        return view('admin.categories.edit', compact(
            'cats',
            'categories',
            'selectedParentCat'
        ));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'title'	=>	'required', //обязательно
            'description' => 'required',
    	]);

    	$category = Category::find($id);

    	$category->update($request->all());
        $category->uploadImage($request->file('image'));

    	return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
    	Category::find($id)->delete();
    	return redirect()->route('categories.index');
    }
}
