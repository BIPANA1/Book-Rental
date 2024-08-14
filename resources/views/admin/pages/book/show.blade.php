@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

<h2> Books Details</h2>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table">
    <tr>
       <th>Name</th>
       <th>No. of Page</th>
       <th>isbn</th>
       <th>Rating</th>
       <th>Photo</th>
       <th>Stock count</th>
       <th>Publish date</th>
       <th>Action</th>
    </tr>
    {{-- @foreach ($roles as $key => $role ) --}}
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="" class="btn btn-success" >View</a>
            <a href="" class="btn btn-info" >Edit</a>
            <form id="delete-form" method="POST" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                  <input type="submit" class="btn btn-danger" value="Delete">
                </div>
              </form>
        </td>
    </tr>
    {{-- @endforeach --}}
    </table>

@endsection
