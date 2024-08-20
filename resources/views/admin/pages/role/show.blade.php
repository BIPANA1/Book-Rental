@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

<div class="m-4 mt-4">
<h2> Roles Details</h2>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="container">
    <div class="row">
    <div class="col-8 justify-content-center">
    <table class="table" style="margin-top:10%;margin-left:20%">
    <tr>
       <th>Name</th>
       <th>Permission</th>
       {{-- <th>Action</th> --}}
    </tr>
    <tr>
        <td>{{$roles->name}}</td>
        <td>
            @foreach ($rolePermissions as $rolePermission )
            <span class="badge bg-dark" style="color: ">
                {{$rolePermission->name}}
                </span>
            @endforeach

        </td>
    </tr>
    </table>
    </div>
    </div>
</div>

@endsection
