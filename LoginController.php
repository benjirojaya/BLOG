<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\resources\views\post;

class LoginController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware(['guest']);

    // }

    Public function index()
    {
        return view('post.login');
    }

    public function store(Request $request)
    {
       // dd('ok');
       // dd($request->remember);
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'],);


          if  (!auth()->attempt($request->only('email','password'),$request->remember)){
              return back()->with('status','invalid login Details');
          }

            return redirect()->route('Dashboard');

    }
}

