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
<h2> Category </h2>
</div> --}}


<div class="float-end m-4">
    <a href="{{route('category.create')}}" class="btn btn-primary m-4"> Create </a>

</div>


<div class="container">
    <div class="row">
    <div class="col-10 justify-content-center">
    <table class="table" style="margin-top:10%;margin-left:20%">
    <tr>
       <th>Name</th>
       <th>Description</th>
       <th>Action</th>
    </tr>
    @foreach ($category as  $cat)
    <tr>
        <td>{{$cat->name}}</td>
        <td>{{$cat->description}}</td>
        <td>
            <div style="display: flex; gap:5px; margin-top:8px">
                <a href="{{route('category.edit',['id' => $cat->id])}}" class="btn btn-info" >Edit</a>
                <form id="delete-form" method="POST" action="{{route('category.destroy',['id'=>$cat->id])}}">
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
