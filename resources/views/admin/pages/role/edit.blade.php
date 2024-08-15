@extends('admin.layouts.main')
@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </h2>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('roles.update',['role' =>$role->id]) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row m-4 mt-4 mb-3">
        <div class="col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                    placeholder="Name">
            </div>
        </div>
        <div class="row m-2 mb-3">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $value->id }}" class="name"
                                @if (in_array($value->id, $rolePermissions)) checked @endif>
                            {{ $value->name }}
                        </label>
                        <br />
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>



@endsection
