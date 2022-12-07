<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\User;
use App\Models\User;

class Register_new__User extends Controller
{
    //protected $fillable = ['name'];

    //

    public function __construct()
    {
        $this->middleware(['guest']);

    }
    public function index()
    {
        return view('post.Register');
    }

    public function store(Request $request)

    {
        //dd('abc');
        //auth()->attempt(['email' => $email, 'password' => $password]);

    // dd($request->only('email','password'));
        //dd($request);
        //dd($request->get('email'));
        //dd($request->get('email'));
      //  dd($request->get('name','  ','password'));
        //dd($request->get('password'));

         
        $this->validate($request,[
            'name'=>'required|max:225',
            'email'=>'required|email|max:225',
            'password'=>'required|confirmed'],);

            User::Create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request['password']),

            ]);

            //Auth::
              auth()->attempt($request->only('email','password'));

             return redirect()->route('Dashboard');

            
    }
}
