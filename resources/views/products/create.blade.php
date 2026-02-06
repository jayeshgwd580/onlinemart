@extends('layout')

@section('content')

<form method="POST" action="/product/store" enctype="multipart/form-data">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Upload Product</h1></div>
            <div class="login_inputs">
                <input name="name" placeholder="Product Name">
                <textarea name="description"></textarea>
                <input name="price" placeholder="Price">
                <input name="stock" placeholder="Stock">
                <input type="file" name="images[]" multiple>
            </div>

            <button type="submit">Upload</button>

        </div>
    </div>
</form>

@endsection
