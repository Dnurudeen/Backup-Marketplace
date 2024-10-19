@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Items</h5>
                    <p class="card-text">{{ $itemCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subscriptions</h5>
                    <p class="card-text">{{ $subscriptionCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ url('/admin/categories') }}" class="btn btn-dark">Create category</a>
    </div>
</div>
@endsection
