@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                {{-- <th>Slug</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parentCategory ? $category->parentCategory->name : 'Main Category' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    </td>
                </tr>
                @if ($category->subCategories->count() > 0)
                    @foreach ($category->subCategories as $subCategory)
                        <tr>
                            <td>-- {{ $subCategory->name }}</td>
                            <td>{{ $subCategory->parentCategory->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $subCategory->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
            {{-- @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
