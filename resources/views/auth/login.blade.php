@section('meta')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name='copyright' content='Copyright © 2024 Nigerian Mining. All rights reserved.'>
<meta name="keywords" content="Nigeria mining, mining industry, mining news, mining equipment, classified ads, mining services, minerals, resources, mining opportunities, exploration, mining community, geological insights, mineral extraction, Nigerian mines, drilling equipment, excavation tools, mining machinery">

<meta property="og:title" content="Nigeria Mining Login">
<meta property="og:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
<meta property="og:url" content="{{ route('marketplace') }}">
<meta property="og:site_name" content="Nigerian Mining Login" />
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('user/images/logo.png') }}">
<meta property="og:image:width" content="734" />
<meta property="og:image:height" content="418" />

<link rel="icon" type="image/png" href="{{asset('user/images/nm-favicon.png')}}" sizes="32x32" width="64" height="64">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Nigeria Mining About Us">
<meta name="twitter:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
<meta name="twitter:image" content="{{ asset('user/images/logo.png') }}">
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

<title>LOGIN</title>



<style>
    @media only screen and (min-width: 992px){
#login{
    padding: 20px 10rem 20px 10rem;
    position:absolute;
    top:0px;
    right:0px;
    bottom:0px;
    left:0px;
}
#register{
    padding: 20px 10rem 20px 10rem;
}
.desktop{
    display: inline;
}
#register #img{
    display: inline;
}
#login #img{
    display: inline;
}
.content{

}
}

@media only screen and (max-width: 992px){
.desktop{
    display: block;
}
#register #img{
    display: none;
}
#login #img{
    display: none;
}
}
</style>


<div class="content">
<div id="login" class="desktop">
    <div class="">
        <div class="row">
            <div class="col-lg-6" id="img" style="">
                <div class="container p-5" style="">
                    <div class="" style="margin-top: 4rem;">
                        <p class="d-inline" style="color: rgb(215, 215, 215);" id="greetings">Good Evening,</p><br>
                        <h1 class="d-inline text-light" style="font-size: 3rem;">Welcome back</h1>
                    </div>
                    <div style="margin-top: 18rem;">
                        <h3 class="text-light">Did you know? </h3>
                        <p style="color: rgb(215, 215, 215);">Nigerian Mining® is one of the foremost platforms for trustworthy information about the mining industry in the country? <a href="#" class="text-secondary"><i>Learn more</i></a></p>
                    </div>
                </div>
                <!-- <img src="assets/images/login-background.png" alt="login-background"> -->
            </div>
            <div class="col-lg-6 bg-light" style="min-height: 45rem;">
                <div>
                    <img src="assets/images/logo.png" style="width: 7rem; margin-bottom: 4rem;" alt="">
                </div>
                <div style="padding: 40px;">
                    <div class="card w-75 me-auto ms-auto mt-auto">
                        <h3 class="mb-4 mt-3">Log In</h3>
                        {{-- @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <form method="post" action="{{ route('login') }}" class="form">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="Email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Email" name="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="Password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12 text-left">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> <br><br>
                                <div class="col-12 text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-danger">
                                            {{ __('-> Forget Password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="my-4">
                                <button type="submit" class="btn btn-dark btn-submit w-100">Log In</button>
                            </div>
                            <div class="text-center">
                                <p>Don’t have an account? <a href="{{ route('register') }}" class="text-danger">Register here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var myDate = new Date();
    var hrs = myDate.getHours();

    var greet;

    if (hrs < 12)
    greet = 'Good Morning';
    else if (hrs >= 12 && hrs <= 16)
    greet = 'Good Afternoon';
    else if (hrs >= 16 && hrs <= 24)
    greet = 'Good Evening';

    document.getElementById('greetings').innerHTML = greet;
</script>
