<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where(['email'=>$request->email])->first();
        // Nếu user khác trên DB or password người dùng nhập không khớp->login
        if(!$user || !Hash::check($request->password, $user->password)){
            return redirect('/login');
        }else{
            $request->session()->put('user', $user);
           return redirect('/home');
            // return "Ok";
        }
    }

    public function registerUser(Request $request){
        // return $request->input();
        $userRegister = new  User;
        $userRegister->name = $request->username;
        $userRegister->email = $request->email;
        $userRegister->password =Hash::make($request->password);
        $userRegister->save();
       return redirect('/login');


    }
}
