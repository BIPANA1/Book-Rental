@extends('admin.layouts.main')
@section('content')

<div class="float-end mb-4">
    <a class="btn btn-primary" href="{{route('return.index')}}"> Back</a>
</div>

<div class="row justify-content-center" style="margin-top:10%">
    <div class="col-md-12">
        <h4 class="text-center"></h4>
        <div class="card">
            <div class="card-header">{{ __('Return A Book') }}</div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>
                        <div class="col-md-8">
                            <select name="code" id="code" class="w3-input form-control">
                                @foreach ($book_transactions as $key => $transaction)
                                    <option value="{{ $key }}">{{ $transaction }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="to_date" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Requets') }}</label>
                        <div class="col-md-8">
                            <input id="to_date" type="number"
                                class="form-control @error('to_date') is-invalid @enderror" name="to_date"
                                value="{{ old('to_date') }}" required autocomplete="to_date" autofocus>
                            @error('to_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="from_date" class="col-md-4 col-form-label text-md-end">{{ __('From Date') }}</label>
                        <div class="col-md-8">
                            <input id="from_date" type="number"
                                class="form-control @error('from_date') is-invalid @enderror" name="from_date"
                                value="{{ old('from_date') }}" required autocomplete="from_date" autofocus>
                            @error('from_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="member" class="col-md-4 col-form-label text-md-end">{{ __('Member') }}</label>
                        <div class="col-md-8">
                            <input id="member" type="text"
                                class="form-control @error('member') is-invalid @enderror" name="member"
                                value="{{ old('member') }}" required autocomplete="member" autofocus>

                            @error('member')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="active_close" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                        <div class="col-md-8">
                            <input id="active_close" type="text"
                                class="form-control @error('active_close') is-invalid @enderror" name="active_close"
                                value="{{ old('active_close') }}" required autocomplete="active_close" autofocus>
                            @error('active_close')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rent_status" class="col-md-4 col-form-label text-md-end">{{ __('Rent Status') }}</label>
                        <div class="col-md-8">
                            <input id="rent_status" type="text"
                                class="form-control @error('rent_status') is-invalid @enderror" name="rent_status"
                                value="{{ old('rent_status') }}" required autocomplete="rent_status" autofocus>
                            @error('rent_status')
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
</div>

@endsection
