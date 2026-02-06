@extends('layout')

@section('content')
<form method="POST" action="/login">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Login</h1></div>
            <div class="login_inputs">
                <input type="text" name="username" placeholder="Username/Email">
                <input type="password" name="password" placeholder="Password">
            </div>

            <button type="submit">Login</button>

            <div class="login_links">
                <a href="#" onclick="showPopup()">Forgot Password</a>
                <a href="/register">Register</a>
            </div>
        </div>
    </div>
</form>

<div id="popup" class="popup_box">
    <div class="popup_wrapper login_heading">
        <h3>Forgot Password</h3>
        <input type="email" placeholder="Enter Email">
        <div class="popup_buttons">
            <button>Send OTP</button>
            <button onclick="hidePopup()">Close</button>
        </div>
    </div>
</div>

<script>
function showPopup(){
    document.getElementById('popup').style.display='block';
}
function hidePopup(){
    document.getElementById('popup').style.display='none';
}
</script>

@endsection
