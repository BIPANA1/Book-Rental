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


<div class="container shadow min-vh-100 py-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="small fw-light">search</div>
            <form action="{{route('return.index')}}" method="get">
                <div class="input-group">
                    <input class="form-control border-end-0 border rounded-pill" name="member_id" type="search" placeholder="search" value="{{request()->member_id}}" id="example-search-input">
                    <span class="input-group-append">
                        <button class="btn btn-outline-primary border-bottom-0 border rounded-pill ms-n5" type="button">
                            <i class="las la-search"></i>
                        </button>
                    </span>
                </div>

            </form>
        </div>
    </div>



<div class="float-end m-2">
    <div>
        <a href="{{route('return.create')}}" class="btn btn-primary m-4"> Create </a>
    </div>
</div>

<table class="table m-4">
    <tr>
       <th>SN</th>
       <th>Name</th>
       <th>Code</th>
       <th>From Date</th>
       <th>To Date</th>
       <th>Action</th>
    </tr>
    <tr>
        @foreach ( $book_transactions as $transaction )
        <td>{{$transaction->id}}</td>
        <td>{{$transaction->member->name}}</td>
        <td>{{$transaction->code}}</td>
        <td>{{$transaction->from_date}}</td>
        <td>{{$transaction->to_date}}</td>
        <td>
            <div style="display: flex; gap: 5px; margin-top:8px;">
            <a href="{{route('return.show',['id' => $transaction->id])}}" class="btn btn-secondary" >view</a>
            {{-- <a href="" class="btn btn-info" >Edit</a> --}}
            {{-- <form id="delete-form" method="POST" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <div class="form-group">
                  <input type="submit" class="btn btn-danger" value="Delete">
                </div>
              </form> --}}

              <form id="update-form" method="POST" action="{{route('return.update',['id' =>$transaction->id])}}">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group">
                <input type="hidden" name="rent_status" value="return"  />
                <input type="hidden" name="active_closed" value="close"  />
                <input type="submit" id="transaction_id" class="btn btn-success" value="Received" >
                </div>

              </form>
            </div>
        </td>
    </tr>
        @endforeach
    </table>

@endsection
