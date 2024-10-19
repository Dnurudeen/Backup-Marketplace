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
    <meta property="og:url" content="{{ route('item.view', ['slug' => $item->slug]) }}">
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


@section('content')
<div class="content">
    <section class="section slider-section">
        <div class="container pro-detail-section">
            {{-- <div class="search-wrap">
                <input type="text" class="form_control" placeholder="Search for an item">
                <button class=" btn btn-search">Search</button>
            </div> --}}
            <div class="heading">
                <h1 class="h4">{{ $item->name }}</h1>
            </div>
            <div class="heading">
                <h2 class="h4">Price: {{ $item->price }}</h2>
                {{-- <a href="" class="report-link">Report</a> --}}
            </div>
        </div>

        {{-- imgs slide --}}
        @php
            $combinedFileNames = $item->images;
            $imageArray = explode(',', $combinedFileNames);
        @endphp
        <div class="container">
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mp2">
                <div class="swiper-wrapper">


                @foreach ($imageArray as $image)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($image->image_path) }}" width="" height="" />
                    </div>
                @endforeach
                </div>
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
            </div>
            <div thumbsSlider="" class="swiper mp">
                <div class="swiper-wrapper">

                    @foreach ($imageArray as $image)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($image->image_path) }}" width="" height="" />
                    </div>
                @endforeach
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
                    <li>
                        <strong class="label">Make</strong>
                        <span class="descrip">{{ $ad->make }}</span>
                    </li>
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
                        <span class="descrip">{{ $item->item_type }}</span>
                    </li>
                    <li>
                        <strong class="label">Year Of Manufacture</strong>
                        <span class="descrip">{{ $item->manufaction_year }}</span>
                    </li>
                     <li>
                        <strong class="label">Condition</strong>
                        <span class="descrip">{{ $item->condition }}</span>
                    </li>
                    <li>
                        <strong class="label">Category</strong>
                        <span class="descrip">{{ $item->category_id }}</span>
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
                <p>{{ $ad->description }}</p>
            </div>
            @if($ad->youtube_link)
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
        <div class="container">
            @if (count($relatedAds) > 0)
                <div class="related-article">
                    <div class="heading">
                        <h1 class="h4">Related Listings</h1>
                        <a href="{{ route('marketPlace') }}" class="report-link">See More</a>
                    </div>
                    <div class="card-wrap">
                        {{-- Related Ads --}}
                        @forelse ($relatedAds as $item )
                            <div class="product-card">
                                <div class="card-img">
                                @php
                                    $combinedFileNames = $item->images;
                                    $imageArray = explode(',', $combinedFileNames);
                                @endphp
                                <img
                                        src="{{ asset('storage/' . $imageArray[0]) }}"
                                        alt="nigerian mining">
                                </div>
                                <div class="card-description">
                                    <strong class="crd-title">{{ $item->title }}</strong>
                                    <strong class="crd-price">{{ $item->price }}</strong>
                                </div>
                                <div class="card-footer">
                                    <span href=""
                                        class="location">{{ $item->location }}, Nigeria</span>
                                    <a href="{{ route('item.view', ['slug' => $item->slug]) }}"
                                        class="btn btn-dark">View </a>
                                </div>
                            </div>
                        @endforeach
                        {{-- Related Ads --}}
                    </div>
                </div>
                <span class="divider"></span>
                @endif @if (count($dealers_ads) > 0)
                    <div class="related-article">
                        <div class="heading">
                            <h1 class="h4">Dealer Other Listings</h1>
                            {{-- <a href="" class="report-link">See More</a> --}}
                        </div>
                        <div class="card-wrap">
                            {{-- Dealers other ads --}}
                            @foreach ($dealers_ads as $item)
                                <div class="product-card">
                                    <div class="card-img">
                                        @php
                                        $combinedFileNames = $item->images;
                                        $imageArray = explode(',', $combinedFileNames);
                                        @endphp
                                        <img src="{{ asset('storage/marketplace/' . $imageArray[0]) }}" alt="nigerian mining">
                                    </div>
                                    <div class="card-description">
                                        <strong class="crd-title">{{ $item->name }}</strong>
                                        <strong class="crd-price">{{ $item->price }}</strong>
                                    </div>
                                    <div class="card-footer">
                                        <span href=""
                                            class="location">{{ $item->location }}, Nigeria</span>
                                        <a href="{{ route('marketPlaceDetail', ['slug' => $item->slug]) }}"
                                            class="btn btn-dark">View </a>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Dealers other ads --}}
                        </div>
                    </div>
                @endif
        </div>
    </section>
</div>

{{-- END --}}

<div class="container mt-5">
    <!-- Display Images -->
    @if ($item->images && is_array($item->images))
            <div class="item-images">
                    @foreach ($item->images as $image)
                            <img src="{{ Storage::url($image->image_path) }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
                    @endforeach
            </div>
        @else
            <p>No images available for this item.</p>
        @endif
    {{-- @if ($item->images && is_array($item->images))
        <div class="item-images">
            @foreach ($item->images as $image)
                <img src="{{ asset('storage/' . $image) }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
            @endforeach
        </div>
    @endif --}}

    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <p>Price: {{ $item->price }}</p>
    <p>Condition: {{ $item->condition }}</p>
    <p>Category: {{ $item->category->name }}</p>
    <p>Seller: {{ $item->seller->name }}</p>
    {{-- <a href="tel:{{ $item->seller->phone }}" class="btn btn-success">Call Seller</a> --}}

    @if ($item->youtube_link)
        <div class="youtube-video">
            <h3>Video</h3>
            <iframe width="560" height="315" src="{{ $item->youtube_link }}" frameborder="0" allowfullscreen></iframe>
        </div>
    @endif

    <a href="tel:{{$item->seller->phone}}" class="btn btn-success">Call Seller</a>
    <a href="{{ route('marketplace') }}" class="btn btn-secondary">Back to Marketplace</a>
</div>
@endsection
