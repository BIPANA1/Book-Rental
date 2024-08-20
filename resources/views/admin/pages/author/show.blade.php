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

<div class="text-center mt-4">
<h2> Author </h2>
</div>


<div class="container">
<div class="row">
<div class="col-8 justify-content-center">
<table class="table" style="margin-top:10%;margin-left:30%">
    <thead>
    <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Phone</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{$author->name}}</td>
        <td>{{$author->email}}</td>
        <td>{{$author->phone}}</td>
    </tr>
</tbody>
    </table>
        </div>
    </div>
</div>
@endsection
