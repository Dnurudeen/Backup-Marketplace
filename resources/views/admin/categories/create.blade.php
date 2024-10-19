@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Create New Category</h1>

    @if(session()->has('success'))
        <p class="bg-success text-light p-3 w-100">
            {{ session()->get('success') }}
        </p>
    @endif
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div> --}}
        <div class="form-group mb-4">
            <label for="parent_id">Parent Category (Optional)</label>
            <select name="parent_id" class="form-control">
                <option value="">None (Create as a main category)</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
</div>
@endsection
