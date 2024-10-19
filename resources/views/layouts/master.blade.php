<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="The leading source for mining and solid mineral news in Nigeria. Discover valuable insights, news, and resources about Nigeria mining. Connect with industry experts and enthusiasts. Post and find classified ads for mining equipment, services, and opportunities. Your gateway to the thriving world of mining in Nigeria.">

    @yield('meta')

    <link rel="canonical" href="https://nigerianmining.com">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('user/images/nm-favicon.png')}}" sizes="32x32" width="64" height="64">

    <script src="https://kit.fontawesome.com/3df60fe6e2.js" crossorigin="anonymous"></script>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> --}}

    @yield('style')
    <style>
    .post-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.share-container {
    text-align: right;
}

        /* Spinner */
        /* #overlay {
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height: 100%;
            display: none;
            background: rgba(0, 0, 0, 0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 100px;
            height: 100px;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        } */

    </style>
</head>

<body>
    <div class="wrapper">
        <header class="header ">
            <div class="top-nav">
                <span class="top-date">{{ now()->format('l, d F, Y') }}</span>
                <div class="container">
                    {{-- <marquee>
                        <ul class="matter-list">
                            @foreach (\App\Models\MetalRate::select('name', 'rate')->get() as $val )
                            <li><span>{{$val->name}}</span><span class="value-tag clr-green">{{$val->rate}}</span></li>
                            @endforeach
                        </ul>
                    </marquee> --}}
                    {{-- <marquee>
                        <ul class="matter-list">
                            <li><span>Cobalt $4100/otz </span><span class="value-tag clr-green">+46%</span></li>
                            <li><span>Gold $1983/otz </span><span class="value-tag clr-green">+1%</span></li>
                            <li><span>Coal $83/otz </span><span class="value-tag clr-red">-10%</span></li>
                            <li><span>Cobalt $4100/otz </span><span class="value-tag clr-red">-18%</span></li>
                            <li><span>Nickel $8.6/otz</span><span class="value-tag clr-green">+1%</span></li>
                        </ul>
                    </marquee> --}}
                </div>
            </div>
            <div class="logo-wrap">
                <a href="{{url('/')}}">
                    <img src="{{asset('user/images/logo.png')}}" width="289" height="109" alt="nigerian mining">
                </a>
            </div>
            <p class="text-center"><b>The leading source for mining and solid mineral news in Nigeria</b></p>
            <div class="second-nav main_nav">
                <div class="container">
                    <nav class="">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="">
                            <div class="navbar w-100 justify-content-between">
                                <div class="navbar-brand">
                                    <a class="nav-link link-light" href="{{ route('marketplace') }}">HOME</a>
                                </div>

                                <ul class="nav justify-content-end">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('marketplace') }}">Marketplace</a>
                                    </li> --}}

                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link link-light" href="{{ route('login') }}">LOGIN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-light" href="{{ route('register') }}">REGISTER</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link link-light" href="{{ route('seller.items') }}">MY ITEMS</a>
                                        </li>
                                        @if(auth()->user()->hasRole('admin'))
                                            <li class="nav-item">
                                                <a class="nav-link link-light" href="{{ route('admin.dashboard') }}">ADMIN DASHBOARD</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link link-light" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                LOGOUT
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest


                                    {{-- @auth
                                        <li><a href="{{route('dashboard')}}" class="nav_link">Dashboard</a></li>
                                    @endauth --}}

                                </ul>
                            </div>
                        </div>

                    </nav>
                </div>
            </div>
        </header>

        <!------>
        <main class="py-4">
            @yield('content')
        </main>
        {{-- @yield('content') --}}
        <!------>

    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-wrap">
                <ul class="footer-list">
                    <li>© {{date('Y')}} <strong>Pit To Port Media Limited - All Rights Reserved</strong></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li>
                </ul>
                <ul class="social-list">
                    <li><a href="https://www.facebook.com/nigerianmining" target="_blank"><i class="ico icon-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/nigerianmining" target="_blank"><i class="ico icon-instagram"></i></a></a></li>
                    <li><a href=""><i class="ico icon-linkedin"></i></a></a></li>
                    <li><a href="https://twitter.com/nigerianmining_" target="_blank"><i class="ico icon-twitter-x"></i></a></a></li>
                    <form action="{{route('marketplace')}}" method="POST">
                    <div class="search-container">
                        @csrf
                        <input type="text" class="form_control" name="search">
                        <button type="submit">Search</button>
                    </div>
                    </form>
                </ul>
            </div>
        </div>
    </footer>

    {{-- loader --}}
    {{-- <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"><img src="{{asset('user/images/nm-favicon.png')}}"></span>
    </div>
    </div> --}}
    {{-- loader --}}

    </div>
    {{-- <script>
        $("#overlay").fadeIn(300);
             {{-- $(window).on("load", function() {
            $("#overlay").fadeOut(300);
        });
    </script> --}}

    <button class="btn trigger" style="display:none">Click here to trigger the modal!</button>

    {{-- Modal --}}
    <div class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="alert alert-success" role="alert" id="subscribeMessage" style="display: none">
                Subscribed Successfully
            </div>
            <br>
            <h1 class="text-center">Subscribe To Our Newsletter</h1>
            <div class="input-wrap">
            <form action="{{ url('subscribe') }}" class="form" id="subscribeForm">
                    @csrf
                    <input type="email" class="form_control" placeholder="Enter Your Email" name="subscriber_email">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-dark btn-submit" type="submit" >Submit</button>
                </div>
            </form>

        </div>
    </div>
    {{-- Modal --}}
    <script src="{{asset('user/js/jquery.min.js')}}"></script>
    <script src="{{asset('user/js/swiper.js')}}"></script>
    <script src="{{asset('user/js/frontend.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {

            // navbar dropdown
            $('.nav_link').on('click', function() {
                $('.drop-icon').removeClass('active');
                $(this).closest('.drop-icon').addClass('active');
            });

            $('body').on('click', function(e) {
                if (!$(e.target).closest('.nav-bar').length) {
                    $('.drop-icon').removeClass('active');
                }
            });

            // newsletter
            function executeTrigger() {
                $('.trigger').click();
            }

            if (!localStorage.getItem('triggerExecuted')) {
                executeTrigger();
                localStorage.setItem('triggerExecuted', 'true');
            }

        });

        // Modal script
        var modal = document.querySelector(".modal");
        var triggers = document.querySelectorAll(".trigger");
        var closeButton = document.querySelector(".close-button");

        function toggleModal() {
            modal.classList.toggle("show-modal");
        }

        function windowOnClick(event) {
            if (event.target === modal) {
                toggleModal();
            }
        }

        for (var i = 0, len = triggers.length; i < len; i++) {
            triggers[i].addEventListener("click", toggleModal);
        }
        closeButton.addEventListener("click", toggleModal);
        window.addEventListener("click", windowOnClick);

    </script>

    <script>
        $('#subscribeForm').submit(function(e) {
            e.preventDefault();
            //data
            var url = $(this).attr('action');
            //send request
            var submit_r = $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $('form').serialize(),
                success: function(data) {
                    $('#subscribeMessage').css('display', '');
                },
                error: function(data, textStatus, xhr) {

                }
            });
        });
    </script>

    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
