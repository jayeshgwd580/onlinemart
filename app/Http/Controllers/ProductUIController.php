<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductUIController extends Controller
{

    public function create(){

        if(!session()->has('user')){
            return redirect('/login');
        }

        return view('products.create');
    }

    public function store(Request $request){

        $product = Product::create([
            'user_id' => session('user_id'),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);


        if($request->hasFile('images')){

            foreach($request->file('images') as $img){

                $path = $img->store('products','public');

                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>$path
                ]);
            }
        }

        return redirect()->back()->with('success','Product Uploaded');
    }

    public function edit($id){

        $products = Product::findOrFail($id);
        return view('products.editproduct',compact('products'));
    }

    public function update(Request $request,$id){

        $product = Product::findOrFail($id);

        $product->update([
            'name'=>$request->name ?? $product->name,
            'description'=>$request->email ?? $product->email,
            'price'=>$request->price ?? $product->price,
            'stock'=>$request->stock ?? $product->stock
        ]);

         return redirect('/user');
    }

    public function delete($id){

        if(!session()->has('user') || session('user')->type!='admin'){
            return redirect('/');
        }

        $admin = session('user');

        if(!$admin->permissions || !in_array('delete',$admin->permissions)){
            return back()->with('error','No delete permission');
        }

        Product::findOrFail($id)->delete();

        return back()->with('success','Product Deleted');
    }

    
}
