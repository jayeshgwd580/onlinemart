@extends('layout')

@section('content')

<form method="POST" action="/admin/users/update/{{$user->id}}">
@csrf
    <div class="login_main_container">
        <div class="login_container">
            <div class="login_heading"><h1>Edit User</h1></div>
            <div class="login_inputs">
                <input type="text" name="name" value="{{$user->name}}" placeholder="Username/Email">
                <input type="email" name="email" value="{{$user->email}}" placeholder="Email">
                <select name="type">
                    <option value="user" {{$user->type=='user'?'selected':''}}>User</option>
                    <option value="admin" {{$user->type=='admin'?'selected':''}}>Admin</option>
                </select>
            </div>

            <button type="submit">Update</button>

        </div>
    </div>
</form>


@endsection
