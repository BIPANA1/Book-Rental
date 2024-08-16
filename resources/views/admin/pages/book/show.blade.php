@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

<div class="m-4 mt-4">
<h2> Books Details</h2>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table">
    <tr>
       <th>Name</th>
       <th>Author</th>
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
        <td>
        @foreach ($authors as $author)
            {{ $author->name }} <br>
        @endforeach
        </td>
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
