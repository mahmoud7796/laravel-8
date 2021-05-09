<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function master(){
        return view('admin.dashboard');
    }

    public function register(){
        return view('admin.auth.register');
    }
}
