<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Controllers\Controller;

class MainpageController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(6);
        return view('front.index', ['categories'=>$categories]);
    }
    
}
