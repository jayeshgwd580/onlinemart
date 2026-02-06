@extends('layout')

@section('content')

<form method="POST" action="/products/update/{{$products->id}}">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Edit Product</h1></div>
            <div class="login_inputs">


                <input type="text" name="name" value="{{$products->name}}" placeholder="Enter Product Name">
                <input type="text" name="description" value="{{$products->description}}" placeholder="Emter Description">
                <input type="text" name="price" value="{{$products->price}}" placeholder="Enter Price">
                <input type="text" name="stock" value="{{$products->stock}}" placeholder="How many in stock?">
            </div>

            <button type="submit">Update</button>

        </div>
    </div>
</form>

@endsection
