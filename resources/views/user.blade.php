@extends('layout')

@section('content')

@php
$user = session('user');
@endphp

<!-- <h1>Welcome {{ $user->name }}</h1>
<h2>{{ $user->type }}</h2> -->

<!-- @if(session()->has('user') && session('user')->type == 'admin')
    <a href="/admin/users">Users</a>
@endif -->

<!-- <a href="/product/create">Upload Product</a> -->


<div class="user-products">

    @foreach($products as $product)
    <div class="product_cnt">
        <div class="product_img">
            @if($product->images->first())
                <img src="{{ asset('storage/'.$product->images->first()->image) }}" 
                     alt="{{ $product->name }}">
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
            <a href="/products/editproduct/{{$product->id}}" class="edit_btn">Edit</a>
            <a href="/products/delete/{{$product->id}}" class="delete_btn">Delete</a>
        </div>
    </div>
    @endforeach

</div>

@endsection
