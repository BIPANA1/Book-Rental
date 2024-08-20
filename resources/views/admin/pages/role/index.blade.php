@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>
<div class="text-center mt-4">
    <h2> Roles Management</h2>
    {{-- @foreach($breadcrumbs as $bread)
    <p> {{ $bread['name'] }} : {{ $bread['url'] }}</p>
    @endforeach --}}
</div>

<div class=" float-end m-2">
    <a href="{{route('roles.create')}}" class="btn btn-primary m-4"> Create role</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="container">
    <div class="row">
    <div class="col-12 justify-content-center">
    <table class="table" style="margin-top:10%;">
    <tr>
       <th>No.</th>
       <th>Name</th>
       <th>Permissions</th>
       <th>Action</th>
    </tr>
    @foreach ($roles as $key => $role )
    <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>
            @foreach ($role ->permissions as $permission)
            <span class="badge bg-dark" style="color: ">
            {{$permission->name}}
            </span>
            @endforeach
        </td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
            <a href="{{route('roles.show',['role' =>$role->id])}}" class="btn btn-success">View</a>
            <a href="{{route('roles.edit',['role'=>$role->id])}}" class="btn btn-info" >Edit</a>
            <form id="delete-form" method="POST" action="{{route('roles.destroy',['role'=>$role->id])}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                  <input type="submit" class="btn btn-danger" value="Delete">
                </div>
              </form>
            </div>
        </td>
    </tr>
    @endforeach
    </table>
    </div>
    </div>
</div>

@endsection
