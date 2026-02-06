@extends('layout')

@section('content')
<form method="POST" action="/register">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Register</h1></div>
            <div class="login_inputs">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
            </div>

            <button type="submit">Register</button>

        </div>
    </div>
</form>



@endsection