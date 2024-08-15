@extends('admin.layouts.main')
@section('content')


<div class="page-content">

    <div class="analytics">

        <div class="card">
            <div class="card-head">
                <h2>107,200</h2>
                <span class="las la-user-friends"></span>
            </div>
            <div class="card-progress">
                <small>User activity this month</small>
                <div class="card-indicator">
                    <div class="indicator one" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>340,230</h2>
                <span class="las la-eye"></span>
            </div>
            <div class="card-progress">
                <small>Page views</small>
                <div class="card-indicator">
                    <div class="indicator two" style="width: 80%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>$653,200</h2>
                <span class="las la-shopping-cart"></span>
            </div>
            <div class="card-progress">
                <small>Monthly revenue growth</small>
                <div class="card-indicator">
                    <div class="indicator three" style="width: 65%"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>47,500</h2>
                <span class="las la-envelope"></span>
            </div>
            <div class="card-progress">
                <small>New E-mails received</small>
                <div class="card-indicator">
                    <div class="indicator four" style="width: 90%"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
