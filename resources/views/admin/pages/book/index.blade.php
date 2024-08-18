@extends('admin.layouts.main')
@section('content')

<style>
    .table{
       margin: auto;
       padding: 16px 36px;
    }
</style>

<div class="text-center mt-4">
    <h2> Books Management</h2>
</div>

<div class=" float-end m-4 mt-4">
    <a href="{{route('book.create')}}" class="btn btn-primary m-4"> Create Book</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table m-4">
    <tr>
       <th>Name</th>
       <th>Photo</th>
       <th>Stock count</th>
       <th>Publish date</th>
       <th>Action</th>
    </tr>
    @foreach ($book as $b )
    <tr>
        <td>{{$b->name}}</td>
        <td>
            <img src="{{asset($b->photo)}}" alt="image" height="150" width="150">
        </td>
        <td>{{$b->stock_count}}</td>
        <td>{{$b->published_date}}</td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
                <a href="{{ route('book.show', ['id' => $b->id]) }}" class="btn btn-success">View</a>
                <a href="{{ route('book.edit', ['id' => $b->id]) }}" class="btn btn-info">Edit</a>
                <form id="delete-form" method="POST" action="{{route('book.destroy',['id' =>$b->id])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
        </td>

    </tr>
    @endforeach
    </table>

@endsection
