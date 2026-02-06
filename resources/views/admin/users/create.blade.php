@extends('layout')

@section('content')

<form method="POST" action="/admin/users/store">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Add User</h1></div>
            <div class="login_inputs">

                <input name="name" placeholder="Name"><br>
                <input name="email" placeholder="Email"><br>
                <input name="password" placeholder="Password"><br>
                <select name="type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <div class="input_checkbox">
                    <span>Delete Permission</span> <input name="permissions[]" value="delete" type="checkbox">
                </div>
            </div>

            <button>Add</button>

        </div>
    </div>
</form>

@endsection
