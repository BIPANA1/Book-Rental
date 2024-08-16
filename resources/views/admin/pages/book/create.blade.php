@extends('admin.layouts.main')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.checked {
    color: orange;
  }
</style>

<div class="float-end">
    <a class="btn btn-primary" href="{{ route('book.index') }}"> Back</a>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <h4 class="text-center"></h4>
        <div class="card">
            <div class="card-header">{{ __('Add Book') }}</div>
            <div class="card-body">
                <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                        <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('No. of pages') }}</label>

                        <div class="col-md-8">
                            <input id="no_of_pages" type="number"
                                class="form-control @error('no_of_pages') is-invalid @enderror" name="no_of_pages"
                                value="{{ old('no_of_pages') }}" required autocomplete="no_of_pages" autofocus>

                            @error('no_of_pages')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Isbn number') }}</label>

                        <div class="col-md-8">
                            <input id="isbn" type="number"
                                class="form-control @error('isbn') is-invalid @enderror" name="isbn"
                                value="{{ old('isbn') }}" required autocomplete="isbn" autofocus>

                            @error('isbn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rating" class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>

                        <div class="col-md-8">
                            <input id="rating" type="number"
                                class="form-control @error('rating') is-invalid @enderror" name="rating"
                                value="{{ old('rating') }}" required autocomplete="rating" autofocus>

                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Stock count') }}</label>

                        <div class="col-md-8">
                            <input id="stock_count" type="number"
                                class="form-control @error('stock_count') is-invalid @enderror" name="stock_count"
                                value="{{ old('stock_count') }}" required autocomplete="stock_count" autofocus>

                            @error('stock_count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Publish date') }}</label>

                        <div class="col-md-8">
                            <input id="published_date" type="date"
                                class="form-control @error('published_date') is-invalid @enderror" name="published_date"
                                value="{{ old('published_date') }}" required autocomplete="published_date" autofocus>

                            @error('published_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="photo"
                            class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                {{-- <img id="image-preview" src=""  style="max-height: 100px; max-width: 100%;"> --}}
                                <input id="photo" type="file" onchange="previewImage(this)"
                                    class="form-control @error('photo') is-invalid @enderror" name="photo"
                                    value="{{ old('photo') }}">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                        <div class="col-md-8">
                            <select name="category_id" id="category_id" class="w3-input form-control">
                                @foreach ($category as $key=> $c)
                                    <option value="{{ $key }}">{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                        <div class="col-md-8">
                        <select name="author_id[]" id="author_id" class="w3-input form-control" multiple>
                            @foreach ($author as $key=> $a)
                        <option value="{{$key}}">{{$a}}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="text"
                            class="col-md-4 col-form-label text-md-end">{{ __('Author') }}</label>
                        <div class="col-md-8">
                            <select name="author_id" id="author_id" class="w3-input form-control">
                                @foreach ($author as $key=> $a)
                                    <option value="{{ $key }}">{{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}


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
