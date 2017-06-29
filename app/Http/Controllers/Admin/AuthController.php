<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Login page
    public function login() {
        if (\Auth::user()) {
            return redirect('admin/overview');
        }
        return view('admin.auth.login');
    }

    // Login handle
    public function loginHandle(Request $request) {
        // Form validate
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Get date from view
            $credentials = $request->only( 'email', 'password' );

            // Check login info
            if(\Auth::attempt($credentials, $request->has('remember'))) {
                \Session::remove('remember_token');
                \Session::push('remember_token', \Auth::user()->remember_token);
                return redirect()->intended('/admin/overview');
            } else {
                return redirect()->back()->withInput()->withErrors(['error' => 'The email or password is incorrect.']);
            }
        }
    }
}
