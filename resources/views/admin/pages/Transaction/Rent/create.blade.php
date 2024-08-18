@extends('admin.layouts.main')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif


<div class="float-end">
    <a class="btn btn-primary" href="{{route('rent.index')}}"> Back</a>
</div>

<div class="row justify-content-center"  style="margin-top:10%">
    <div class="col-md-12">
        <h4 class="text-center"></h4>
        <div class="card">
            <div class="card-header">{{ __('Rent A Book') }}</div>
            <div class="card-body">
                <form method="POST" action="{{route('rent.store')}}">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Book') }}</label>
                        <div class="col-md-8">
                            <select name="book_id" id="book_id" class="w3-input form-control">
                                @foreach ($book as $key=> $c)
                                    <option value="{{ $key }}">{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Member') }}</label>
                        <div class="col-md-8">
                            <select name="member_id" id="member_id" class="w3-input form-control">
                                @foreach ($member as $key=> $c)
                                    <option value="{{ $key }}">{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
                        <div class="col-md-8">
                            <input id="code" type="text"
                                class="form-control @error('code') is-invalid @enderror" name="code"
                                value="{{ old('code') }}" required autocomplete="code" autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number_of_days" class="col-md-4 col-form-label text-md-end">{{ __('No. of days') }}</label>
                        <div class="col-md-8">
                            <input id="number_of_days" type="number"
                                class="form-control @error('number_of_days') is-invalid @enderror" name="number_of_days"
                                value="{{ old('number_of_days') }}" required autocomplete="number_of_days" autofocus>
                            @error('number_of_days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
