@extends('layouts.seller')
@section('title', 'Seller Subscription')


@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="container">
            <h2>Subscribe to List Item</h2>
            <hr><br>
            <h6 class="mb-4">Choose a Subscription Plan</h6>
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
            <form action="{{ route('subscribe.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="plan_type">Plan Type</label>
                    <select name="plan_type" id="plan_type" class="form-control" onchange="priceValue()">
                        <option value="">Select Plan</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>

                <div class="form-group" style="height: 5vh;">
                    <div class="my-auto px-3">
                        <h4>Amount: <span id="figure" class=""></span></h4>
                    </div>
                </div>

                <input type="number" style="display: none;" id="amount" value="">
                <button type="submit" class="btn btn-danger">Subscribe Now</button>
            </form>

            <h3>Subscription History</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Plan type</th>
                        <th>Status</th>
                        <th>Subscribed date</th>
                        <th>Expire date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ ucfirst($subscription->plan_type) }}</td>
                        <td>{{ $subscription->status }}</td>
                        <td>{{ $subscription->updated_at->format('F d, Y') }}</td>
                        <td>{{ $subscription->expires_at->format('F d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script>
    function priceValue(){
        let plan = document.getElementById('plan_type').value;
        let amount = document.getElementById('amount').value;

        if (plan == 'weekly'){
            amount = 5000;
            document.getElementById('figure').innerHTML = amount;
        }else if (plan == 'monthly'){
            amount = 10000;
            document.getElementById('figure').innerHTML = amount;
        }else if (plan == 'yearly'){
            amount = 15000;
            document.getElementById('figure').innerHTML = amount;
        }else{
            document.getElementById('figure').innerHTML = 'No selection yet';
        }
    }
</script>
