@extends('layouts.seller')

@section('title', 'Post Ad')

<style>
    html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}
</style>


@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
        <div class="row">
            <div class="col-12">
              <nav class="navbar navbar-expand-lg navbar-light mb-4 border border-2 border-dark" style="background-color: #fff;">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">My Adverts</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                  </div>
                </div>
              </nav>
            </div>
        </div>
        <div class="row h-100">
            <div class="col-12" style="background-color: #fff;">
                <div class="text-center justify-content-between" style="margin-top: 20%; margin-bottom: 20%;">
                  <p>There are no Adverts yet</p>
                  <p>Create new one now!</p>
                </div>
            </div>
        </div>

      </div>
    <!-- partial -->
</div>
@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
