@extends('admin.layouts.main')
@section('content')

<div class="float-end">
    <a class="btn btn-primary" href="{{route('return.index')}}"> Back</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <h4 class="text-center"></h4>
        <div class="card">
            <div class="card-header">{{ __('Rent A Book') }}</div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
                        <div class="col-md-8">
                            <select name="category_id" id="category_id" class="w3-input form-control">
                                {{-- @foreach ($book as $key=> $c)
                                    <option value="{{ $key }}">{{ $c }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
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

                    <div class="row mb-3">
                        <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('No. of days') }}</label>
                        <div class="col-md-8">
                            <input id="phone" type="number"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            @error('phone')
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
