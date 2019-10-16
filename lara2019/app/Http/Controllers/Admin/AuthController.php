<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
  public function index() {

    	return view('admin.auth');
    }

    public function login(Request $request)
    {
      	$this->validate($request, [
            'login' => 'required',
            'password' => 'required'
        ]);
    
  if (Auth::attempt(['name' => $request->get('login'), 'password' => $request->get('password')])) {
            return redirect('/admin');
        }else {
            return redirect()->back()->with('status', 'Неправильный логин или пароль');
        }
    }
}
