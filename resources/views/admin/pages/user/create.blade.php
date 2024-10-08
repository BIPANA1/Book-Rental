@extends('admin.layouts.main')
@section('content')

<div class="float-end">
    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <h4 class="text-center"></h4>
        <div class="card">
            <div class="card-header">{{ __('Add User') }}</div>
            <div class="card-body">
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('User name') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="text"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="number"
                            class="col-md-4 col-form-label text-md-end">{{ __('Roles') }}</label>
                        <div class="col-md-8">
                            <select name="roles" id="" class="w3-input form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
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


                    {{-- <div class="col-xs-12 col-sm-12 col-md-12 m-2">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach ($permission as $value)
                                <label>
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                    {{ $value->name }}</label>
                                <br />
                            @endforeach
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
