@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seller Dashboard</h1>

    <a href="{{ route('seller.items.create') }}" class="btn btn-primary mb-4">Add New Item</a>

    <h3>Your Items</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>₦{{ number_format($item->price, 2) }}</td>
                    <td>{{ ucfirst($item->condition) }}</td>
                    <td>
                        <a href="{{ route('seller.items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <button type="button" onclick="confirmDelete()" id="submit" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<script>
    function confirmDelete(){
        let text = "Are you sure you want to delete this item?";
        let delete = document.getElementById('submit');

        if (confirm(text) == true) {
            document.delete.submit();
        } else {
            return 0;
        }
    }
</script>
