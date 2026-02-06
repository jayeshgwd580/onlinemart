<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private function checkAdmin(){

        if(!session()->has('user') || session('user')->type!='admin'){
            return redirect('/');
        }
    }

    public function index(){

        if($r=$this->checkAdmin()) return $r;

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){

        if($r=$this->checkAdmin()) return $r;

        return view('admin.users.create');
    }

    public function store(Request $request){

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>$request->type,
            'permissions'=>$request->permissions
        ]);

        return redirect('/admin/users');
    }

    public function edit($id){

        if($r=$this->checkAdmin()) return $r;

        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $user = User::findOrFail($id);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'type'=>$request->type ?? $user->type,
            'permissions'=>$request->permissions ?? $user->permissions
        ]);

        return redirect('/admin/users');
    }

    public function delete($id){

        if(!session()->has('user') || session('user')->type!='admin'){
            return redirect('/');
        }

        $admin = session('user');

        if(!$admin->permissions || !in_array('delete',$admin->permissions)){
            return back()->with('error','No delete permission');
        }

        User::findOrFail($id)->delete();

        return back()->with('success','User Deleted');
    }
}

