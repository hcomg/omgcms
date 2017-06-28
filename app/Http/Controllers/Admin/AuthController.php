<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Login page
    public function login() {
        if (\Auth::user()) {
            return redirect('admin/overview');
        }
        return view('admin.auth.login');
    }
}
