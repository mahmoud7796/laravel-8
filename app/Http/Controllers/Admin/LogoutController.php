<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class LogoutController extends Controller
{
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()-> route('admin.login');
    }
}
