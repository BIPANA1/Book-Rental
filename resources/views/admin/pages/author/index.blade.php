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

{{-- <div class="text-center mt-4">
<h2> Author </h2>
</div> --}}

<div class="float-end m-4">
<a href="{{route('author.create')}}" class="btn btn-primary m-4"> Create </a>
</div>

<div class="container">
<div class="row">
<div class="col-12 justify-content-center">
<table class="table" style="margin-top:6%">
    <thead>
    <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Phone</th>
       <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($authors as  $auth)
    <tr>
        <td>{{$auth->name}}</td>
        <td>{{$auth->email}}</td>
        <td>{{$auth->phone}}</td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
            <a href="{{route('author.show',['id' =>$auth->id])}}" class="btn btn-success">View</a>
            <a href="{{route('author.edit',['id' => $auth->id])}}" class="btn btn-info" >Edit</a>
            <form id="delete-form" method="POST" action={{route('author.destroy',['id' =>$auth->id])}}>
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
</tbody>
    </table>
        </div>
    </div>
</div>
@endsection
