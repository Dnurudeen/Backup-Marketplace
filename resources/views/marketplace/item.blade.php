@extends('layouts.master')

@php
    $combinedFileNames = $item->images;
    $imageArray = explode(',', $combinedFileNames);
@endphp

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='copyright' content='Copyright © 2024 Nigerian Mining. All rights reserved.'>
    <meta name="keywords" content="Nigeria mining, mining industry, mining news, mining equipment, classified ads, mining services, minerals, resources, mining opportunities, exploration, mining community, geological insights, mineral extraction, Nigerian mines, drilling equipment, excavation tools, mining machinery">
    <meta property="og:title" content="{{ $item->name }}">
    <meta name="og:description" content="{{ $item->description }}">
    <meta property="og:url" content="{{ url('/item/{id}', ['slug' => $item->name]) }}">
    <meta property="og:site_name" content="Nigerian Mining" />
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/marketplace/' . $imageArray[0]) }}">
    <meta property="og:image:width" content="734" />
    <meta property="og:image:height" content="418" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $item->name }}">
    <meta name="twitter:description" content="{{ $item->description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $imageArray[0]) }}">
@endsection

@section('title', 'Item Detail')

<style>
    .cont {
        margin: 0;
        /* width: 100px; */
        color: #f2faf7;
        cursor: default;
        /* justify-content: center; */
        margin-top: -8px;
        text-align: center;
        height: 40px;
        line-height: 50px;
        background: #333;
        transition: all .7s;
        &.hidden {
            height: 0;
            transition: all .7s;
        }
    }
</style>


