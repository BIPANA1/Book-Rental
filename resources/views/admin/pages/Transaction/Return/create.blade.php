@extends('admin.layouts.main')
@section('content')

<div class="float-end mb-4">
    <a class="btn btn-primary" href="{{ route('return.index') }}"> Back</a>
</div>

<div class="row justify-content-center" style="margin-top:10%">
    <div class="col-md-12">
        <div class="card-body">
            <form method="POST" action="{{route('transaction.update')}}">
                @csrf
                @method('POST')

                <input type="hidden" name="transaction_id" id="hidden_transaction_id">
                <div class="row mb-3">
                    <label for="transaction_id" class="col-md-4 col-form-label text-md-end">{{ __('Transaction') }}</label>
                    <div class="col-md-4">
                        <select name="transaction_id" id="transaction_id" class="w3-input form-control">
                            <option value="">Select Transaction</option>
                            @foreach ($book_transactions as $transaction)
                                <option value="{{ $transaction->id }}">{{ $transaction->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="to_date" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Request') }}</label>
                    <div class="col-md-6">
                        <input id="to_date" type="text" class="form-control" name="to_date" required autocomplete="to_date" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="from_date" class="col-md-4 col-form-label text-md-end">{{ __('From Date') }}</label>
                    <div class="col-md-6">
                        <input id="from_date" type="text" class="form-control" name="from_date" required autocomplete="from_date" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="member" class="col-md-4 col-form-label text-md-end">{{ __('Member') }}</label>
                    <div class="col-md-6">
                        <input id="member" type="text" class="form-control" name="member" required autocomplete="member" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="active_close" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                    <div class="col-md-6">
                        <input id="active_close" type="text" class="form-control" name="active_close" required autocomplete="active_close" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rent_status" class="col-md-4 col-form-label text-md-end">{{ __('Rent Status') }}</label>
                    <div class="col-md-6">
                        <input id="rent_status" type="text" class="form-control" name="rent_status" required autocomplete="rent_status" autofocus>
                    </div>
                </div>
                {{-- <input type="hidden" name="transaction_id" id="transaction_id" value="{{ $transaction->id }}"> --}}

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('update') }}
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#transaction_id').on('change', function () {
            var transactionId = $(this).val();
            $('#hidden_transaction_id').val(transactionId);
            if (transactionId) {
                $.ajax({
                    url: '/transactions/' + transactionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            $('#from_date').val(data.from_date);
                            $('#to_date').val(data.to_date);
                            $('#member').val(data.member);
                            $('#active_close').val(data.active_close);
                            $('#rent_status').val(data.rent_status);
                        }
                    },
                    error: function () {
                        alert('Failed to retrieve data. Please try again.');
                    }
                });
            } else {
                // Clear the form fields if no transaction is selected
                $('#from_date').val('');
                $('#to_date').val('');
                $('#member').val('');
                $('#active_close').val('');
                $('#rent_status').val('');
            }
        });
    });
</script>

@endsection
