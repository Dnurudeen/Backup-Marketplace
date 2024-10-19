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
<style>
    .dropzone {
    width: 120px;
    max-height: 50px;
    border: 10px solid #fff;
    border-radius: 3px;
    text-align: center;
    background-color: #efefef;
    text-align: center;
    padding: 5px;
    margin: auto;
    }
    .dropzone img{
    width: auto;
    height: 70px;
    border-radius: 3px;
    }

    .upload-icon {
    margin-top: 2rem;
    position: relative;
    }

    .upload-input {
    position: relative;
    top: -32px;
    left: 0;
    width: 100%;
    opacity: 0;
    z-index: 20;
    }
    .upload-input:hover{
    cursor: pointer;
    }

  </style>


@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
      <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light mb-4 border border-2 border-dark" style="background-color: #fff;">
              <div class="container-fluid">
                <a class="navbar-brand" href="{{route('seller.items')}}">Post Ad</a>
              </div>
            </nav>
          </div>
      </div>
      <div class="mt-auto me-auto ms-auto">
          <div class="" style="background-color: #fff;">
      <div class="row h-100 mt-4">
          <div class="col-12" style="background-color: #fff;">
              <div class="justify-content-between">
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
                <form action="{{ route('seller.items.store') }}" method="POST" class="form" id="myform" name="myform" enctype="multipart/form-data">
                    @csrf
                    {{-- {{csrf_field()}} --}}
                    <div id="form1">
                  <div class="form-group">
                        <select class="form_control border border-0 border-dark w-100" name="category_id" id="category" required>
                            <option value="" disabled selected>Select a category <span class="text-danger">*</span></option>

                            <optgroup label="Bulldozers">
                                <option value="1">Bulldozers</option>
                                <option value="7">Dozer parts</option>
                                <option value="8">Crawler and Swamp</option>
                                <option value="9">Dismantling</option>
                                <option value="10">Wheel</option>
                            </optgroup>
                            <optgroup label="Excavators">
                                <option value="11">Excavator parts</option>
                                <option value="12">Excavators</option>
                                <option value="13">Excavator accessories</option>
                                <option value="14">Vacuum Excavators</option>
                                <option value="15">Dismantling</option>
                            </optgroup>
                            <optgroup label="Generators">
                                <option value="16">Generators</option>
                                <option value="17">Portable Generators</option>
                                <option value="18">Mini Generators</option>
                                <option value="19">Generator Parts</option>
                                <option value="20">Alternators</option>
                                <option value="21">Generator Accessories</option>
                            </optgroup>
                            <option value="4">Forklifts</option>
                            <optgroup label="Screening and Crushing">
                                <option value="22">Screening and Crushing</option>
                                <option value="23">Conveyors</option>
                                <option value="24">Screening – Crushing Parts</option>
                                <option value="25">Dismantling</option>
                            </optgroup>
                            <optgroup label="Compressors">
                                <option value="6">Compressors</option>
                                <option value="26">Portable Compressors</option>
                                <option value="27">Stationary Compressors</option>
                                <option value="28">Screw compressors</option>
                                <option value="29">Air Receivers</option>
                                <option value="30">Compressor attachments</option>
                                <option value="31">Compressor parts</option>
                            </optgroup>
                        </select>
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option> --}}

                                {{-- <li>{{ $category->name }}</li>
                                @if ($category->subCategories->count() > 0)
                                    <ul>
                                        @foreach ($category->subCategories as $subCategory)
                                            <li>{{ $subCategory->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif --}}
                            {{-- @endforeach --}}

                            {{-- @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach --}}
                    <!-- <input type="text" placeholder="Category" class="form-control form-control-lg border border-1 border-dark"> -->
                  </div>
                  <div class="form-group">
                    <select class="form_control border border-0 w-100" name="location" id="location" required>
                        <option value="">Select a location <span class="text-danger">*</span></option>
                    </select>
                    <!-- <input type="text" placeholder="Location" class="form-control form-control-lg border border-1 border-dark"> -->
                  </div>



                  <div class="form-group">
                      <div>
                        <p>Add Photo <span class="text-danger">*</span> <br> Add atleast 3 photos for this post <br> First picture is the cover picture. you can change the order of the phots, just grab the photos and drag</p>
                      </div>

                      <table class="">
                          <tr class="">
                                <td class="dropzone">
                                  <li class="fa fa-plus upload-icon"></li>
                                  <input type="file" class="upload-input form_control" name="images[]" id="myimages" multiple required/>
                                  <!-- <img class="plus-icon" src="{{asset('user/images/plus-icon.svg')}}" alt=""> -->
                                  @error('images')
                                    <div>{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="">
                                    <div id="preview" class="">

                                    </div>
                                  <!-- <img id="blah" style="display: none;" src="http://placehold.it/180" alt="your image" /> -->
                                  <!-- <img class="plus-icon" src="{{asset('user/images/plus-icon.svg')}}" alt=""> -->
                                </td>
                          </tr>
                      </table>
                      <p>Supported formats are jpg and png</p>
                  </div>



                  <div class="form-group">
                    <input type="url" placeholder="YouTube Link" name="youtube_link" id="youtube_link" class="form-control form-control-lg border border-1 border-dark">
                  </div>

                  <div class="pt-4">
                    <a class="btn btn-dark w-100 text-center" id="next">Next</a>
                  </div>
                </div>

                  <div style="display: none;" id="form2">
                    <div class="form-group">
                      <input type="text" placeholder="Title" name="name" required class="form-control form-control-lg border border-1 border-dark">
                    </div>
                    <div class="form-group">
                      <select name="item_type" id="item_type" required class="form_control form-control-lg border border-1 w-100 border-dark">
                      <option value="">Select a type</option>
                      <option value="for_hire">For Hire</option>
                      <option value="for_sale">For Sale</option>
                                {{-- <option value="excavators">Excavators</option>
                                <option value="tractors">Tractors</option>
                                <option value="wheel-loaders">Wheel Loaders</option>
                                <option value="backhoe-loaders">Backhoe Loaders</option>
                                <option value="forklifts">Forklifts</option>
                                <option value="bulldozers">Bulldozers</option>
                                <option value="concrete-mixers">Concrete Mixers</option>
                                <option value="cranes">Cranes</option>
                                <option value="storage-tanks">Storage Tanks</option>
                                <option value="compressors">Compressors</option>
                                <option value="crushers">Crushers</option>
                                <option value="trucks-machinery-attachments">Trucks Machinery Attachments</option>
                                <option value="other">Other</option> --}}
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" placeholder="Model" name="model" required class="form-control form-control-lg border border-1 border-dark">
                    </div>
                    <div class="form-group">
                      <select name="manufaction_year" id="yom" required class="form_control form-control-lg border border-1 w-100 border-dark">
                        <option value="">Years of Manufacture</option>
                                <?php
                                // for ($year = 1970; $year <= 2024; $year++) {
                                //     echo "<option value=\"$year\">$year</option>";
                                // }
                                for ($year = 1970; $year <= 2024; $year++) {
                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                }
                                ?>
                      </select>
                    </div>

                    <div class="form-group">
                        <select name="make" id="make" required class="form_control form-control-lg border border-1 w-100 border-dark">
                          <option value="">Make</option>
                          <option value="Caterpillar">Caterpillar</option>
                          <option value="Mantrac">Mantrac</option>
                          <option value="Komatsu">Komatsu</option>
                          <option value="Sumitomo">Sumitomo</option>
                          <option value="Kobelco">Kobelco</option>
                          <option value="Hitachi">Hitachi</option>
                          <option value="XCMG">XCMG</option>
                          <option value="Volvo">Volvo</option>
                          <option value="Doosan">Doosan</option>
                          <option value="Hidromek">Hidromek</option>
                          <option value="Yanmar">Yanmar</option>
                          <option value="Hyundai">Hyundai</option>
                          <option value="Lovol">Lovol</option>
                          <option value="Wacker Neusen">Wacker Neusen</option>
                          <option value="Case">Case</option>
                          <option value="Trident">Trident</option>
                          <option value="JCB">JCB</option>
                          <option value="Airman">Airman</option>
                          <option value="Shantui">Shantui</option>
                          <option value="Kubota">Kubota</option>
                          <option value="Liebherr">Liebherr</option>
                          <option value="Takeuchi">Takeuchi</option>
                          <option value="Yuchai">Yuchai</option>
                          <option value="Bobcat">Bobcat</option>
                          <option value="Sany">Sany</option>
                          <option value="Uhi">Uhi</option>
                          <option value="Cobra Equipment">Cobra Equipment</option>
                          <option value="Daewoo">Daewoo</option>
                          <option value="ECM">ECM</option>
                          <option value="Hydrema">Hydrema</option>
                          <option value="John Deere">John Deere</option>
                          <option value="Kato">Kato</option>
                          <option value="Liugong">Liugong</option>
                          <option value="Rippa">Rippa</option>
                          <option value="Samsung">Samsung</option>
                          <option value="Sunward">Sunward</option>
                          <option value="Terex">Terex</option>
                          <option value="XGMA">XGMA</option>
                          <option value="Zoomlion">Zoomlion</option>
                          {{-- <option value="other">Other</option> --}}
                        </select>
                      </div>

                    <div class="form-group">
                      <select name="condition" id="condition" required class="form_control form-control-lg border border-1 w-100 border-dark">
                        <option value="">Condition</option>
                        <option value="new">Brand New</option>
                        <option value="foreign_used">Foreign Used</option>
                        <option value="nigerian_used">Nigerian Used</option>
                        {{-- <option value="other">Other</option> --}}
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="exchange_possible" id="make" required class="form_control form-control-lg border border-1 w-100 border-dark">
                        <option value="">Exchange Possible</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" name="description" required placeholder="Description" class="form-control form-control-lg border border-1 border-dark">
                    </div>

                    <div class="form-group">
                      <input type="text" placeholder="Price `N`" id="currency-field" pattern="^\₦\d{1,3}(,\d{3})*(\.\d+)?₦" data-type="currency" name="price" required class="form-control form-control-lg border border-1 border-dark">
                    </div>
                    <div class="form-group">
                      <input type="checkbox" class="mr-3" value="1" name="negotiable" style="transform: scale(2);"> Negotiable
                    </div>

                    <div class="pt-4">
                        {{-- <a class="btn btn-dark w-100 text-center" id="next2">Proceed to Payment ></a> --}}
                        <button type="submit" class="btn btn-dark w-100">Post Ad</button>
                  </div>
                  </div>

                  <div style="display: none;" id="form3">
                    <div class="form-group">
                        <label for="first-name">Name</label>
                        <input type="text" class="form-control form-control-lg border border-1 border-dark" id="first-name" value="{{auth()->user()->name}} {{auth()->user()->company}}" />
                    </div>
                    <input type="hidden" class="form_control" id="amount" />
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control form-control-lg border border-1 border-dark" id="email-address" value="{{auth()->user()->email}}" />
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="amount" value="15000" style="transform: scale(2);">
                        <label class="form-check-label" for="oneWeek" style="margin-left:10px;">N15,000 for one week</label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="amount" value="41500" style="transform: scale(2);">
                        <label class="form-check-label" for="oneMonth" style="margin-left:10px;"> N41,500 for one month</label>
                    </div>
                    <br>
                    <script src="https://js.paystack.co/v1/inline.js"></script>

                    <div class="form-submit">
                        {{-- <button type="button" onclick="payWithPaystack()" class="btn btn-dark btn-submit" style="width:100%;">Pay & Post Ad</button> --}}
                        {{-- <button type="submit" class="btn btn-dark btn-submit" style="width:100%;">Pay & Post Ad</button> --}}
                    </div>
                    <!-- <div class="pt-4">
                        <button type="submit" class="btn btn-dark w-100">Post Ad</button>
                    </div> -->
                </div>
                </form>
              </div>
                            </div>
                            </div>
          </div>
      </div>

    </div>



        <!-- <script src="{{asset('user/js/paystack.js')}}"></script> -->
        <script>
            function payWithPaystack() {

        let handler = PaystackPop.setup({
        //key: 'pk_live_adffe66fdded92a15d5ce301dab5b726b7d69d6a', // Replace with your public key
        // key: 'pk_test_3cab450e303c3c48a8799b0b2c684cb3440a0d85', // Replace with your public key
        key: 'pk_test_f929791ee9d7cb83061fc2d5c68797dd6ccf143e', // Replace with your public key


        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        currency: 'NGN',
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"

        callback: function(response){
            var routeUrl = "/post-ad-success";
            window.location.href = routeUrl;
            document.myform.submit();
        },
        onClose: function(){
            alert('You are about to leave the payment popup');
            },
        });

        function payWithPaystack(event){
            event.preventDefault();
        }


        handler.openIframe();
        }

            $(document).ready(function() {
                $('input[name="amount"]').change(function() {
                    var selectedAmount = $('input[name="amount"]:checked').val();
                    $('#amount').val(selectedAmount);
                });
            });
        </script>

</div>
@endsection

{{-- @section('content')
<div class="container mt-5">
    <h1>List New Item</h1>

    <form action="{{ route('seller.items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" value="" id="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select name="condition" id="condition" class="form-control" required>
                <option value="new">Brand New</option>
                <option value="foreign_used">Foreign Used</option>
                <option value="nigerian_used">Nigerian Used</option>
            </select>
        </div>
        <div class="form-group">
            <label for="images">Item Images (Minimum 2, Maximum 15)</label>
            <input type="file" name="images[]" id="images" class="form-control-file" multiple required>
        </div>
        <button type="submit" class="btn btn-primary">List Item</button>
    </form>
</div>
@endsection --}}




@section('scripts')
<script>
    function previewImages() {

    var preview = document.querySelector('#preview');

    if (this.files) {
    [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

    // File type validator based on the extension
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
        return alert(file.name + " is not an image");
    }

    var reader = new FileReader();

    reader.addEventListener("load", function() {
        var image = new Image();
        image.height = 100;
        image.weight = 100;
        image.title = file.name;
        image.src = this.result;
        preview.appendChild(image);
    });

    reader.readAsDataURL(file);

    }

    }

    document.querySelector('#myimages').addEventListener("change", previewImages);
</script>

<script language="javascript" type="text/javascript">
    next.addEventListener('click', function(){
        let category = document.getElementById('category').value;
        let location = document.getElementById('location').value;
        // let images = $("#images")[0].files.length;
        let images = document.getElementById('myimages').value;
        if(category == "" || location == "" || images == ""){
            window.alert('kindly fill out required fields');
            return false;
        }else{
            document.getElementById('form1').style.display = 'none';
            document.getElementById('form2').style.display = 'block';
            document.getElementById('form3').style.display = 'none';
        }
    })

        next2.addEventListener('click', function(){
            document.getElementById('form1').style.display = 'none';
            document.getElementById('form2').style.display = 'none';
            document.getElementById('form3').style.display = 'block';
        })
</script>

{{-- CURRENCY --}}
<script>
    // Jquery Dependency

    $("input[data-type='currency']").on({
    keyup: function() {
    formatCurrency($(this));
    },
    blur: function() {
    formatCurrency($(this), "blur");
    }
    });


    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
    right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "₦" + left_side + "." + right_side;

    } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "₦" + input_val;

    // final formatting
    if (blur === "blur") {
    input_val += ".00";
    }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        // --> FIRST SECTION

        // CATEGORY
        $("#category").select2();

        // LOCATION
        var locations = {
            "Abia": [
                "Aba North"
                , "Aba South"
                , "Arochukwu"
                , "Bende"
                , "Ikwuano"
                , "Isiala-Ngwa North"
                , "Isiala-Ngwa South"
                , "Isuikwato"
                , "Obi Nwa"
                , "Ohafia"
                , "Osisioma"
                , "Ngwa"
                , "Ugwunagbo"
                , "Ukwa East"
                , "Ukwa West"
                , "Umuahia North"
                , "Umuahia South"
                , "Umu-Neochi"
            ]
            , "Adamawa": [
                "Demsa"
                , "Fufore"
                , "Ganaye"
                , "Gireri"
                , "Gombi"
                , "Guyuk"
                , "Hong"
                , "Jada"
                , "Lamurde"
                , "Madagali"
                , "Maiha"
                , "Mayo-Belwa"
                , "Michika"
                , "Mubi North"
                , "Mubi South"
                , "Numan"
                , "Shelleng"
                , "Song"
                , "Toungo"
                , "Yola North"
                , "Yola South"
            ]
            , "Anambra": [
                "Aguata"
                , "Anambra East"
                , "Anambra West"
                , "Anaocha"
                , "Awka North"
                , "Awka South"
                , "Ayamelum"
                , "Dunukofia"
                , "Ekwusigo"
                , "Idemili North"
                , "Idemili south"
                , "Ihiala"
                , "Njikoka"
                , "Nnewi North"
                , "Nnewi South"
                , "Ogbaru"
                , "Onitsha North"
                , "Onitsha South"
                , "Orumba North"
                , "Orumba South"
                , "Oyi"
            ]
            , "Akwa Ibom": [
                "Abak"
                , "Eastern Obolo"
                , "Eket"
                , "Esit Eket"
                , "Essien Udim"
                , "Etim Ekpo"
                , "Etinan"
                , "Ibeno"
                , "Ibesikpo Asutan"
                , "Ibiono Ibom"
                , "Ika"
                , "Ikono"
                , "Ikot Abasi"
                , "Ikot Ekpene"
                , "Ini"
                , "Itu"
                , "Mbo"
                , "Mkpat Enin"
                , "Nsit Atai"
                , "Nsit Ibom"
                , "Nsit Ubium"
                , "Obot Akara"
                , "Okobo"
                , "Onna"
                , "Oron"
                , "Oruk Anam"
                , "Udung Uko"
                , "Ukanafun"
                , "Uruan"
                , "Urue-Offong/Oruko "
                , "Uyo"
            ]
            , "Bauchi": [
                "Alkaleri"
                , "Bauchi"
                , "Bogoro"
                , "Damban"
                , "Darazo"
                , "Dass"
                , "Ganjuwa"
                , "Giade"
                , "Itas/Gadau"
                , "Jama'are"
                , "Katagum"
                , "Kirfi"
                , "Misau"
                , "Ningi"
                , "Shira"
                , "Tafawa-Balewa"
                , "Toro"
                , "Warji"
                , "Zaki"
            ]
            , "Bayelsa": [
                "Brass"
                , "Ekeremor"
                , "Kolokuma/Opokuma"
                , "Nembe"
                , "Ogbia"
                , "Sagbama"
                , "Southern Jaw"
                , "Yenegoa"
            ]
            , "Benue": [
                "Ado"
                , "Agatu"
                , "Apa"
                , "Buruku"
                , "Gboko"
                , "Guma"
                , "Gwer East"
                , "Gwer West"
                , "Katsina-Ala"
                , "Konshisha"
                , "Kwande"
                , "Logo"
                , "Makurdi"
                , "Obi"
                , "Ogbadibo"
                , "Oju"
                , "Okpokwu"
                , "Ohimini"
                , "Oturkpo"
                , "Tarka"
                , "Ukum"
                , "Ushongo"
                , "Vandeikya"
            ]
            , "Borno": [
                "Abadam"
                , "Askira/Uba"
                , "Bama"
                , "Bayo"
                , "Biu"
                , "Chibok"
                , "Damboa"
                , "Dikwa"
                , "Gubio"
                , "Guzamala"
                , "Gwoza"
                , "Hawul"
                , "Jere"
                , "Kaga"
                , "Kala/Balge"
                , "Konduga"
                , "Kukawa"
                , "Kwaya Kusar"
                , "Mafa"
                , "Magumeri"
                , "Maiduguri"
                , "Marte"
                , "Mobbar"
                , "Monguno"
                , "Ngala"
                , "Nganzai"
                , "Shani"
            ]
            , "Cross River": [
                "Akpabuyo"
                , "Odukpani"
                , "Akamkpa"
                , "Biase"
                , "Abi"
                , "Ikom"
                , "Yarkur"
                , "Odubra"
                , "Boki"
                , "Ogoja"
                , "Yala"
                , "Obanliku"
                , "Obudu"
                , "Calabar South"
                , "Etung"
                , "Bekwara"
                , "Bakassi"
                , "Calabar Municipality"
            ]
            , "Delta": [
                "Oshimili"
                , "Aniocha"
                , "Aniocha South"
                , "Ika South"
                , "Ika North-East"
                , "Ndokwa West"
                , "Ndokwa East"
                , "Isoko south"
                , "Isoko North"
                , "Bomadi"
                , "Burutu"
                , "Ughelli South"
                , "Ughelli North"
                , "Ethiope West"
                , "Ethiope East"
                , "Sapele"
                , "Okpe"
                , "Warri North"
                , "Warri South"
                , "Uvwie"
                , "Udu"
                , "Warri Central"
                , "Ukwani"
                , "Oshimili North"
                , "Patani"
            ]
            , "Ebonyi": [
                "Edda"
                , "Afikpo"
                , "Onicha"
                , "Ohaozara"
                , "Abakaliki"
                , "Ishielu"
                , "lkwo"
                , "Ezza"
                , "Ezza South"
                , "Ohaukwu"
                , "Ebonyi"
                , "Ivo"
            ]
            , "Enugu": [
                "Enugu South,"
                , "Igbo-Eze South"
                , "Enugu North"
                , "Nkanu"
                , "Udi Agwu"
                , "Oji-River"
                , "Ezeagu"
                , "IgboEze North"
                , "Isi-Uzo"
                , "Nsukka"
                , "Igbo-Ekiti"
                , "Uzo-Uwani"
                , "Enugu Eas"
                , "Aninri"
                , "Nkanu East"
                , "Udenu."
            ]
            , "Edo": [
                "Esan North-East"
                , "Esan Central"
                , "Esan West"
                , "Egor"
                , "Ukpoba"
                , "Central"
                , "Etsako Central"
                , "Igueben"
                , "Oredo"
                , "Ovia SouthWest"
                , "Ovia South-East"
                , "Orhionwon"
                , "Uhunmwonde"
                , "Etsako East"
                , "Esan South-East"
            ]
            , "Ekiti": [
                "Ado"
                , "Ekiti-East"
                , "Ekiti-West"
                , "Emure/Ise/Orun"
                , "Ekiti South-West"
                , "Ikere"
                , "Irepodun"
                , "Ijero,"
                , "Ido/Osi"
                , "Oye"
                , "Ikole"
                , "Moba"
                , "Gbonyin"
                , "Efon"
                , "Ise/Orun"
                , "Ilejemeje."
            ]
            , "FCT": [
                "Abaji"
                , "Abuja Municipal"
                , "Bwari"
                , "Gwagwalada"
                , "Kuje"
                , "Kwali"
            ]
            , "Gombe": [
                "Akko"
                , "Balanga"
                , "Billiri"
                , "Dukku"
                , "Kaltungo"
                , "Kwami"
                , "Shomgom"
                , "Funakaye"
                , "Gombe"
                , "Nafada/Bajoga"
                , "Yamaltu/Delta."
            ]
            , "Imo": [
                "Aboh-Mbaise"
                , "Ahiazu-Mbaise"
                , "Ehime-Mbano"
                , "Ezinihitte"
                , "Ideato North"
                , "Ideato South"
                , "Ihitte/Uboma"
                , "Ikeduru"
                , "Isiala Mbano"
                , "Isu"
                , "Mbaitoli"
                , "Mbaitoli"
                , "Ngor-Okpala"
                , "Njaba"
                , "Nwangele"
                , "Nkwerre"
                , "Obowo"
                , "Oguta"
                , "Ohaji/Egbema"
                , "Okigwe"
                , "Orlu"
                , "Orsu"
                , "Oru East"
                , "Oru West"
                , "Owerri-Municipal"
                , "Owerri North"
                , "Owerri West"
            ]
            , "Jigawa": [
                "Auyo"
                , "Babura"
                , "Birni Kudu"
                , "Biriniwa"
                , "Buji"
                , "Dutse"
                , "Gagarawa"
                , "Garki"
                , "Gumel"
                , "Guri"
                , "Gwaram"
                , "Gwiwa"
                , "Hadejia"
                , "Jahun"
                , "Kafin Hausa"
                , "Kaugama Kazaure"
                , "Kiri Kasamma"
                , "Kiyawa"
                , "Maigatari"
                , "Malam Madori"
                , "Miga"
                , "Ringim"
                , "Roni"
                , "Sule-Tankarkar"
                , "Taura"
                , "Yankwashi"
            ]
            , "Kaduna": [
                "Birni-Gwari"
                , "Chikun"
                , "Giwa"
                , "Igabi"
                , "Ikara"
                , "jaba"
                , "Jema'a"
                , "Kachia"
                , "Kaduna North"
                , "Kaduna South"
                , "Kagarko"
                , "Kajuru"
                , "Kaura"
                , "Kauru"
                , "Kubau"
                , "Kudan"
                , "Lere"
                , "Makarfi"
                , "Sabon-Gari"
                , "Sanga"
                , "Soba"
                , "Zango-Kataf"
                , "Zaria"
            ]
            , "Kano": [
                "Ajingi"
                , "Albasu"
                , "Bagwai"
                , "Bebeji"
                , "Bichi"
                , "Bunkure"
                , "Dala"
                , "Dambatta"
                , "Dawakin Kudu"
                , "Dawakin Tofa"
                , "Doguwa"
                , "Fagge"
                , "Gabasawa"
                , "Garko"
                , "Garum"
                , "Mallam"
                , "Gaya"
                , "Gezawa"
                , "Gwale"
                , "Gwarzo"
                , "Kabo"
                , "Kano Municipal"
                , "Karaye"
                , "Kibiya"
                , "Kiru"
                , "kumbotso"
                , "Ghari"
                , "Kura"
                , "Madobi"
                , "Makoda"
                , "Minjibir"
                , "Nasarawa"
                , "Rano"
                , "Rimin Gado"
                , "Rogo"
                , "Shanono"
                , "Sumaila"
                , "Takali"
                , "Tarauni"
                , "Tofa"
                , "Tsanyawa"
                , "Tudun Wada"
                , "Ungogo"
                , "Warawa"
                , "Wudil"
            ]
            , "Katsina": [
                "Bakori"
                , "Batagarawa"
                , "Batsari"
                , "Baure"
                , "Bindawa"
                , "Charanchi"
                , "Dandume"
                , "Danja"
                , "Dan Musa"
                , "Daura"
                , "Dutsi"
                , "Dutsin-Ma"
                , "Faskari"
                , "Funtua"
                , "Ingawa"
                , "Jibia"
                , "Kafur"
                , "Kaita"
                , "Kankara"
                , "Kankia"
                , "Katsina"
                , "Kurfi"
                , "Kusada"
                , "Mai'Adua"
                , "Malumfashi"
                , "Mani"
                , "Mashi"
                , "Matazuu"
                , "Musawa"
                , "Rimi"
                , "Sabuwa"
                , "Safana"
                , "Sandamu"
                , "Zango"
            ]
            , "Kebbi": [
                "Aleiro"
                , "Arewa-Dandi"
                , "Argungu"
                , "Augie"
                , "Bagudo"
                , "Birnin Kebbi"
                , "Bunza"
                , "Dandi"
                , "Fakai"
                , "Gwandu"
                , "Jega"
                , "Kalgo"
                , "Koko/Besse"
                , "Maiyama"
                , "Ngaski"
                , "Sakaba"
                , "Shanga"
                , "Suru"
                , "Wasagu/Danko"
                , "Yauri"
                , "Zuru"
            ]
            , "Kogi": [
                "Adavi"
                , "Ajaokuta"
                , "Ankpa"
                , "Bassa"
                , "Dekina"
                , "Ibaji"
                , "Idah"
                , "Igalamela-Odolu"
                , "Ijumu"
                , "Kabba/Bunu"
                , "Kogi"
                , "Lokoja"
                , "Mopa-Muro"
                , "Ofu"
                , "Ogori/Mangongo"
                , "Okehi"
                , "Okene"
                , "Olamabolo"
                , "Omala"
                , "Yagba East"
                , "Yagba West"
            ]
            , "Kwara": [
                "Asa"
                , "Baruten"
                , "Edu"
                , "Ekiti"
                , "Ifelodun"
                , "Ilorin East"
                , "Ilorin West"
                , "Irepodun"
                , "Isin"
                , "Kaiama"
                , "Moro"
                , "Offa"
                , "Oke-Ero"
                , "Oyun"
                , "Pategi"
            ]
            , "Lagos": [
                "Agege"
                , "Ajeromi-Ifelodun"
                , "Alimosho"
                , "Amuwo-Odofin"
                , "Apapa"
                , "Badagry"
                , "Epe"
                , "Eti-Osa"
                , "Ibeju/Lekki"
                , "Ifako-Ijaye"
                , "Ikeja"
                , "Ikorodu"
                , "Kosofe"
                , "Lagos Island"
                , "Lagos Mainland"
                , "Mushin"
                , "Ojo"
                , "Oshodi-Isolo"
                , "Shomolu"
                , "Surulere"
            ]
            , "Nasarawa": [
                "Akwanga"
                , "Awe"
                , "Doma"
                , "Karu"
                , "Keana"
                , "Keffi"
                , "Kokona"
                , "Lafia"
                , "Nasarawa"
                , "Nasarawa-Eggon"
                , "Obi"
                , "Toto"
                , "Wamba"
            ]
            , "Niger": [
                "Agaie"
                , "Agwara"
                , "Bida"
                , "Borgu"
                , "Bosso"
                , "Chanchaga"
                , "Edati"
                , "Gbako"
                , "Gurara"
                , "Katcha"
                , "Kontagora"
                , "Lapai"
                , "Lavun"
                , "Magama"
                , "Mariga"
                , "Mashegu"
                , "Mokwa"
                , "Muya"
                , "Pailoro"
                , "Rafi"
                , "Rijau"
                , "Shiroro"
                , "Suleja"
                , "Tafa"
                , "Wushishi"
            ]
            , "Ogun": [
                "Abeokuta North"
                , "Abeokuta South"
                , "Ado-Odo/Ota"
                , "Yewa North"
                , "Yewa South"
                , "Ewekoro"
                , "Ifo"
                , "Ijebu East"
                , "Ijebu North"
                , "Ijebu North East"
                , "Ijebu Ode"
                , "Ikenne"
                , "Imeko-Afon"
                , "Ipokia"
                , "Obafemi-Owode"
                , "Ogun Waterside"
                , "Odeda"
                , "Odogbolu"
                , "Remo North"
                , "Shagamu"
            ]
            , "Ondo": [
                "Akoko North East"
                , "Akoko North West"
                , "Akoko South Akure East"
                , "Akoko South West"
                , "Akure North"
                , "Akure South"
                , "Ese-Odo"
                , "Idanre"
                , "Ifedore"
                , "Ilaje"
                , "Ile-Oluji"
                , "Okeigbo"
                , "Irele"
                , "Odigbo"
                , "Okitipupa"
                , "Ondo East"
                , "Ondo West"
                , "Ose"
                , "Owo"
            ]
            , "Osun": [
                "Aiyedade"
                , "Aiyedire"
                , "Atakumosa East"
                , "Atakumosa West"
                , "Boluwaduro"
                , "Boripe"
                , "Ede North"
                , "Ede South"
                , "Egbedore"
                , "Ejigbo"
                , "Ife Central"
                , "Ife East"
                , "Ife North"
                , "Ife South"
                , "Ifedayo"
                , "Ifelodun"
                , "Ila"
                , "Ilesha East"
                , "Ilesha West"
                , "Irepodun"
                , "Irewole"
                , "Isokan"
                , "Iwo"
                , "Obokun"
                , "Odo-Otin"
                , "Ola-Oluwa"
                , "Olorunda"
                , "Oriade"
                , "Orolu"
                , "Osogbo"
            ]
            , "Oyo": [
                "Afijio"
                , "Akinyele"
                , "Atiba"
                , "Atisbo"
                , "Egbeda"
                , "Ibadan Central"
                , "Ibadan North"
                , "Ibadan North West"
                , "Ibadan South East"
                , "Ibadan South West"
                , "Ibarapa Central"
                , "Ibarapa East"
                , "Ibarapa North"
                , "Ido"
                , "Irepo"
                , "Iseyin"
                , "Itesiwaju"
                , "Iwajowa"
                , "Kajola"
                , "Lagelu Ogbomosho North"
                , "Ogbomosho South"
                , "Ogo Oluwa"
                , "Olorunsogo"
                , "Oluyole"
                , "Ona-Ara"
                , "Orelope"
                , "Ori Ire"
                , "Oyo East"
                , "Oyo West"
                , "Saki East"
                , "Saki West"
                , "Surulere"
            ]
            , "Plateau": [
                "Barikin Ladi"
                , "Bassa"
                , "Bokkos"
                , "Jos East"
                , "Jos North"
                , "Jos South"
                , "Kanam"
                , "Kanke"
                , "Langtang North"
                , "Langtang South"
                , "Mangu"
                , "Mikang"
                , "Pankshin"
                , "Qua'an Pan"
                , "Riyom"
                , "Shendam"
                , "Wase"
            ]
            , "Rivers": [
                "Abua/Odual"
                , "Ahoada East"
                , "Ahoada West"
                , "Akuku Toru"
                , "Andoni"
                , "Asari-Toru"
                , "Bonny"
                , "Degema"
                , "Emohua"
                , "Eleme"
                , "Etche"
                , "Gokana"
                , "Ikwerre"
                , "Khana"
                , "Obio/Akpor"
                , "Ogba/Egbema/Ndoni"
                , "Ogu/Bolo"
                , "Okrika"
                , "Omumma"
                , "Opobo/Nkoro"
                , "Oyigbo"
                , "Port-Harcourt"
                , "Tai"
            ]
            , "Sokoto": [
                "Binji"
                , "Bodinga"
                , "Dange-shnsi"
                , "Gada"
                , "Goronyo"
                , "Gudu"
                , "Gawabawa"
                , "Illela"
                , "Isa"
                , "Kware"
                , "kebbe"
                , "Rabah"
                , "Sabon birni"
                , "Shagari"
                , "Silame"
                , "Sokoto North"
                , "Sokoto South"
                , "Tambuwal"
                , "Tqngaza"
                , "Tureta"
                , "Wamako"
                , "Wurno"
                , "Yabo"
            ]
            , "Taraba": [
                "Ardo-kola"
                , "Bali"
                , "Donga"
                , "Gashaka"
                , "Cassol"
                , "Ibi"
                , "Jalingo"
                , "Karin-Lamido"
                , "Kurmi"
                , "Lau"
                , "Sardauna"
                , "Takum"
                , "Ussa"
                , "Wukari"
                , "Yorro"
                , "Zing"
            ]
            , "Yobe": [
                "Bade"
                , "Bursari"
                , "Damaturu"
                , "Fika"
                , "Fune"
                , "Geidam"
                , "Gujba"
                , "Gulani"
                , "Jakusko"
                , "Karasuwa"
                , "Karawa"
                , "Machina"
                , "Nangere"
                , "Nguru Potiskum"
                , "Tarmua"
                , "Yunusari"
                , "Yusufari"
            ]
            , "Zamfara": [
                "Anka"
                , "Bakura"
                , "Birnin Magaji"
                , "Bukkuyum"
                , "Bungudu"
                , "Gummi"
                , "Gusau"
                , "Kaura"
                , "Namoda"
                , "Maradun"
                , "Maru"
                , "Shinkafi"
                , "Talata Mafara"
                , "Tsafe"
                , "Zurmi"
            ]
        }
        var $select = $('#location');

        $.each(locations, function(state, cities) {
            var $optgroup = $('<optgroup label="' + state + '">');

            $.each(cities, function(index, city) {
                $optgroup.append('<option value="' + city + '">' + city + '</option>');
            });

            $select.append($optgroup);
        });

        $select.select2();

        $('#category, #location').on('change', function() {
            if ($('#category').val() !== '' && $('#location').val() !== '') {
                $('#next-btn-one').removeClass('disabled-link');
            }
        });

        // --> SECOND SECTION
        $('#next-btn-one').on('click', function() {
            $('#first-sec').hide();
            $('#second-sec').show();

            $("#type").select2();
            $("#make").select2();
            $("#condition").select2();
            $("#yom").select2();
        });

    </script>

    @endsection
