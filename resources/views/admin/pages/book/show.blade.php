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
       <th>Genre</th>
       <th>Stock count</th>
       <th>Publish date</th>
    </tr>
    <tr>
        <td>{{$book->name}}</td>
        <td>{{$book->no_of_pages}}</td>
        <td>{{$book->isbn}}</td>
        <td>{{$book->rating}}</td>
        <td>
            <img src="{{asset($book->photo)}}" alt="image" height="150" width="150">
        </td>
        <td>
            {{$book->category['name']}}
        </td>
        <td>
            {{$book->stock_count}}
        </td>
        <td>{{$book->published_date}}</td>
    </tr>
    </table>

@endsection
