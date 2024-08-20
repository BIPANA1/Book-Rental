@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

<div class="text-center mt-4">
    <h2>User Management</h2>
</div>

<div class="float-end">
    <a href="{{route('users.create')}}" class="btn btn-primary m-4"> Create </a>

</div>

<div class="container">
    <div class="row">
    <div class="col-12 justify-content-center">
    <table class="table" style="margin-top:5%;">
    <tr>
       <th>User Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Action</th>
    </tr>
    @foreach ($users as  $user)
    <tr>

        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @foreach ($user->roles as $role)
            <span class="badge bg-dark">{{ $role->name }}</span>
            @endforeach
        </td>
        <td>
            <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-info" >Edit</a>
            <a href="{{route('users.destroy',['user'=>$user->id])}}" class="btn btn-danger" >Delete</a>

        </td>
    </tr>

    @endforeach
    </table>
    </div>
    </div>
</div>

@endsection
