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
    <h2> Return A Book </h2>
</div>

<div class="float-end m-2">
    <a href="{{route('return.create')}}" class="btn btn-primary m-4"> Create </a>
</div>

<table class="table m-4">
    <tr>
       <th>SN</th>
       <th>Name</th>
       <th>Code</th>
       <th>Action</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
                <a href="" class="btn btn-info" >Edit</a>
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

    </table>
@endsection
