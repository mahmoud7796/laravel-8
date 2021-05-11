<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = User::find(Auth::id());
            if ($user) {
                return view('admin.profileUpdate', compact('user'));
            }
        }
    }

    public function update(ProfileRequest $request)
    {
        if (Auth::user()) {
            $user = User::find(Auth::id());
            if ($user) {
                 $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
            } else {
                return redirect()->back()->with(['erorr' => 'لقد حدث خطأ']);
            }
        }
    }
}
