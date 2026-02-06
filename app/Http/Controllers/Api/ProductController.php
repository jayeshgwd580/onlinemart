<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        return Product::with('images','user')->get();
    }

    public function show($id)
    {
        return Product::with('images')->findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $authUser = $request->auth_user;
        $product = Product::findOrFail($id);

        if($authUser->type!='admin' && $product->user_id!=$authUser->id){
            return response()->json(['message'=>'Not Allowed'],403);
        }

        $product->update($request->all());

        return response()->json(['message'=>'updated']);
    }

    public function destroy(Request $request,$id)
    {
        $authUser = $request->auth_user;
        $product = Product::findOrFail($id);

        $permissions = $authUser->permissions;

        if(is_string($permissions)){
            $permissions = json_decode($permissions,true);
        }

        if(!is_array($permissions)){
            $permissions = [];
        }

        if($authUser->type=='admin'){
            $product->delete();
            return response()->json(['message'=>'Deleted by admin']);
        }

        if(
            $product->user_id==$authUser->id &&
            isset($permissions['delete']) &&
            $permissions['delete']==true
        ){
            $product->delete();
            return response()->json(['message'=>'Deleted']);
        }

        return response()->json(['message'=>'No Permission'],403);
    }

    public function store(Request $request){

        $product = Product::create([
            'user_id'=>$request->user_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock
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

        return response()->json([
            'message'=>'Product Uploaded',
            'product'=>$product
        ]);
    }

}
