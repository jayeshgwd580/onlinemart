<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->header('email');
        $password = $request->header('password');

        $user = User::where('email',$email)->first();

        if(!$user || !Hash::check($password,$user->password)){
            return response()->json(['message'=>'Unauthorized'],401);
        }

        $request->merge(['auth_user'=>$user]);

        return $next($request);
    }
}
