<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $user = User::where(['email'=>$request->email])->first();
        //Nếu đường dẫn=login và Check trong session tồn tại data của user hay không
        // $request->path() :Trả về thông tin đường dẫn: 
        //  ví dụ URL http://localhost:8001/category ->trả về category
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect("/home");
        }
        return $next($request);
    }
}
