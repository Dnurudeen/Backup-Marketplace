@extends('layouts.seller')
@section('title', 'Payment History')

@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="container">
            {{-- <h2>Make a Payment</h2>
            @if(session()->has('success'))
                <p class="bg-success text-light p-3 w-100">
                    {{ session()->get('success') }}
                </p>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger w-100"><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Pay Now</button>
            </form> --}}

            <h2>Payment History</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->transaction_id }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->payment_status }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
