<!DOCTYPE html>
<html>
<head>
<title>OnlineMart</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="icon" type="image/x-icon" href="/images/onlinemart.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

</head>
<body>

<header class="navbar">
    <a href="/" class="logo_img"><img src="{{ asset('images/onlinemart.png') }}" alt="Home" width="120"></a>

    @if(session()->has('user') && session('user')->type == 'admin')
        <a href="/admin/users" class="login_button">Users</a>
        <a href="/admin/users/create" class="login_button">Add User</a>
    @endif

    @if(session()->has('user'))
        <a href="/product/create" class="login_button">Upload Product</a>
    @endif

    <div class="right_nav_links">
        <a href="#" class="mycart"><i class="fa-solid fa-cart-shopping"></i></a>

        @if(!session()->has('user'))
            <a href="/login" class="login_button">Login</a>
        @else
            <a href="/logout" class="login_button">Logout</a>
        @endif
    </div>

</header>

@yield('content')

<footer>
<h4>© 2026 OnlineMart. All Rights Reserved.</h4>
</footer>

</body>
</html>