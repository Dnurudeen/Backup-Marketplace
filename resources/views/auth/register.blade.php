@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='copyright' content='Copyright © 2024 Nigerian Mining. All rights reserved.'>
    <meta name="keywords" content="Nigeria mining, mining industry, mining news, mining equipment, classified ads, mining services, minerals, resources, mining opportunities, exploration, mining community, geological insights, mineral extraction, Nigerian mines, drilling equipment, excavation tools, mining machinery">

    <meta property="og:title" content="Nigeria Mining Register">
    <meta property="og:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
    <meta property="og:url" content="{{ route('register') }}">
    <meta property="og:site_name" content="Nigerian Mining Register" />
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('user/images/logo.png') }}">
    <meta property="og:image:width" content="734" />
    <meta property="og:image:height" content="418" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nigeria Mining About Us">
    <meta name="twitter:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
    <meta name="twitter:image" content="{{ asset('user/images/logo.png') }}">
    @endsection

    <link rel="icon" type="image/png" href="{{asset('user/images/nm-favicon.png')}}" sizes="32x32" width="64" height="64">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"> --}}

    <script src="https://kit.fontawesome.com/3df60fe6e2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>


    <title>REGISTER</title>

    <style>
        .show-password {
        transition: opacity .25s;
        position: absolute;
        background-color: transparent;
        right: 60;
        margin: auto;
        top: 0;
        bottom: 0;
        height: fit-content;
        border: none;
        font-size: 10px;
        color: grey;
        cursor: pointer;
        outline: none;
        text-transform: uppercase;
        }
        @media (max-width:768px){
            .show-password {
                right: 20;
                top: 0;
                bottom: -60;
            }
        }
        .show-password:hover,
        .show-password:focus {
        color: black;
        }
        .input-container:not(:hover, :focus-within) .show-password {
        opacity: 0;
        }
        .password-requirements {
        display: flex;
        flex-wrap: wrap;
        margin-top: -1rem;
        padding: 0 16px;
        }
        .requirement {
        font-size: 14px;
        line-height: 17px;
        flex: 1 0 50%;
        min-width: max-content;
        margin: 5px 0;
        }
        .requirement:before {
        content: '\2639';
        padding-right: 2px;
        font-size: 14px;
        top: .15em;
        }
        .requirement:not(.valid) {
        color: #dc3545;
        }
        .requirement.valid {
        color: #4CAF50;
        }
        .requirement.valid:before {
        content: '\263A';
        }
        .requirement.error {
        color: red;
        }
        .hidden {
        display: none;
        }
    </style>


    <div class="content">
    <div id="register" class="desktop">
        <div class="">
            <div class="row">
                <div class="col-lg-6" id="img">
                    <div class="container">
                        <img src="assets/images/texture-2.png" style="width: 100%" alt="">
                        <img src="assets/images/texture-3.png" style="width: 100%; max-height: 22rem; height: 40rem;" alt="">
                    </div>
                    <!-- <img src="assets/images/login-background.png" alt="login-background"> -->
                </div>
                <div class="col-lg-6 bg-light p-3" style="min-height: 5rem; padding: ;">
                    <div>
                        <img src="assets/images/logo.png" style="width: 13rem; margin-bottom: -3rem; margin-left: 2rem;" alt="">
                    </div>
                    <div style="padding: 0px 30px;">
                        <div class="card w-100 me-auto ms-auto mt-auto container" style="">
                            <h3 class="mb-4">Register</h3>
                            <p>Register via email and phone <br> <span class="text-danger">*</span>  indicates require fields</p>

                            <div class="me-0 ms-0 mt-0">
                                <input type="radio" value="ind" onchange="showDiv()" id="test2" name="reg" checked> Individual
                                <input type="radio" value="com" onchange="showDiv2()" style="margin-left: 2rem;" id="test2 test3" name="reg"> Company
                            </div><br>
                            <form action="{{ route('register') }}" id="individual" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <small for="Email">First Name <span class="text-danger">*</span></small>
                                        <input id="first_name" type="text" class="form-control" name="first_name" value=" "  placeholder="First Name">

                                        <!-- @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <small for="Email">Last Name <span class="text-danger">*</span></small>
                                        <input id="last_name" type="text" class="form-control" name="last_name" value=" "  placeholder="Last Name">

                                        <!-- @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group mb-3">
                                        <small for="Phone Number">Phone Number <span class="text-danger">*</span></small>
                                        <div class="select-box">
                                            <div class="selected-option">
                                                <div>
                                                    <span class="iconify" data-icon="flag:gb-4x3"></span><i class="" style=""></i>
                                                    <strong></strong>
                                                </div>
                                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">

                                                {{-- <input type="tel" name="tel" placeholder="Phone Number"> --}}
                                            </div>
                                            <div class="options">
                                                <input type="text" class="search-box text-dark" placeholder="Search Country Name">
                                                <ol>

                                                </ol>
                                            </div>
                                        </div>

                                        @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <small for="Email">Email <span class="text-danger">*</span></small>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <small for="Password">Password <span class="text-danger">*</span></small>
                                    <input id="password" aria-describedby="requirements" type="password" class="form-control pass @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                                    <button class="show-password" id="show-password" type="button" role="switch" aria-label="Show password" aria-checked="false">Show</button>


                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <small for="Password">Confirm Password <span class="text-danger">*</span></small>
                                    <input id="password-confirm confirm-password" type="password" class="form-control pass" name="password_confirmation" autocomplete="new-password" placeholder="Password">
                                </div>

                                <div id="requirements" class="password-requirements">
                                    <p><b>Your password must have</b>
                                    <br>
                                        <small class="requirement" id="lowercase"> One lower case </small> <br>
                                        <small class="requirement" id="uppercase"> One upper case </small> <br>
                                        <small class="requirement" id="characters"> One special character </small> <br>
                                        <small class="requirement" id="number"> One number </small> <br>
                                        <small class="requirement" id="length"> 8 total characters (minimum) </small>
                                        <p id='showme'></p>
                                    </p>
                                </div>
                                <div class="password-requirements">
                                    <p class="requirement hidden error" id="match">Passwords must match</p>
                                </div>

                                <input type="hidden" style="transform: scale(1.2);" value="seller" class="" name="is_seller" id="is_seller">

                                {{-- <div class="row">
                                    <small class="col-12 text-left mb-2 mt-4">
                                        <label for="is_seller" class="col-md-4 form-label">Register as Seller</label>
                                        <input type="checkbox" style="transform: scale(1.2);" class="" name="is_seller" id="is_seller"> Yes, I want to sell items
                                    </small>
                                </div> --}}

                                <div class="row">
                                    <small class="col-12 text-left mb-4 mt-2">
                                        <input type="checkbox" name="" id="" required style="transform: scale(1.2);"> By creating an account you agree to Pit To Port Media’s <a href="#" class="text-danger">Terms and Conditions</a>
                                    </small>

                                    <small class="col-12 text-right">
                                        Please see our <a href="#" class="text-danger">Privacy Policy</a>  to see how we process your data.
                                    </small>
                                </div>
                                <input type="hidden" name="role" value="seller" />
                                {{-- <input type="hidden" name="user" value="individual" /> --}}
                                <div class="my-4">
                                    <button type="submit" id="ind_btn" class="btn btn-dark w-100 text-center">Register</button>
                                </div>
                                <div class="text-center">
                                    <p>Already have an account? <a href="{{route('login')}}" class="text-danger">Log In</a></p>
                                </div>
                            </form>


                            <form action="" id="company" >
                                @csrf

                                    <div class="form-group mb-3">
                                        <small for="Company">Company Name <span class="text-danger">*</span></small>
                                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required placeholder="Company Name">

                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <small for="Email">Phone Number <span class="text-danger">*</span></small>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">

                                        @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <small for="Email">Email <span class="text-danger">*</span></small>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <small for="Password">Password <span class="text-danger">*</span></small>
                                    <input id="password" aria-describedby="requirements" type="password" class="form-control pass @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <button class="show-password" id="show-password" type="button" role="switch" aria-label="Show password" aria-checked="false">Show</button>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <small for="Password">Confirm Password <span class="text-danger">*</span></small>
                                    <input id="password-confirm confirm-password" type="password" class="form-control pass" name="password_confirmation" autocomplete="new-password" placeholder="Password">
                                </div>

                                <div id="requirements" class="password-requirements">
                                    <p><b>Your password must have</b>
                                    <br>
                                        <small class="requirement" id="lowercase"> One lower case </small> <br>
                                        <small class="requirement" id="uppercase"> One upper case </small> <br>
                                        <small class="requirement" id="characters"> One special character </small> <br>
                                        <small class="requirement" id="number"> One number </small> <br>
                                        <small class="requirement" id="length"> 8 total characters (minimum) </small>
                                        <p id='showme'></p>
                                    </p>
                                </div>
                                <div class="password-requirements">
                                    <p class="requirement hidden error" id="match">Passwords must match</p>
                                </div>
                                <div class="row">
                                    <small class="col-12 text-left mb-4 mt-2">
                                        <input type="checkbox" name="" id="" required style="transform: scale(1.2);"> By creating an account you agree to Pit To Port Media’s <a href="#" class="text-danger">Terms and Conditions</a>
                                    </small>

                                    <small class="col-12 text-right">
                                        Please see our <a href="#" class="text-danger">Privacy Policy</a>  to see how we process your data.
                                    </small>
                                </div>
                                <input type="hidden" name="role" value="seller" />
                                {{-- <input type="hidden" name="user" value="company" /> --}}
                                <div class="my-4">
                                    {{-- <button type="submit" id="com_btn" class="btn btn-dark w-100 text-center">Register</button> --}}
                                </div>
                                <div class="text-center">
                                    <p>Already have an account? <a href="{{url('/login')}}" class="text-danger">Log In</a></p>
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
        function hide_show(){

    const inputs = document.querySelectorAll("input");
    const form = document.getElementById("form");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const showPassword = document.getElementById("show-password");
    const matchPassword = document.getElementById("match");
    const submit = document.getElementById("submit");

inputs.forEach((input) => {
  input.addEventListener("blur", (event) => {
    if (event.target.value) {
      input.classList.add("is-valid");
    } else {
      input.classList.remove("is-valid");
    }
  });
});

showPassword.addEventListener("click", () => {
  if (password.type == "password") {
    password.type = "text";
    confirmPassword.type = "text";
    showPassword.innerText = "hide";
    showPassword.setAttribute("aria-label", "hide password");
    showPassword.setAttribute("aria-checked", "true");
  } else {
    password.type = "password";
    confirmPassword.type = "password";
    showPassword.innerText = "show";
    showPassword.setAttribute("aria-label", "show password");
    showPassword.setAttribute("aria-checked", "false");
  }
});

const updateRequirement = (id, valid) => {
  const requirement = document.getElementById(id);

  if (valid) {
    requirement.classList.add("valid");
  } else {
    requirement.classList.remove("valid");
  }
};

password.addEventListener("input", (event) => {
  const value = event.target.value;

  updateRequirement("length", value.length >= 8);
  updateRequirement("lowercase", /[a-z]/.test(value));
  updateRequirement("uppercase", /[A-Z]/.test(value));
  updateRequirement("number", /\d/.test(value));
  updateRequirement("characters", /[#.?!@$%^&*-]/.test(value));
});

confirmPassword.addEventListener("blur", (event) => {
  const value = event.target.value;

  if (value.length && value != password.value) {
    matchPassword.classList.remove("hidden");
  } else {
    matchPassword.classList.add("hidden");
  }
});

confirmPassword.addEventListener("focus", (event) => {
  matchPassword.classList.add("hidden");
});

const handleFormValidation = () => {
  const value = password.value;
  const confirmValue = confirmPassword.value;

  if (
    value.length >= 8 &&
    /[a-z]/.test(value) &&
    /[A-Z]/.test(value) &&
    /\d/.test(value) &&
    /[#.?!@$%^&*-]/.test(value) &&
    value == confirmValue
  ) {
    submit.removeAttribute("disabled");
    return true;
  }

  submit.setAttribute("disabled", true);
  return false;
};

form.addEventListener("change", () => {
  handleFormValidation();
});

form.addEventListener("submit", (event) => {
  event.preventDefault();
  const validForm = handleFormValidation();

  if (!validForm) {
    return false;
  }

  alert("Form submitted");
});

        }

        hide_show()
    </script>

    <!-- <script src="{{ asset('js/show-hide-password2.js') }}"></script> -->
    <script type="text/javascript">

    document.getElementById('company').style.display = "none";



        function showDiv(select){
		    document.getElementById('individual').style.display = "block";
            document.getElementById('company').style.display = "none";
		}


        function showDiv2(select){
			document.getElementById('company').style.display = "block";
            document.getElementById('individual').style.display = "none";
		}
        // com_btn.addEventListener('click', function(){
        //     document.getElementById('first_name').required = false;
        //     document.getElementById('last_name').required = false;
        // })
        // ind_btn.addEventListener('click', function(){
        //     document.getElementById('company_name').required = false;
        // })
	</script>


<script src="{{ asset('script.js') }}"></script>
