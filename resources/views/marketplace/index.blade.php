{{-- @extends('layouts.app') --}}
@extends('layouts.master')

@section('meta')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name='copyright' content='Copyright © 2024 Nigerian Mining. All rights reserved.'>
<meta name="keywords" content="Nigeria mining, mining industry, mining news, mining equipment, classified ads, mining services, minerals, resources, mining opportunities, exploration, mining community, geological insights, mineral extraction, Nigerian mines, drilling equipment, excavation tools, mining machinery">
<meta property="og:title" content="Nigeria Mining Market Place">
<meta property="og:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
<meta property="og:url" content="{{ route('marketplace') }}">
<meta property="og:site_name" content="Nigerian Mining" />
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('user/images/logo.png') }}">
<meta property="og:image:width" content="734" />
<meta property="og:image:height" content="418" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Nigeria Mining Market Place">
<meta name="twitter:description" content="Explore the rich landscape of Nigeria's mining industry and connect with experts. Post and discover ads for mining equipment, services, and opportunities. Your comprehensive platform for everything related to mining in Nigeria.">
<meta name="twitter:image" content="{{ asset('user/images/logo.png') }}">
@endsection

@section('title', 'Market Place')

@section('content')
{{-- FIRST START --}}
<div class="content">
    <section class="section about-section">
        <div class="container">
            <table width="100%">
                <tr>
                    <td style="float: left;"><h1 class="h1 bolder" style="">MARKETPLACE</h1></td>
                    {{-- <td style="float: right;"><a href="{{ url('post-ad') }}" class="btn" style="border: 2px solid #000;">Filter</a></td> --}}
                </tr>
            </table>

            @if (Route::has('login'))
                <div class="hidden">
                    @auth
                        <a href="{{ route('seller.items') }}" class="btn btn-dark">Post Your Ad</a>
                    @else
                        <a href="{{ route('seller.items') }}" class="btn btn-dark">Post Your Ad</a>
                    @endauth
                </div>
            @endif
            <div class="about-image text-center">
                <br>
                <img src="{{ asset('user/images/market-place-1.png') }}" width="960" height="425" alt="nigerian mining">
                <img src="{{ asset('user/images/market-place-2.png') }}" width="960" height="425" alt="nigerian mining">
            </div>
        </div>
    </section>
</div>
{{-- FIRST END --}}

{{-- STYLE START --}}
<style>
    #product-card{
        background-color: #fff;
        border: 2px solid rgba(98, 98, 98, 0.444);
        border-radius: 10px;
        position: relative;
    }
    #product-card #item-type{
        position: absolute;
        top: 2px;
        right: 2px;
        font-size: 18px;
        background-color: #fff;
        z-index: 15;
    }
    #product-card img{
        border-radius: 10px;
    }
    #product-card #product-content{
        padding: 0px 6px;
        text-align: left;
        width: 100%;
    }
    .card-img{
        position: relative;
        text-align: center;
    }
    .card-img #img-content{
        position: absolute;
        bottom: 14px;
        right: 10px;
        /* background-color: #000; */
        background-color: #DC3545;
        color: #fff;
        padding: 1px 6px;
    }
    .card-img #img-content2{
        position: absolute;
        bottom: 14px;
        right: 10px;
        background-color: #000;
        /* background-color: #DC3545; */
        color: #fff;
        padding: 1px 6px;
    }
</style>
{{-- STYLE END --}}

