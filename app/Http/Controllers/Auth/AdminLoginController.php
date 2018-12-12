<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function loginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request){
        //validate the form Database
        $this->validate($request,[
            'username'=>'required|max:255',
            'password'=>'required|min:6',
        ]);

        $credentials =['username'=>$request->username, 'password'=>$request->password];
        $remember = $request->remember;

        //attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials,$remember)){

            //if successful then redirect to their intended location
            return redirect()->intended(route('admin_dashboard'));
        }

        //if unsuccessful then redirect back to the login with form data
        return redirect()->back()->withInput($request->only('username','remember'));

    }

}
