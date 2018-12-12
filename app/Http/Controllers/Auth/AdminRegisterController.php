<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;


class AdminRegisterController extends Controller
{
    protected $redirectPath = '/admin/dashboard';

    public function registerForm()
    {
        return view('auth.admin-register');
    }

    //Handles registration request for admin
    public function register(Request $request)
    {
        //$this->validator($request->all())->validate();
        /*$this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'user_type' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);*/
;
        //Create admin
        $admin = $this->create($request->all());

        //Authenticates admin
        $this->guard()->login($admin);

        //Redirects admins
        return redirect($this->redirectPath);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            //'user_type' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'email' => $data['email'],
            //'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),

        ]);


    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('admin_login_form');

    }



}