{{-- LISTINGS START --}}
<div>
    <div class="aside-layerout">
        {{-- <section class="section filter-top-head">
            <div class="heading">
                <h1 class="h2">Equipment for sale or hire in Nigeria</h1>
            </div>
        </section> --}}
        <div class="container mt-5">
            <h1 class="mb-4">Equipment for sale or hire in Nigeria</h1>

            <form action="{{ route('marketplace') }}" class="ml-auto mr-auto me-auto ms-auto search-bar" style="width: 90%;" method="GET">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form_control" value="{{ request()->input('search') }}" placeholder="Search items...">
                    </div>
                    {{-- <div class="col-md-5">
                        <select name="category" class="form_control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-danger w-100" style="padding: 12px 16px;">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="content-wrap">
            <aside class="aside-bar">
                <div class="filter-result">
                </div>
                <div class="filter_wrap">
                    <div class="filter-row">
                        <label for="" class="filter-label">
                            Your Selections
                        </label>

                        <div id="my-selected-filters">
                            <div>

                            </div>
                            <div class="filter-row">
                                <label for="" class="filter-label">
                                    Refine Search
                                </label>
                                {{-- <div class="custom-select">
                                    <div class="selected-item">
                                        <div class="form_control">
                                            <span>Category</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="category-list" data-value="track-mounted">Track Mounted</li>
                                            <li class="category-list" data-value="mini-excavator">Mini Excavator</li>
                                            <li class="category-list" data-value="rubber-tyred">Rubber Tyred</li>
                                            <li class="category-list" data-value="other">Other</li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <form action="{{ route('marketplace') }}" method="GET" class="search-filter">
                                    <div class="custom-select">
                                        {{-- <div class="selected-item">
                                            <div class="form_control">
                                                <span>Category</span>
                                            </div>
                                        </div> --}}
                                        <div class="mb-2">
                                            <select name="category_id" id="category" class="form-control">
                                                <option value="" selected>Select Category</option>

                                                <optgroup label="Bulldozers">
                                                    <option value="1" {{ (isset($selectedCategory) && $selectedCategory == 1) ? 'selected' : '' }}>Bulldozers</option>
                                                    <option value="7" {{ (isset($selectedCategory) && $selectedCategory == 7) ? 'selected' : '' }}>Dozer parts</option>
                                                    <option value="8" {{ (isset($selectedCategory) && $selectedCategory == 8) ? 'selected' : '' }}>Crawler and Swamp</option>
                                                    <option value="9" {{ (isset($selectedCategory) && $selectedCategory == 9) ? 'selected' : '' }}>Dismantling</option>
                                                    <option value="10" {{ (isset($selectedCategory) && $selectedCategory == 10) ? 'selected' : '' }}>Wheel</option>
                                                </optgroup>
                                                <optgroup label="Excavators">
                                                    <option value="11" {{ (isset($selectedCategory) && $selectedCategory == 11) ? 'selected' : '' }}>Excavator parts</option>
                                                    <option value="12" {{ (isset($selectedCategory) && $selectedCategory == 12) ? 'selected' : '' }}>Excavators</option>
                                                    <option value="13" {{ (isset($selectedCategory) && $selectedCategory == 13) ? 'selected' : '' }}>Excavator accessories</option>
                                                    <option value="14" {{ (isset($selectedCategory) && $selectedCategory == 14) ? 'selected' : '' }}>Vacuum Excavators</option>
                                                    <option value="15" {{ (isset($selectedCategory) && $selectedCategory == 15) ? 'selected' : '' }}>Dismantling</option>
                                                </optgroup>
                                                <optgroup label="Generators">
                                                    <option value="16" {{ (isset($selectedCategory) && $selectedCategory == 16) ? 'selected' : '' }}>Generators</option>
                                                    <option value="17" {{ (isset($selectedCategory) && $selectedCategory == 17) ? 'selected' : '' }}>Portable Generators</option>
                                                    <option value="18" {{ (isset($selectedCategory) && $selectedCategory == 18) ? 'selected' : '' }}>Mini Generators</option>
                                                    <option value="19" {{ (isset($selectedCategory) && $selectedCategory == 19) ? 'selected' : '' }}>Generator Parts</option>
                                                    <option value="20" {{ (isset($selectedCategory) && $selectedCategory == 20) ? 'selected' : '' }}>Alternators</option>
                                                    <option value="21" {{ (isset($selectedCategory) && $selectedCategory == 21) ? 'selected' : '' }}>Generator Accessories</option>
                                                </optgroup>
                                                <optgroup label="Screening and Crushing">
                                                    <option value="22" {{ (isset($selectedCategory) && $selectedCategory == 22) ? 'selected' : '' }}>Screening and Crushing</option>
                                                    <option value="23" {{ (isset($selectedCategory) && $selectedCategory == 23) ? 'selected' : '' }}>Conveyors</option>
                                                    <option value="24" {{ (isset($selectedCategory) && $selectedCategory == 24) ? 'selected' : '' }}>Screening – Crushing Parts</option>
                                                    <option value="25" {{ (isset($selectedCategory) && $selectedCategory == 25) ? 'selected' : '' }}>Dismantling</option>
                                                </optgroup>
                                                <optgroup label="Compressors">
                                                    <option value="6" {{ (isset($selectedCategory) && $selectedCategory == 6) ? 'selected' : '' }}>Compressors</option>
                                                    <option value="26" {{ (isset($selectedCategory) && $selectedCategory == 26) ? 'selected' : '' }}>Portable Compressors</option>
                                                    <option value="27" {{ (isset($selectedCategory) && $selectedCategory == 27) ? 'selected' : '' }}>Stationary Compressors</option>
                                                    <option value="28" {{ (isset($selectedCategory) && $selectedCategory == 28) ? 'selected' : '' }}>Screw compressors</option>
                                                    <option value="29" {{ (isset($selectedCategory) && $selectedCategory == 29) ? 'selected' : '' }}>Air Receivers</option>
                                                    <option value="30" {{ (isset($selectedCategory) && $selectedCategory == 30) ? 'selected' : '' }}>Compressor attachments</option>
                                                    <option value="31" {{ (isset($selectedCategory) && $selectedCategory == 31) ? 'selected' : '' }}>Compressor parts</option>
                                                </optgroup>
                                                {{-- @foreach ($categories as $category)
                                                    <li>{{ $category->name }}</li>
                                                    @if ($category->subCategories->count() > 0)
                                                        <ul>
                                                            @foreach ($category->subCategories as $subCategory)
                                                                <li>{{ $subCategory->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                @endforeach --}}

                                                {{-- @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach --}}
                                                {{-- <option value="Track Mounted">Track Mounted</option>
                                                <option value="Mini Excavator">Mini Excavator</option>
                                                <option value="Rubber Tyred">Rubber Tyred</option> --}}
                                            </select>
                                        </div>

                                        <!-- Type Filter -->
                                        <div class="mb-2">
                                            <select name="item_type" class="form-control">
                                                <option value="">Classified Types</option>
                                                <option value="for_hire" {{ request()->input('item_type') == 'for_hire' ? 'selected' : '' }}>For Hire</option>
                                                <option value="for_sale" {{ request()->input('item_type') == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                                            </select>
                                        </div>

                                        <!-- Make Filter -->
                                        <div class="mb-2">
                                            <select name="make" class="form-control">
                                                <option value="">Make</option>
                                                <option value="Caterpillar" {{ request()->input('make') == 'Caterpillar' ? 'selected' : '' }}>Caterpillar</option>
                                                <option value="Mantrac" {{ request()->input('make') == 'Mantrac' ? 'selected' : '' }}>Mantrac</option>
                                                <option value="Komatsu" {{ request()->input('make') == 'Komatsu' ? 'selected' : '' }}>Komatsu</option>
                                                <option value="Sumitomo" {{ request()->input('make') == 'Sumitomo' ? 'selected' : '' }}>Sumitomo</option>
                                                <option value="Kobelco" {{ request()->input('make') == 'Kobelco' ? 'selected' : '' }}>Kobelco</option>
                                                <option value="Hitachi" {{ request()->input('make') == 'Hitachi' ? 'selected' : '' }}>Hitachi</option>
                                                <option value="XCMG" {{ request()->input('make') == 'XCMG' ? 'selected' : '' }}>XCMG</option>
                                                <option value="Volvo" {{ request()->input('make') == 'Volvo' ? 'selected' : '' }}>Volvo</option>
                                                <option value="Doosan" {{ request()->input('make') == 'Doosan' ? 'selected' : '' }}>Doosan</option>
                                                <option value="Hidromek" {{ request()->input('make') == 'Hidromek' ? 'selected' : '' }}>Hidromek</option>
                                                <option value="Yanmar" {{ request()->input('make') == 'Yanmar' ? 'selected' : '' }}>Yanmar</option>
                                                <option value="Hyundai" {{ request()->input('make') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                                                <option value="Lovol" {{ request()->input('make') == 'Lovol' ? 'selected' : '' }}>Lovol</option>
                                                <option value="Wacker Neusen" {{ request()->input('make') == 'Wacker Neusen' ? 'selected' : '' }}>Wacker Neusen</option>
                                                <option value="Case" {{ request()->input('make') == 'Case' ? 'selected' : '' }}>Case</option>
                                                <option value="Trident" {{ request()->input('make') == 'Trident' ? 'selected' : '' }}>Trident</option>
                                                <option value="JCB" {{ request()->input('make') == 'JCB' ? 'selected' : '' }}>JCB</option>
                                                <option value="Airman" {{ request()->input('make') == 'Airman' ? 'selected' : '' }}>Airman</option>
                                                <option value="Shantui" {{ request()->input('make') == 'Shantui' ? 'selected' : '' }}>Shantui</option>
                                                <option value="Kubota" {{ request()->input('make') == 'Kubota' ? 'selected' : '' }}>Kubota</option>
                                                <option value="Liebherr" {{ request()->input('make') == 'Liebherr' ? 'selected' : '' }}>Liebherr</option>
                                                <option value="Takeuchi" {{ request()->input('make') == 'Takeuchi' ? 'selected' : '' }}>Takeuchi</option>
                                                <option value="Yuchai" {{ request()->input('make') == 'Yuchai' ? 'selected' : '' }}>Yuchai</option>
                                                <option value="Bobcat" {{ request()->input('make') == 'Bobcat' ? 'selected' : '' }}>Bobcat</option>
                                                <option value="Sany" {{ request()->input('make') == 'Sany' ? 'selected' : '' }}>Sany</option>
                                                <option value="Uhi" {{ request()->input('make') == 'Uhi' ? 'selected' : '' }}>Uhi</option>
                                                <option value="Cobra Equipment" {{ request()->input('make') == 'Cobra Equipment' ? 'selected' : '' }}>Cobra Equipment</option>
                                                <option value="Daewoo" {{ request()->input('make') == 'Daewoo' ? 'selected' : '' }}>Daewoo</option>
                                                <option value="ECM" {{ request()->input('make') == 'ECM' ? 'selected' : '' }}>ECM</option>
                                                <option value="Hydrema" {{ request()->input('make') == 'Hydrema' ? 'selected' : '' }}>Hydrema</option>
                                                <option value="John Deere" {{ request()->input('make') == 'John Deere' ? 'selected' : '' }}>John Deere</option>
                                                <option value="Kato" {{ request()->input('make') == 'Kato' ? 'selected' : '' }}>Kato</option>
                                                <option value="Liugong" {{ request()->input('make') == 'Liugong' ? 'selected' : '' }}>Liugong</option>
                                                <option value="Rippa" {{ request()->input('make') == 'Rippa' ? 'selected' : '' }}>Rippa</option>
                                                <option value="Samsung" {{ request()->input('make') == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                                                <option value="Sunward" {{ request()->input('make') == 'Sunward' ? 'selected' : '' }}>Sunward</option>
                                                <option value="Terex" {{ request()->input('make') == 'Terex' ? 'selected' : '' }}>Terex</option>
                                                <option value="XGMA" {{ request()->input('make') == 'XGMA' ? 'selected' : '' }}>XGMA</option>
                                                <option value="Zoomlion" {{ request()->input('make') == 'Zoomlion' ? 'selected' : '' }}>Zoomlion</option>
                                            </select>
                                        </div>

                                        <!-- Condition Filter -->
                                        <div class="mb-2">
                                            <select name="condition" class="form-control">
                                                <option value="">Any Condition</option>
                                                <option value="new" {{ request()->input('condition') == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="foreign_used" {{ request()->input('condition') == 'foreign_used' ? 'selected' : '' }}>Foreign Used</option>
                                                <option value="nigerian_used" {{ request()->input('condition') == 'nigerian_used' ? 'selected' : '' }}>Nigerian Used</option>
                                            </select>
                                        </div>

                                        <!-- Make Filter (Manufacturer) -->
                                        {{-- <div class="mb-2">
                                            <input type="text" name="make" placeholder="Make" class="form_control" value="{{ request()->input('make') }}">
                                        </div> --}}

                                        <!-- Region Filter -->
                                        <div class="mb-2">
                                            <select name="region" id="location" class="form-control">
                                                <option value="">All Regions</option>
                                            </select>
                                        </div>

                                        <!-- Year of Manufacture Filter -->
                                        <div class="mb-2">
                                            <select name="year" id="yom" class="form-control">
                                                <option value="">Year of Manufacture</option>
                                                <?php
                                                for ($year = 1970; $year <= 2024; $year++) {
                                                    echo "<option value=\"$year\">$year</option>";
                                                }
                                                ?>
                                            </select>
                                            {{-- <input type="number" name="year" placeholder="" value="{{ request()->input('year') }}"> --}}
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <input type="number" name="min_price" value="{{ request()->input('min_price') }}" class="form-control" placeholder="Min Price">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" name="max_price" value="{{ request()->input('max_price') }}" class="form-control" placeholder="Max Price">
                                            </div>
                                        </div>

                                        <div class="filter-btn-wrap pt-3">
                                            <button type="submit" class="btn btn-dark" id="search-listings">Search listings</button>
                                        </div>
                                        {{-- <button type="submit" class="btn btn-danger w-100" style="padding: 12px 16px;">Filter</button> --}}
                                    </div>
                                </form>
                            </div>
                            <br><br>
                            <br><br>
                            <div class="filter-btn-wrap">
                                {{-- <button class="btn btn-dark" id="search-listings">Search listings</button> --}}
                            </div>
                        </div>
            </aside>
            <div class="left-content">
                <div class="sort-by">
                    <strong></strong>
                    {{-- <div class="input_wrap">
                        <select name="" class="form_control" id="">
                            <option value="">Premium Ads</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                    </div> --}}

                    <div class="">
                    </div>
                    {{-- <div class="thum-icons">
                    </div> --}}
                </div>

                <section class="section market-place-filter">
                    <div class="container">
                        @if ($items->isNotEmpty())
                        <div class="card-wrap" id="market-place-listing-sec">
                            @foreach($items as $item)
                            <div class="product-card" id="product-card">
                                <div id="item-type" class="px-2">
                                    <span class="badge badge-danger text-dark">{{ ucfirst(str_replace('_', ' ', $item->item_type)) }}</span>
                                </div>
                                {{-- <a href="{{ route('item.view', $item->id) }}" data-item-id="{{ $item->id }}" class="track-click link-dark" style="text-decoration: none;"> --}}
                                <form action="{{ route('item.view', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="border: none; background: none; padding: 10px;">
                                <div class="card-img" style="">
                                    {{-- @if ($item->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $item->images->first()->path) }}" alt="{{ $item->name }}" width="100">
                                    @endif --}}
                                    {{-- @if ($item->images && $item->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $item->images->first()->path) }}" alt="{{ $item->name }}" width="100">
                                    @else --}}
                                    {{-- <img src="{{ Storage::url($item->images[0]) }}" alt="{{ $item->name }}"> --}}
                                    <img src="{{ asset('storage/images/product-4.jpg') }}" alt="{{ $item->name }}" style="">

                                    @if($item->user && $item->user->subscriptions()->where('status', 'active')->where('expires_at', '>', now())->exists())
                                        <div id="img-content">
                                            <i class="fa-regular fa-image"></i>
                                            <span>{{ $imageCount ?? 8 }}</span>
                                                    <!-- Show badge if user has an active subscription -->
                                                <span class="badge badge-danger">Premium Seller</span>
                                        </div>
                                    @else
                                        <div id="img-content2">
                                            <i class="fa-regular fa-image"></i>
                                            <span>{{ $imageCount ?? 8 }}</span>
                                                    <!-- Show badge if user has an active subscription -->
                                                {{-- <span class="badge badge-danger">Premium Seller</span> --}}
                                        </div>
                                    {{-- <span class="badge badge-dark">Premium Seller</span> --}}
                                    @endif
                                </div>
                                <div class="card-description" id="product-content">
                                    <div>
                                        <strong class="crd-title">{{ $item->name }}</strong>
                                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                                        {{-- <span class="crd-title" style="font-size: 14px; font-weight: 500;">{{ $ad->slug }}</span> --}}
                                    </div>
                                    <div class="card-footer">
                                        <div href="" class="location" style="font-size: 12px;">{{ ucfirst(str_replace('_', ' ', $item->condition)) }}</div>
                                        <div href="" class="location" style="font-size: 12px;">{{ $item->category->name }}</div>

                                        {{-- <div href="" class="location" style="font-size: 12px;"><i class="fa fa-location-dot" style="margin-right: 1px;"></i>{{ $ad->location }}, Nigeria</div> --}}
                                        {{-- <a href="{{ route('marketPlaceDetail', ['slug' => $ad->slug]) }}"
                                            class="btn btn-dark">View
                                        </a> --}}
                                    </div>
                                    {{-- <div id="card-footer2" style="display: none">
                                        <div href="" class="location" style="font-size: 12px;">{{ $ad->year_of_manufacture }}</div>
                                        <div href="" class="location" style="font-size: 12px;"><i class="fa fa-location-dot" style="margin-right: 1px;"></i>{{ $ad->location }}, Nigeria</div>
                                    </div> --}}
                                    <div style="margin-top: 1rem;">
                                        <strong class="crd-price" style="font-size: 16px;">{{ $item->price }}</strong>
                                    </div>
                                </div>
                                    </button>
                                    </form>
                                {{-- </a> --}}
                            </div>
                            @endforeach
                        </div>
                        {{-- {{ $items->links() }} --}}

                        @else
                            <div>
                                <p>No items available.</p>
                            </div>
                        @endif
                    </div>
                </section>



                {{-- Pagination --}}
                <div class="pagination">
                    {{ $items->links('pagination::bootstrap-4') }}
                </div>
                {{-- Pagination --}}

            </div>
        </div>
    </div>
</div>
{{-- LISTINGS END --}}
@endsection



{{-- JAVASCRIPT --}}
@section('scripts')
<script>
    // Store the scroll position before form submit
    document.querySelector('form.search-bar').addEventListener('submit', function () {
        localStorage.setItem('scrollPosition', window.scrollY);
    });
    document.querySelector('form.search-filter').addEventListener('submit', function () {
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // After the page reloads, scroll to the stored position
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
            localStorage.removeItem('scrollPosition');  // Clean up after use
        }
    });
</script>

<script>
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
</script>

@endsection
