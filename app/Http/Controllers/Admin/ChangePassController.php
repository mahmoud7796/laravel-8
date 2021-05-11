<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChPassRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class ChangePassController extends Controller
{
    public function changePass()
    {
        return view('admin.auth.changePassword');
    }

    public function update(ChPassRequest $request)
    {
        $currentPass = Auth::user()->password;
        if (Hash::check($request->Oldpassword, $currentPass)) {
            $user = User::find(Auth::id());
            $user -> password = Hash::make($request -> password);
            $user -> save();
            Auth::guard('web')->logout();
            return redirect()->route('admin.login')->with(['success'=> 'Your password has been changed']);
        }else{
            return redirect() -> back()->with(['error'=> 'Your current Password wrong']);
        }
    }
}
