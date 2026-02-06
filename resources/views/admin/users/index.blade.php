@extends('layout')

@section('content')

<div class="login_heading"><h1>User List</h1></div>

<div class="user_list">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
        </tr>

    @foreach($users as $u)
        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->type}}</td>

            <td>
                <a href="/admin/users/edit/{{$u->id}}">Edit</a>
                <a href="/admin/users/delete/{{$u->id}}">Delete</a>
            </td>
        </tr>
    @endforeach

    </table>
</div>


@endsection
