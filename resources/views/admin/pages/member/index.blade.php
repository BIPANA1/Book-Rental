@extends('admin.layouts.main')
@section('content')


<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<h2> Members List </h2>
<a href="{{route('member.create')}}" class="btn btn-primary m-4"> Create </a>

<table class="table m-4">
    <tr>
       <th>Name</th>
       <th>Email</th>
       <th>phone</th>
       <th>address</th>
       <th>Action</th>
    </tr>
    @foreach ($member as  $m)
    <tr>
        <td>{{$m->name}}</td>
        <td>{{$m->email}}</td>
        <td>{{$m->phone}}</td>
        <td>{{$m->address}}</td>
        <td>
            <div style="display: flex; gap:5px; margin-top:8px">
                <a href="{{route('member.edit',['id' =>$m->id])}}" class="btn btn-info" >Edit</a>
                <form id="delete-form" method="POST" action="{{route('member.destroy',['id' =>$m->id])}}">
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
@endsection
