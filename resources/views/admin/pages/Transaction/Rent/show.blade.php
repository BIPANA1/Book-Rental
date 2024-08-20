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
    <h2> Rent Book Details</h2>
</div>

<div class="float-end m-4">
    <button class="btn btn-primary">Download Excel</button>

</div>


<div class="container">
    <div class="row">
    <div class="col-12 mt-4 justify-content-center">
    <table class="table" style="margin-top:5%">
    <tr>
       <th>SN</th>
       <th>Name</th>
       <th>Code</th>
       <th>from_date</th>
       <th>to_date</th>
       <th>Rent Status</th>
       <th>Active Close</th>
    </tr>

    <tr>
        <td>{{$rent->id}}</td>
        <td>{{$rent->member->name}}</td>
        <td>{{$rent->code}}</td>
        <td>{{$rent->from_date}}</td>
        <td>{{$rent->to_date}}</td>
        <td>{{$rent->rent_status}}</td>
        <td>{{$rent->active_closed}}</td>
    </tr>
</table>
    </div>
    </div>
</div>
@endsection
