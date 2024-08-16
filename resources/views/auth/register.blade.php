@extends('layouts.app')
@section('content')
    <style>
        .card-body {
            padding: 4px 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .col-form-label {
            font-weight: bold;
        }

        .invalid-feedback {
            display: block;
            color: red;
            margin-top: 5px;
        }

        .btn-primary {

            color: white;
            width: 50%;
            transition: background-color 0.3s ease;
            margin-top: 15px;
            padding: 8px 30px;
            border: 2px solid white;
            margin-left: 20%;
            border: solid #22BAA0;
            background-color: #22BAA0;
            font-weight: bold;
        }

        .btn-primary:hover {
            border: solid #276d62;
            background-color: #276d62;
        }

        i.fa-user {
            position: absolute;
            left: 32px;
            top: 21%;
            margin-left: 3px;
            transform: translateY(-50%);
            padding: 2px 8px;

        }

        label.close-btn {
            position: absolute;
            left: 87%;
            top: 0;
            cursor: pointer;
            padding: 10px;
            color: #000;
        }

        i.fa-lock {
            position: absolute;
            left: 38px;
            top: 76%;
            margin-left: 3px;
            transform: translateY(-50%);
            padding: 2px 4px;
        }

        i.fa-unlock {
            position: absolute;
            left: 38px;
            top: 65%;
            margin-left: 3px;
            transform: translateY(-50%);
            padding: 2px 4px;
        }

        i.fa-envelope {
            position: absolute;
            left: 38px;
            top: 44%;
            margin-left: 3px;
            transform: translateY(-50%);
            padding: 2px 4px;
        }

        i.fa-phone {
            position: absolute;
            left: 38px;
            top: 54%;
            margin-left: 3px;
            transform: translateY(-50%);
            padding: 2px 4px;
        }

        .form-control {
            background-color: #f2f2f2;
            border: none;
            border-radius: 10px;
            color: #333;

        }

        .form-control:focus {
            outline: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .form-group label {
            color: #ff6600;
        }

        .card-header {
            background-color: #333;
            color: white;
            font-weight: bold;
            border-bottom: none;
        }

        .card {
            /* margin-top: 28%; */
            margin-bottom: 8%;
            margin-left: 20%;
            width: 70%;
            height: 75%;
            background-color: #605e63;
            border: 1px solid #605e63;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card.active-popup {
            transform: scale(1);
        }

        .invalid-feedback strong {
            color: #ff3300;
        }

        .forgot {
            margin-top: 5px;
            margin-left: 20%;
        }

        .remember {
            margin-top: 20px;

        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 20px;
            text-align: center;
            font-size: 12px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        input[type="email"]:invalid,
        input[type="text"]:invalid,
        input[type="password"]:invalid {
            border-color: #595e64;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            background-color: #f8f9fa;
            color: #495057;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="email"] {
            margin-top: 15px;
        }

        button {
            padding: 12px 15px;
            border: none;
            background-color: #84aedb;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #4b82bd;
        }

        .form-check-input {
            margin-top: 7px;
        }
        .account {
            padding: 80px 0;
        }

        .account-contents {
            box-shadow: 0 8px 26px 5px rgba(0, 0, 0, 0.1), 0 10px 25px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .account-content {
            padding: 50px 30px;
            height: 100%;
            background: #fff;
        }

        .account-contents:before {
            position: absolute;
            left: 0;
            top: 0;
            content: "";
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.8;
        }

        .account-content a {
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            color: #1D1678;
            line-height: 1;
            float: left;
            margin-bottom: 15px;
        }

        .account-content a:hover {
            border-bottom: 2px solid #1D1678;
        }

        .account-content a+a {
            float: right;
        }

        .single-acc-field {
            margin-bottom: 20px;
        }

        .account-thumb {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            padding: 70px;
            text-align: center;
        }

        @media(max-width: 575px) {
            .account-thumb {
                padding: 40px;
            }

            .account-content {
                padding: 30px 20px;
            }
        }

        .account-thumb h2 {
            margin-bottom: 15px;
        }
    </style>

    <section class="account">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="account-contents"
                        style="background: url('/Images/book.png'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h1>Register Now</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique
                                        deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="single-acc-field">
                                            <label for="name"> Name</label>
                                            <input type="text" id="name" placeholder="Enter Your Name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" placeholder="Enter your Email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" placeholder="At least 8 Characters"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input type="password" id="password-confirm" placeholder="Confirm Password"
                                                class="form-control" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
