@extends('layouts.seller')

@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="container">
            <h2>Create an Ad</h2>
            <hr><br>
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
            <form action="{{ route('ads.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="item_id">Select Item</label>
                    <select name="item_id" id="item_id" class="form-control">
                        @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ad_type">Ad Type</label>
                    <select name="ad_type" id="ad_type" class="form-control">
                        <option value="paid">Paid</option>
                        <option value="free">Free</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>

                <button type="submit" class="btn btn-danger">Create Ad</button>
            </form>
        </div>
    </div>
</div>
@endsection
