<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class AuthController extends Controller
{

    public function home(){

        if(session()->has('user')){
            return redirect('/user');
        }

        $products = Product::with('images')->latest()->get();

        return view('home', compact('products'));
    }

    public function loginPage(){

        if(session()->has('user')){
            return redirect('/user');
        }

        return view('login');
    }

    public function registerPage(){
        return view('register');
    }

    public function register(Request $request){

        if($request->type == 'admin' && User::where('type','admin')->exists()){
            return back()->with('error','Admin already exists');
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>'user',
            'permissions'=>null
        ]);

        return redirect('/login')->with('success','User Registered Successfully');
    }

    public function login(Request $request){

        $user = User::where('email',$request->username)->first();

        if($user && Hash::check($request->password,$user->password)){
            session(['user'=>$user, 'user_id' => $user->id]);
            return redirect('/user');
        }

        return back()->with('error','Invalid Credentials');
    }

    public function userPage(){

        if(!session()->has('user')){
            return redirect('/login');
        }

        $products = Product::with('images')->latest()->get();

        return view('user', compact('products'));
    }

    public function logout(){
        session()->forget('user');
        return redirect('/');
    }
}
