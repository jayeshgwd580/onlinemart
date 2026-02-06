@extends('layout')

@section('content')
<main>
    <div class="banner_text">
         <h1>Welcome to Online Mart</h1>
    </div>

    <div class="product_container">

        @foreach($products as $product)
            <div class="product_cnt">
                <div class="product_img">
                    @if($product->images->first())
                        <img src="{{ asset('storage/'.$product->images->first()->image) }}" 
                            alt="product_{{ $product->images->first()->image_path }}">
                    @else
                        <img src="{{ asset('images/onlinemart.png') }}" alt="product">
                    @endif
                </div>

                <div class="product_info">
                    <div class="product_top">
                        <h4 class="product_name">{{ $product->name }}</h4>
                        <span class="product_price">₹ {{ $product->price }}</span>
                    </div>
                </div>

                <div class="product_btns">
                    <button class="buy_btn">Buy Now</button>
                    <button class="cart_btn">Add To Cart</button>
                </div>
            </div>    
        @endforeach

    </div>
</main>

@endsection