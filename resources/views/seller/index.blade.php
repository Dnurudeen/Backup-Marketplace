{{-- @extends('layouts.app') --}}
@extends('layouts.seller')

@section('title', 'Seller Dashboard')

<style>
    #no-item{
        /* display: flex;
        align-items: center;
        justify-content: center;
        margin-top: auto;
        margin-bottom: auto; */
        height: 400px;
        position: relative;
    }
    #no-item p{
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
    }
</style>

@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="row mb-4">
            <div class="col-12">
              <nav class="navbar navbar-expand-lg navbar-light mb-4 border-bottom border-bottom-2 border-dark" style="background-color: #fff;">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">My Adverts</a>
                  {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button> --}}
                  {{-- <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Published</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Drafts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Unpublished</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">All</a>
                      </li>
                    </ul>
                  </div> --}}
                </div>
              </nav>
            </div>
        </div>
        <div class="row h-100">
            <div class="col-12" style="background-color: #fff;">
                {{-- <h1>My Items</h1>
                <a href="{{ route('seller.items.create') }}" class="btn btn-primary mb-3">List New Item</a> --}}
                @if ($items->count() > 0)
                <div class="text-center justify-content-between" style="">
                    @if(session()->has('success'))
                        <p class="bg-success text-light p-3 w-100">
                            {{ session()->get('success') }}
                        </p>
                    @endif
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Condition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $item->condition)) }}</td>
                                    <td class="py-3">
                                        <a href="{{ route('item.view', $item->id) }}" class="fa fa-eye mx-1 text-danger" style="text-decoration: none;"></a>
                                        <a href="{{ route('seller.items.edit', $item->id) }}" style="text-decoration: none;" class="fa fa-edit mx-1 text-danger"></a>
                                        <form action="{{ route('seller.items.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="display: none;" id="submit_it" class=""></button>
                                            <a onclick="confirmDelete()" id="confirm_delete" style="text-decoration: none; cursor: pointer;" class="fa fa-trash mx-1 text-danger"></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div id="no-item">
                    <p>No items available.</p>
                </div>
            @endif
            </div>
        </div>

      </div>
    <!-- partial -->
</div>

{{-- <div class="container mt-5">

</div> --}}
@endsection


@section('scripts')
<script>
    function confirmDelete(){
        if (confirm("Are you sure you want to delete this item?")) {
            document.getElementById('submit_it').click();
        }
    }
</script>
@endsection
