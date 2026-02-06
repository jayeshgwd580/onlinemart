<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $user_id = auth()->id(); // logged in user
        $product_id = $request->product_id;

        // check if product already in cart
        $cart = Cart::where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->first();

        if($cart){
            $cart->increment('quantity'); // increase quantity
        }else{
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        }

        return response()->json(['message'=>'Product added to cart successfully']);
    }
}
