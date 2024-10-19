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
          <div class="row h-100">
            <div class="col-12 pl-5 pr-5" style="background-color: #fff;">
                <div class="container p-lg-5 justify-content-between">
                  <div>
                      <p>Account deactivitation means to delete your account <br> You will not be able to log in to your profile anymore and all your account history will be deleted without the possiibility to restore</p>
                  </div>
                  <div class="border border-2 border-dark text-center mt-5">
                      <p>Why do you want to leave <i class="fa-solid fa-caret-down mt-3 mb-1"></i></p>
                  </div>

                  <div style="margin-top: 8rem;">
                    <form action="{{ route('seller.account.destroy') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="display: none;" id="submit_it" class=""></button>
                        <a onclick="confirmDelete()" id="confirm_delete" style="text-decoration: none; cursor: pointer;" class="btn btn-dark border border-2 border-dark w-100 mb-4">Delete my account forever</a>
                    </form>

                      <a class="btn btn-light border border-2 border-dark w-100" href="{{route('logout')}}" id="next">Log Out</a>
                  </div>
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

<script>
    function confirmDelete(){
        if (confirm("Are you sure you want to delete this account?")) {
            document.getElementById('submit_it').click();
        }
    }
</script>
