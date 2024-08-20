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

<div class="float-end m-4">
    <button class="btn btn-primary" style="color: black;text-decoration:none"> <span class="las la-download"></span> <a href="{{route('rent.export')}}" style="color: black;text-decoration:none"> Download Excel </a> </button>
</div>

{{-- <div class="float-end m-2">
    <a href="{{route('rent.create')}}" class="btn btn-primary m-4"> Create </a>
</div> --}}


{{-- @if ($rent->isNotEmpty()) --}}

<div class="container">
    <div class="row">
    <div class="col-12 justify-content-center">
    <table class="table" style="margin-top:10%;margin-left:5%">
    <tr>
       <th>SN</th>
       <th>Name</th>
       <th>Code</th>
       <th>from_date</th>
       <th>to_date</th>
       <th>Rent Status</th>
       <th>Active Close</th>
       <th>Action</th>
    </tr>
    @foreach ($rent as $r )

    <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->member->name}}</td>
        <td>{{$r->code}}</td>
        <td>{{$r->from_date}}</td>
        <td>{{$r->to_date}}</td>
        <td>{{$r->rent_status}}</td>
        <td>{{$r->active_closed}}</td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
                <a href="{{route('return.show',['id' =>$r->id])}}" class="btn btn-success" >View</a>
                <a href="{{route('rent.edit',['id'=>$r->id])}}" class="btn btn-info" >Edit</a>
            <form id="delete-form" method="POST" action="">
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
{{-- @else

<div class="text-center mt-4">
    <h3>No books are currently rented out.</h3>

</div>

@endif --}}

@endsection