@section('content')
<div class="content w-75 me-auto mx-auto my-auto ms-auto">
    <section class="section slider-section">
        <div class="container pro-detail-section">
            {{-- <div class="search-wrap">
                <input type="text" class="form_control" placeholder="Search for an item">
                <button class=" btn btn-search">Search</button>
            </div> --}}
            <div class="d-flex justify-content-between">
                <div>
                    <div class="heading">
                        <h1 class="h4">{{ $item->name }}</h1>
                    </div>
                    <div class="heading">
                        <h2 class="h4">Price: {{ $item->price }}</h2>
                        {{-- <a href="" class="report-link">Report</a> --}}
                    </div>
                </div>
                <div class="">
                    {{-- @if(auth()->check()) --}}
                    <button onclick="funcToggle()" class="btn btn-danger"><i class="fa fa-eye"></i> View Seller Contact</button>
                    <div class="center">
                        <p class="cont hidden">{{ $item->user->phone }}</p>
                    </div>
                    {{-- @else --}}
                        {{-- <p class="">Please <a href="{{ route('login') }}" class="text-danger">log in</a> to contact the seller.</p> --}}
                    {{-- @endif --}}
                </div>
            </div>
        </div>

        {{-- imgs slide --}}
        @php
            $combinedFileNames = $item->images;
            $imageArray = explode(',', $combinedFileNames);
        @endphp

        <div class="container">
            <div class="">
                <div class="" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mp2">
                    <div class="swiper-wrapper">


                    @foreach ($imageArray as $image)
                        <div class="swiper-slide">
                            {{-- <img src="{{ 'storage/images/product-4.jpg' . $image }}" width="" height="" /> --}}

                            <img src="{{ asset('storage/images/product-4.jpg') . $image }}" width="" height="" style="height: 450px;" />
                        </div>
                    @endforeach
                    </div>
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                </div><br>
                <div thumbsSlider="" class="swiper mp">
                    <div class="swiper-wrapper">

                        @foreach ($imageArray as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/images/product-4.jpg') . $image }}" width="" height="" />
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="category-wrap">
                <ul class="cate-list">
                    <li>
                        <strong class="label">Title</strong>
                        <span class="descrip">{{ $item->name }}</span>
                    </li>
                    {{-- <li>
                        <strong class="label">Make</strong>
                        <span class="descrip">{{ $ad->make }}</span>
                    </li> --}}
                    <li>
                        <strong class="label">Model</strong>
                        <span class="descrip">{{ $item->model}}</span>
                    </li>
                    <li>
                        <strong class="label">Price</strong>
                        <span class="descrip">{{ $item->price }}</span>
                    </li>
                    <li>
                        <strong class="label">Type</strong>
                        <span class="descrip">{{ ucfirst(str_replace('_', ' ', $item->item_type)) }}</span>
                    </li>
                    <li>
                        <strong class="label">Year Of Manufacture</strong>
                        <span class="descrip">{{ $item->manufaction_year }}</span>
                    </li>
                    <li>
                        <strong class="label">Make</strong>
                        <span class="descrip">{{ $item->make }}</span>
                    </li>
                     <li>
                        <strong class="label">Condition</strong>
                        <span class="descrip">{{ ucfirst(str_replace('_', ' ', $item->condition)) }}</span>
                    </li>
                    <li>
                        <strong class="label">Category</strong>
                        <span class="descrip">{{ $item->category->name }}</span>
                    </li>
                    <li>
                        <strong class="label">Exchange Possible</strong>
                        <span class="descrip">{{ $item->exchange_possible }}</span>
                    </li>
                    <li>
                        <strong class="label">Location</strong>
                        <span class="descrip">{{ $item->location }}, Nigeria</span>
                    </li>
                </ul>
            </div>
            <div class="pro-text-wrap">
                <strong>Description</strong>
                <p>{{ $item->description }}</p>
            </div>
            @if($item->youtube_link)
                <div style="text-align: center;">
                    <iframe width="560" height="315" src="{{$item->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
            <div class="contact-list">
                <strong>Contact Seller</strong>
                <span class="name">Name: {{ $item->user->name }}</span>
                @if (isset($item->user->phone))
                    <span class="phone">Phone: {{ $item->user->phone }}</span>
                @endif
            </div>
            {{-- <div class="contact-form">
                <h4 class="h4">Contact Advertiser</h4>
                <form action="{{ url('send-enquiry') }}" class="form" id="enquiryForm"> @csrf <input type="hidden"
                        class="form_control" name="ad_id" value="{{ $ad->id }}">
                    <div class="form-wrap form">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form_control" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form_control" placeholder="Email" name="email_address">
                            </div>
                            <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" class="form_control" placeholder="Subject" name="subject">
                            </div>
                            <button type="submit" class="btn btn-dark btn-submit">Send Enquiry</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form_control" cols="30" rows="10" placeholder="Description" name="description"></textarea>
                            </div>
                            <ul class="unstyled centered">
                                <li>
                                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox"
                                        name="is_sold">
                                    <label for="styled-checkbox-1">Has this been sold?</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox"
                                        name="can_view">
                                    <label for="styled-checkbox-2">Can I arrange for a viewing?</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div> --}}
            <span class="divider"></span>
        </div>
    </section>
    <section class="section ">
        {{-- <div class="container">
            @if (count($relatedAds) > 0)
                <div class="related-article">
                    <div class="heading">
                        <h1 class="h4">Related Listings</h1>
                        <a href="{{ route('marketplace') }}" class="report-link">See More</a>
                    </div>
                    <div class="card-wrap">

                        @forelse ($relatedAds as $item )
                            <div class="product-card">
                                <div class="card-img">
                                @php
                                    $combinedFileNames = $item->images;
                                    $imageArray = explode(',', $combinedFileNames);
                                @endphp
                                <img
                                        src="{{ asset('storage/images/product-4.jpg') . $imageArray[0] }}"
                                        alt="nigerian mining">
                                </div>
                                <div class="card-description">
                                    <strong class="crd-title">{{ $item->title }}</strong>
                                    <strong class="crd-price">{{ $item->price }}</strong>
                                </div>
                                <div class="card-footer">
                                    <span href=""
                                        class="location">{{ $item->location }}, Nigeria</span>
                                    <a href="{{ url('/item/{id}', ['slug' => $item->name]) }}"
                                        class="btn btn-dark">View </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <span class="divider"></span>
                @endif @if (count($dealers_ads) > 0)
                    <div class="related-article">
                        <div class="heading">
                            <h1 class="h4">Dealer Other Listings</h1> --}}
                            {{-- <a href="" class="report-link">See More</a> --}}
                        {{--</div>
                        <div class="card-wrap">
                            {{-- Dealers other ads --}}
                            {{--@foreach ($dealers_ads as $item)
                                <div class="product-card">
                                    <div class="card-img">
                                        @php
                                        $combinedFileNames = $item->images;
                                        $imageArray = explode(',', $combinedFileNames);
                                        @endphp
                                        {{-- <img src="{{ asset('storage/images/product-4.jpg' . $imageArray[0]) }}" alt="nigerian mining"> --}}
                                        {{--<img src="{{ asset('storage/images/product-4.jpg') }}" alt="nigerian mining">
                                    </div>
                                    <div class="card-description">
                                        <strong class="crd-title">{{ $item->name }}</strong>
                                        <strong class="crd-price">{{ $item->price }}</strong>
                                    </div>
                                    <div class="card-footer">
                                        <span href=""
                                            class="location">{{ $item->location }}, Nigeria</span>
                                        <a href="{{ route('item.view', $item->id) }}"
                                            class="btn btn-dark">View </a>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Dealers other ads --}}
                       {{-- </div>
                    </div>
                @endif
        </div> --}}
    </section>
</div>

{{-- END --}}

{{-- <div class="container mt-5">
    @if ($item->images && is_array($item->images))
            <div class="item-images">
                    @foreach ($item->images as $image)
                            <img src="{{ Storage::url($image->image_path) }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
                    @endforeach
            </div>
        @else
            <p>No images available for this item.</p>
        @endif

    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <p>Price: {{ $item->price }}</p>
    <p>Condition: {{ $item->condition }}</p>
    <p>Category: {{ $item->category->name }}</p>
    <p>Seller: {{ $item->seller->name }}</p>

    @if ($item->youtube_link)
        <div class="youtube-video">
            <h3>Video</h3>
            <iframe width="560" height="315" src="{{ $item->youtube_link }}" frameborder="0" allowfullscreen></iframe>
        </div>
    @endif

    <a href="tel:{{$item->seller->phone}}" class="btn btn-success">Call Seller</a>
    <a href="{{ route('marketplace') }}" class="btn btn-secondary">Back to Marketplace</a>
</div> --}}
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function funcToggle() {
        $(".cont").toggleClass('hidden');
    };
</script>
<script>
    $('#enquiryForm').submit(function(e) {
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
                Swal.fire('Thanks For Your Enquiry', 'Seller will get back to you soon', 'success');
                $('#enquiryForm').trigger("reset");
            },
            error: function(data, textStatus, xhr) {
                Swal.fire(data.responseJSON.msg, '', 'danger');
                console.log('Error:', data);
                console.log('Error:', textStatus);
                console.log('Error:', xhr);
            }
        });
    });
</script>

<script>
    var swiper = new Swiper(".mp", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mp2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>

@endsection
