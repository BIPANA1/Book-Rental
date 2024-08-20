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
    <h2> Return Book Details</h2>
</div>


<div class="container">
    <div class="row">
    <div class="col-12 justify-content-center">
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
        <td>{{$return->id}}</td>
        <td>{{$return->member->name}}</td>
        <td>{{$return->code}}</td>
        <td>{{$return->from_date}}</td>
        <td>{{$return->to_date}}</td>
        <td>{{$return->rent_status}}</td>
        <td>{{$return->active_closed}}</td>
    </tr>
</table>
    </div>
    </div>
</div>
@endsection
