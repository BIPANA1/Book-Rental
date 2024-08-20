@extends('admin.layouts.main')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Edit User
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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


    <form action="{{ route('users.update', $user->id) }}" method="PATCH">
        @csrf
        <div class="row m-4 mt-4">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control"
                        placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <input type="password" name="confirm-password" class="form-control"
                        placeholder="Confirm Password">
                </div>
            </div>
            {{-- <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong> Permission:</strong>
                    <div class="col-md-8">
                        @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name"
                                @if (in_array($value->id, $rolePermissions)) checked @endif>
                            {{ $value->name }}
                        </label>
                        <br />
                    @endforeach
                </div>
            </div> --}}

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Roles') }}</label>
                <div class="col-md-8">
                    @foreach ($roles as $key=> $value)
                    <label>
                        <input type="checkbox" name="roles[]" value="{{ $key}}" class="name">

                        {{ $value }}</label>
                    <br />
                @endforeach
                </div>
            </div>

            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>




@endsection
