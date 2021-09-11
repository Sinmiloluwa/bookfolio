<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $loginData = $request->only('email','password');

        if (!Auth::attempt($loginData)) {

            return redirect('login')->with('message', 'Credentials are wrong');
                
        }

        $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('home');
            }
            else {
                return redirect()->route('admin.myHome');
            }
                
       
        }
}
