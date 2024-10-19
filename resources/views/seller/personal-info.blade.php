@extends('layouts.setting')
@section('title', 'Seller Profile')

<!-- partial -->
<style>
    .main-panel{
      padding-left: 20px;
    }
</style>

@section('content')
      <div class="main-panel">
        <div class="content-wrapper" style="background-color: #fff;">
          <div class="row">
              <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light mb-4 border border-2 border-dark" style="background-color: #fff;">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="#">Personal details</a>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="justify-content-end" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link active" href="#" aria-current="page">Save</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
          </div>
          <style>
            .user-image img{
                border-radius: 100%;
                height: 100px;
                width: 100px;
            }
          </style>
          <div class="h-100">
              <div class="container" style="background-color: #fff;">
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
                  <div class="text-center">
                    <form action="{{ route('update.personal.info') }}" method="POST" class="mt-auto me-auto ms-auto w-75">
                        @csrf
                        @method('PUT')
                        <div class="user-profile mb-4">
                            <div class="user-image">
                              <img src="{{ asset('images/faces/user-vector.png') }}">
                              <i class="fa-regular fa-pen-to-square"></i>
                            </div>
                          </div>
                          <!-- <div class="form-group mt-5">
                            <input type="text" placeholder="First name" value="{{auth()->user()->first_name}}" class="form-control form-control-lg border border-1 border-dark">
                          </div> -->
                          <div class="form-group">
                            <input type="text" placeholder="Full name" value="{{auth()->user()->name}} {{auth()->user()->company}}" disabled class="form-control form-control-lg border border-1 border-dark">
                          </div>
                          <div class="form-group">
                            <input type="email" placeholder="Email address" value="{{auth()->user()->email}}" disabled class="form-control form-control-lg border border-1 border-dark">
                          </div>
                          <div class="form-group">
                            <input type="tel" placeholder="Phone number" name="seller_phone" value="{{auth()->user()->phone}}" class="form-control form-control-lg border border-1 border-dark">
                          </div>
                          <div class="form-group">
                            {{-- <label for="gender" class="text-left">Gender</label> --}}
                            {{-- <input type="text" placeholder="Gender" value="{{ucfirst(auth()->user()->gender)}}" class="form-control form-control-lg border border-1 border-dark"> --}}
                            <select name="seller_gender" id="" class="form-control form-control-lg border border-1 border-dark">
                                <option value="{{auth()->user()->gender}}">{{ucfirst(auth()->user()->gender)}}</option>
                                <option value="not specified">Rather Not Say</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" placeholder="Location" name="seller_location" value="{{ucfirst(auth()->user()->location)}}" class="form-control form-control-lg border border-1 border-dark">
                          </div>
                          <div class="pt-4">
                            <button type="submit" class="btn btn-dark w-100" id="next">Save</button>
                          </div>
                    </form>
                  </div>
              </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
          </div>
        </footer> -->
        <!-- partial -->
      </div>
@endsection
