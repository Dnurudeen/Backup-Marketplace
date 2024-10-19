@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Marketplace</h1>

    <!-- Search and Filter -->
    <form method="GET" action="{{ route('marketplace') }}">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search items" value="{{ request()->search }}">
            </div>
            <div class="col-md-2">
                <select name="category" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" name="price_min" class="form-control" placeholder="Min Price" value="{{ request()->price_min }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="price_max" class="form-control" placeholder="Max Price" value="{{ request()->price_max }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- Items listing -->
    <div class="row mt-4">
        @forelse($items as $item)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        <p class="card-text"><strong>₦{{ number_format($item->price, 2) }}</strong></p>
                        <a href="{{ route('item.view', $item->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No items found</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $items->links() }}
    </div>
</div>
@endsection
