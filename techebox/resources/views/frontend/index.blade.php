@extends('frontend.layouts.app')

@section('content')
    {{-- Categories , Sliders . Today's deal --}}
    <div class="aiz-main-wrapper d-flex flex-column">
        @php
            $message = $business_settings ->where('type', 'home_settings_welcome_message')->first()->value
        @endphp

        {{-- <p>{{json_encode(json_decode($business_settings ->where('type', 'home_settings_welcome_message_background')->first()->value)) }}</p> --}}
    <div class="game-zone-1">
        <div class="fluid-container">
            <h5 class="text-center fs-17 pt-1 text-color-white zone-text">{{$message}}</h5>
        </div>
    </div>

    {{-- main home slider --}}
    @if($business_settings->where('type','home_slider_pub')->first()->value == 1)
    <div class="home-banner-area  margin-bottem-10">


        <div class="fluid-container">
            <div class="row gutters-10 position-relative">


                <div class=" col-lg-12 ">
                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true"
                        data-autoplay="true" data-infinite="true" >

                         @foreach(json_decode($home_sliders[0]->value) as $img)
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm  "
                                src="{{uploaded_asset($img) }}"  alt="Responsive image" height="315">
                        </div>
                        @endforeach


                    </div>

                </div>



            </div>
        </div>
    </div>

@endif


    {{-- on day delivery icons section --}}

    <section class="mb-4 ">

        <div class="container">
            @if($business_settings->where('type','section2')->first()->value == 1)
                <div class="delivery">
                    <div class="row bg-pure-white left-br-7 right-br-7">
                        @foreach (\App\Models\SiteFeature::where('position', 1)->where('published', 1)->get() as $key => $site_feature)

                            <div class=" mb-3 col-6  top_border text-center col-lg-{{ 12/count(\App\Models\SiteFeature::where('position', 1)->where('published', 1)->get()) }}">
                            <div class="delivery_item text-center">
                                <i class="fas fa-shipping-fast truck_icon fs-24 align-items-center mt-4 text-color-orange"></i>
                                <span class="">{{$site_feature->title}}</span>

                            </div>
                        </div>

                        @endforeach


                    </div>
            @endif



            @if($business_settings->where('type','section3')->first()->value == 1)
                <div class="bottom-delivery">

                    <div class="bottom_itam col-auto">
                        <div class="row ">


                            <div class="col-12 col-md-12 product_text">
                                <span class="time-icon"><img src="public/assets/img/watch.png" /></span>
                                <span class="bottom-text-first">ON DAY DELIVERY TIME LEFT - </span>
                                <span class="botton-text-second" id="demo"> </span>
                            </div>



                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>




    @if($flash_deal->status == 1 && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <div style="background-color:{{ $flash_deal->background_color }}">
        <section class="text-center mb-5">
            <img
                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ uploaded_asset($flash_deal->banner) }}"
                alt="{{ $flash_deal->title }}"
                class="img-fit w-100 lazyload"
            >
        </section>
        <section class="mb-4">
            <div class="container">
                <div class="text-center my-4 text-{{ $flash_deal->text_color }}">
                    <h1 class="h2 fw-600">{{ $flash_deal->title }}</h1>
                    <div class="aiz-count-down aiz-count-down-lg ml-3 align-items-center justify-content-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                </div>
                <div class="row gutters-5 row-cols-xxl-6 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                        @php
                            $product = \App\Models\Product::find($flash_deal_product->product_id);
                        @endphp
                        @if (isset($product) && $product->published != 0)
                            <div class="col mb-2">
                                @include('frontend.partials.product_box_1',['product' => $product])
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </div>


    @endif


    {{-- Category slider --}}



    <section class="mb-4 ">
        <div class="container  p-0">

                <div class="section145">
                    <div class="container bg-white border-radious-14 category-carousel">
                        <div class="row ">

                            <div class="col-md-12 ">
                                <div  class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>

                                @foreach($featured_categories as $category)
                                    <div class="item border-right" style="border-color:#e2e5ec;">
                                        <a href="{{route('products.category',$category->slug)}}" class="category-item " style="margin-top: 20px">
                                            <div class="cate-img" >
                                                <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="{{uploaded_asset($category->logo)}}" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat ">{{$category->name}}</span>

                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


        </div>

    </section>

    {{-- Todays Top Deal --}}
    <section class="mb-4">
        <div class="container">

            <div class=" slider-padding bg-white   border-radious-7">

                <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="mediya-h4"> <span class=" pb-3 fw-700">TODAY'S TOP DEAL </span>
                                    <i class="fas fa-clock watch-icon" aria-hidden="true" style="margin-right:7px"></i>
                                    <span class="timing"></span> <a href=""
                                        class="ml-auto mr-0 btn btn-warning btn-xs shadow-md w-100 w-md-auto bg-color-orrange "><span
                                            class="text-color-white"> 405 Days : 8 Hourse : 55 Mins : 32 Sec</span></a>
                                    <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                                </h4>

                            </div>

                        </div>


                    </h3>



                    <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
                </div>




                <div class="aiz-carousel gutters-10 half-outside-arrow " data-items="6" data-xl-items="6"
                    data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
                    data-infinite='true'>

                    @foreach($todays_deal_products as $product)
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition ">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px"
                                        src="{{uploaded_asset($product->thumbnail_img)}}">
                                </a>
                                {{-- <div class="absolute-top-left pt-2 pl-2 pb-2 badge-off">
                                    <span class="badge badge-inline c-badge-pill badge-success ">{{$product->discount}}% OFF</span>
                                </div> --}}
                                <span class="badge-custom">{{ translate('OFF') }}<span class="box ml-1 mr-0">&nbsp;{{discount_in_percentage($product)}}%</span></span>
                                {{-- <div class="absolute-top-left pt-2 pl-2 pb-0 badge-off" style="margin-top: 70px;">
                                    <span class="badge badge-inline  badge-warning d-block"><i
                                            class="fas fa-shipping-fast ml-1"></i> </span>
                                    <span class="badge badge-inline  badge-warning d-block"><i
                                            class="fas fa-box-open ml-1"></i></span>
                                </div> --}}
                                <div class="absolute-top-left" style="margin-top: 70px;">
                                    <div class="bg-warning">
                                    <span class="badge  d-block"><i
                                        class="fas fa-shipping-fast "></i></span>
                                        <span class="badge d-block"><i
                                            class="fas fa-box-open"></i></span>
                                        </div>
                                </div>

                                <div class="absolute-top-right aiz-p-hov-icon">
                                    <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist"
                                        data-placement="left">
                                        <i class="la la-heart-o "></i>
                                    </a>
                                    <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare"
                                        data-placement="left">
                                        <i class="fas fa-compress-alt"></i>
                                    </a>
                                    <button type="submit"    data-toggle="modal"
                                    data-title="Add to cart" data-placement="left" data-target="#<?php  echo $product->id ?>">
                                    <i class="las la-shopping-cart"></i>
                                </button>
                                    <form action="{{route('cart.showCartModal')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}" />
                                    <button type="submit"    data-toggle="tooltip"
                                        data-title="Add to cart" data-placement="left">
                                        <i class="las la-shopping-cart"></i>
                                    </button>
                                </form>
                                </div>
                            </div>
                            <div class="p-md-3 p-2 text-center">
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    {{$product->name}}
                                </h3>
                                <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                    <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$product->rating}} <i
                                            class="fas fa-star ml-1"></i></span>


                                </h3>

                                <div class="fs-11 product_text">
                                    <span class="fw-700 text-color-black fs-07"> <i
                                            class="las la-rupee-sign"></i>{{home_discounted_base_price($product)}}</span>
                                    <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$product->unit_price}}</del>
                                    <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">40% off</span>

                                </div>



                            </div>
                        </div>
                    </div>

                    {{-- model popup --}}
                    <div class="modal fade bg-light" style="width:50%;height:50%" id="<?php  echo $product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-body p-4 c-scrollbar-light" id=" ">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="carousel-box img-zoom rounded">
                                    <img
                                        class="img-fluid lazyload"
                                        src="{{ uploaded_asset( $product->thumbnail_img) }}"

                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    >
                                </div>
                                <div class="row gutters-10 flex-row-reverse">
                                    @php
                                        $photos = explode(',',$product->photos);
                                    @endphp
                                    <div class="col">
                                        <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'>
                                            @foreach ($photos as $key => $photo)
                                            <div class="carousel-box img-zoom rounded">
                                                <img
                                                    class="img-fluid lazyload"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($photo) }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                >
                                            </div>
                                            @endforeach
                                            @foreach ($product->stocks as $key => $stock)
                                                @if ($stock->image != null)
                                                    <div class="carousel-box img-zoom rounded">
                                                        <img
                                                            class="img-fluid lazyload"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($stock->image) }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        >
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto w-90px">
                                        <div class="aiz-carousel carousel-thumb product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-focus-select='true'>
                                            @foreach ($photos as $key => $photo)
                                            <div class="carousel-box c-pointer border p-1 rounded">
                                                <img
                                                    class="lazyload mw-100 size-60px mx-auto"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($photo) }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                >
                                            </div>
                                            @endforeach
                                            @foreach ($product->stocks as $key => $stock)
                                                @if ($stock->image != null)
                                                    <div class="carousel-box c-pointer border p-1 rounded" data-variation="{{ $stock->variant }}">
                                                        <img
                                                            class="lazyload mw-100 size-50px mx-auto"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($stock->image) }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        >
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-left">
                                    <h2 class="mb-2 fs-20 fw-600">
                                        {{  $product->getTranslation('name')  }}
                                    </h2>

                                    @if(home_price($product) != home_discounted_price($product))
                                        <div class="row no-gutters mt-3">
                                            <div class="col-2">
                                                <div class="opacity-50 mt-2">{{ translate('Price')}}:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="fs-20 opacity-60">
                                                    <del>
                                                        {{ home_price($product) }}
                                                        @if($product->unit != null)
                                                            <span>/{{ $product->getTranslation('unit') }}</span>
                                                        @endif
                                                    </del>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row no-gutters mt-2">
                                            <div class="col-2">
                                                <div class="opacity-50">{{ translate('Discount Price')}}:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="">
                                                    <strong class="h2 fw-600 text-primary">
                                                        {{ home_discounted_price($product) }}
                                                    </strong>
                                                    @if($product->unit != null)
                                                        <span class="opacity-70">/{{ $product->getTranslation('unit') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row no-gutters mt-3">
                                            <div class="col-2">
                                                <div class="opacity-50">{{ translate('Price')}}:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="">
                                                    <strong class="h2 fw-600 text-primary">
                                                        {{ home_discounted_price($product) }}
                                                    </strong>
                                                    <span class="opacity-70">/{{ $product->unit }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if (addon_is_activated('club_point') && $product->earn_point > 0)
                                        <div class="row no-gutters mt-4">
                                            <div class="col-2">
                                                <div class="opacity-50">{{  translate('Club Point') }}:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="d-inline-block club-point bg-soft-primary px-3 py-1 border">
                                                    <span class="strong-700">{{ $product->earn_point }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <hr>

                                    @php
                                        $qty = 0;
                                        foreach ($product->stocks as $key => $stock) {
                                            $qty += $stock->qty;
                                        }
                                    @endphp

                                    <form id="option-choice-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">

                                        <!-- Quantity + Add to cart -->
                                        @if($product->digital !=1)
                                            @if ($product->choice_options != null)
                                                @foreach (json_decode($product->choice_options) as $key => $choice)

                                                    <div class="row no-gutters">
                                                        <div class="col-2">
                                                            <div class="opacity-50 mt-2 ">{{ \App\Models\Attribute::find($choice->attribute_id)->getTranslation('name') }}:</div>
                                                        </div>
                                                        <div class="col-10">
                                                            <div class="aiz-radio-inline">
                                                                @foreach ($choice->values as $key => $value)
                                                                <label class="aiz-megabox pl-0 mr-2">
                                                                    <input
                                                                        type="radio"
                                                                        name="attribute_id_{{ $choice->attribute_id }}"
                                                                        value="{{ $value }}"
                                                                        @if($key == 0) checked @endif
                                                                    >
                                                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                                                        {{ $value }}
                                                                    </span>
                                                                </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif

                                            {{-- @if (count(json_decode($product->colors)) > 0)
                                                <div class="row no-gutters">
                                                    <div class="col-2">
                                                        <div class="opacity-50 mt-2">{{ translate('Color')}}:</div>
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="aiz-radio-inline">
                                                            @foreach (json_decode($product->colors) as $key => $color)
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Models\Color::where('code', $color)->first()->name }}">
                                                                <input
                                                                    type="radio"
                                                                    name="color"
                                                                    value="{{ \App\Models\Color::where('code', $color)->first()->name }}"
                                                                    @if($key == 0) checked @endif
                                                                >
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>
                                                                </span>
                                                            </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                            @endif --}}

                                            <div class="row no-gutters">
                                                <div class="col-2">
                                                    <div class="opacity-50 mt-2">{{ translate('Quantity')}}:</div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="product-quantity d-flex align-items-center">
                                                        <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                                            <button class="btn col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="minus" data-field="quantity" disabled="">
                                                                <i class="las la-minus"></i>
                                                            </button>
                                                            <input type="text" name="quantity" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $product->min_qty }}" min="{{ $product->min_qty }}" max="10">
                                                            <button class="btn  col-auto btn-icon btn-sm btn-circle btn-light" type="button" data-type="plus" data-field="quantity">
                                                                <i class="las la-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="avialable-amount opacity-60">
                                                            @if($product->stock_visibility_state == 'quantity')
                                                            (<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}})
                                                            @elseif($product->stock_visibility_state == 'text' && $qty >= 1)
                                                                (<span id="available-quantity">{{ translate('In Stock') }}</span>)
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                        @endif

                                        <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                            <div class="col-2">
                                                <div class="opacity-50">{{ translate('Total Price')}}:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="product-price">
                                                    <strong id="chosen_price" class="h4 fw-600 text-primary">

                                                    </strong>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="mt-3">
                                        @if ($product->digital == 1)
                                            <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                                                <i class="la la-shopping-cart"></i>
                                                <span class="d-none d-md-inline-block">{{ translate('Add to cart')}}</span>
                                            </button>
                                        @elseif($qty > 0)
                                            @if ($product->external_link != null)
                                                <a type="button" class="btn btn-soft-primary mr-2 add-to-cart fw-600" href="{{ $product->external_link }}">
                                                    <i class="las la-share"></i>
                                                    <span class="d-none d-md-inline-block">{{ translate($product->external_link_btn)}}</span>
                                                </a>
                                            @else
                                                <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart" onclick="addToCart()">
                                                    <i class="la la-shopping-cart"></i>
                                                    <span class="d-none d-md-inline-block">{{ translate('Add to cart')}}</span>
                                                </button>
                                            @endif
                                        @endif
                                        <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                                            <i class="la la-cart-arrow-down"></i>{{ translate('Out of Stock')}}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    {{-- model popup end --}}
                    @endforeach






                </div>
            </div>
        </div>



        {{-- modloa pop up --}}


        {{-- modal pop up end --}}
    </section>








    {{-- small banner --}}
    @if($business_settings->where('type','section6')->first()->value == 1)
    <div class="mb-4">
        <div class="container ">
            <div class="row gutters-10">
                @foreach (json_decode(get_setting('color_banners_images'), true) as $key => $value)
                    <div class="col-12 col-xl-12 col-md-12 ">
                        <div class="mb-3 mb-lg-0">
                            <img src= "{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class="img-fluid zone-banner-one border-radious-3 lazyload " style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%);max-width: 100%; height:auto;" >
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- home banner --}}


    {{-- home banner section 2 --}}
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-4 col-xl  col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p1.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-4 col-xl col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p2.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-4 col-xl col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p3.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-4 col-xl col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p4.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-4 col-xl col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p5.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-4 col-xl col-md-3">
                    <div class="mb-3 mb-lg-0">
                        <img src="public/assets/img/products/p6.jpg" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- deals of day slider --}}
    <section class="mb-4">

        <div class="container">


            <div class="mb-4">
                <div class="">
                    <div class="deals_day_contain  ">
                        <div class="row gutters-12">
                            <div class=" col-12 col-md-3 deals-of">
                                <div class="mb-3 mb-lg-0">
                                    <h2>
                                        Deals of the Day

                                    </h2>
                                    <h4> 8 : 15 : 00</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="inner_deals">
                                    <div class="mb-3 mb-lg-0 ">
                                        <div class="deals_day aiz-carousel  half-outside-arrow " data-items="4" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                                            <div class="carousel-box margin-left-2">
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap1.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600  text-truncate-2 lh-1-4 mb-0 h-auto fs-11">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>




                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2">
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap2.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600  text-truncate-2 lh-1-4 mb-0 h-auto fs-11 ">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>



                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2" >
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap3.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600  text-truncate-2 lh-1-4 mb-0 h-auto fs-11">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>



                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2" >
                                                <div class="aiz-card-box  bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap4.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600  text-truncate-2 lh-1-4 mb-0 h-auto fs-11 ">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>


                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2" >
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap5.jpg">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto ">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>



                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2">
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap6.jfif">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto ">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>



                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-box margin-left-2">
                                                <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                    <div class="position-relative">
                                                        <a href="#" class="d-block">
                                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="public/assets/img/products/lap7.jfif">
                                                        </a>

                                                    </div>
                                                    <div class="p-md-3 p-2 text-center">
                                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                            APPLE iPhone 11 </h3>
                                                        <h5 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto ">
                                                            Smart Screen Guard, Nano Liquid Screen Protector, Diamond Screen Guard, </h5>


                                                        <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                            <span class="rating">
                                                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                            </span>
                                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>


                                                        </h3>

                                                        <div class="fs-11 product_text">
                                                            <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                            <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                                            <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- static  tabs --}}
    <section class="mb-4">
            <div class="container">

                <div class=" slider-padding bg-white  border-radious-7">
                    <div class="col-md-12">

                    </div>
                <div class="row p-2">
                    <div class="col-2 text-center">
                       <div class="">
                       <img src="public/assets/img/new_logo.png" class="text-centet border h-md-50 shadow-lg p-4 border-radious-5 logo-header-color ">
                   </div>
                      <div class="mt-2 ml-5 ">
                        <span class="fs-21 fw-700 text-center "> Tech E-Box</span>
                    </div>
                    <div class="mt-1 ml-5 product_text">
                        <span class="fs-14 text-center  ">The Tags Line Here</span>
                    </div>
                    </div>
                <div class="col-10 ">
                    <div class="row p-3" style="margin-left: 100px;">
                       <div class=" d-inline-block p-3  text-centet border shadow-lg border-radious-5 zone-demo-class">
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>
                       <div class=" p-3 d-inline-block  text-centet border shadow-lg border-radious-5 zone-demo-class-one">
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>
                       <div class=" p-3 d-inline-block  text-centet border shadow-lg border-radious-5 zone-demo-class-two">
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>

                   </div>
                   <div class="row p-3" style="margin-left: 100px;">
                       <div class=" d-inline-block p-3  text-centet border shadow-lg border-radious-5 zone-demo-class" >
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>
                       <div class=" p-3 d-inline-block  text-centet border shadow-lg border-radious-5 zone-demo-class-one" >
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>
                       <div class=" p-3 d-inline-block  text-centet border shadow-lg border-radious-5 zone-demo-class-two">
                        <img src="public/assets//img//box.png">
                        <span class="">Demo</span>

                       </div>

                   </div>
                </div>
                </div>
                </div>

            </div>
        </section>

    {{-- zone featured --}}

    <section class="mb-4">
        <div class="container">

            <div class=" slider-padding product-zone-bg   border-radious-7">
                <div class="col-md-12">

                </div>
                <div class="row  pb-1">
                      <div class="col-10">
                      <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h1 class="mediya-h4 mt-4 fs-34 fw-700" >Zones

                                    <p class="fs-16 fw-600 margin-top-4px text-color-black">Shop by Zone</p>
                                </h1>

                            </div>

                        </div>


                    </h3>
                      </div>
                    <div class="col-2 text-right">
                    <img class=" img-fit lazyload  h-md-130px" src="public/assets/img/Wireless.png" id="zone-shop" style="transform: skew(-0.06turn, 18deg);">
                    </div>


                </div>
                <div class="px-2 py-4 px-md-4 py-md-3   ">
                    <div class="aiz-carousel gutters-10 half-outside-arrow " data-items="4" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                        <div class="carousel-box">
                            <div class="row no-gutters box-3 align-items-center border border-light border-radious-5 hov-shadow-md my-2 has-transition bg-white">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src="public/assets/img/Wireless.png" alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-6 col-md-6 col-lg-6 cs-border-orange">
                                    <div class="p-3 text-left  ">
                                        <h2 class="fs-16 fw-600 text-truncate-2 product_text ">
                                           Gamming Zone
                                        </h2>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row no-gutters box-3 align-items-center border border-light border-radious-5 hov-shadow-md  my-2 has-transition bg-white">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src="public/assets/img/Wireless.png" alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-6 cs-border-orange">
                                    <div class="p-3 text-left">
                                        <h2 class="fs-16 fw-600 text-truncate-2 product_text">
                                        Gamming Zone
                                        </h2>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row no-gutters box-3 align-items-center border border-light border-radious-5 hov-shadow-md  my-2 has-transition bg-white">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src="public/assets/img/Wireless.png" alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-6  cs-border-orange">
                                    <div class="p-3 text-left">
                                        <h2 class="fs-16 fw-600 text-truncate-2 product_text">
                                        Gamming Zone
                                        </h2>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row no-gutters box-3 align-items-center border border-light border-radious-5 hov-shadow-md   my-2 has-transition bg-white">
                                <div class="col-4 text-center">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src="public/assets/img/Wireless.png" alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-6 ">
                                    <div class="p-3 text-left">
                                        <h2 class="fs-16 fw-600 text-truncate-2 product_text ">
                                        Gamming Zone
                                        </h2>



                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                </div>
            </div>

        </div>
    </section>




{{-- discount product slider --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Discount Products GRAB IT!</span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px; margin-left:-1%;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen</h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3<i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap5.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap6.jfif">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-11 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap7.jfif">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>20.000</del>

                                <span class="fw-600  ml-1 cfs-12 green-color">40% off</span>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- flash deal --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Discount Products GRAB IT!</span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                        @php
                            $product = \App\Models\Product::find($flash_deal_product->product_id);
                        @endphp

                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>

                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
</section>

{{-- laptop accessories slider --}}
@if($business_settings->where('type','section11')->first()->value == 1)
<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Laptop Accesories
                                </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section11_products'), true))->get() as $key => $value)
                <div class="carousel-box">

                    <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}" width="200px" height="100px">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToWishList(id) " data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                              <a href="{{route('product',$value->slug)}}"> {{$value->name}} </a> </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11  product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> {{$value->unit_price}}</del>

                                <span class="fw-600  cfs-13 green-color"> {{$value->discount}}% off </span>

                            </div>



                        </div>
                    </div>

                </div>

                @endforeach


        </div>
    </div>
</section>
@endif

{{-- Recommed For You slider --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding product-bg   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center border-bottom border-dark pb-1" >

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Recommed For You!
                                </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                <div class="carousel-box  p-2" >
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-150px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap4.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap5.jpg">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap6.jfif">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="carousel-box p-2">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="public/assets/img/products/lap7.jfif">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Soni 14s Core i3 10th Gen </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> 40% off </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- small banner section13 --}}

@if($business_settings->where('type','section13')->first()->value == 1)
<div class="mb-4">
    <div class="container">
        <div class="row gutters-10" data-items="2" data-xl-items="2" data-lg-items="2" data-md-items="2" data-sm-items="1" data-xs-items="1">
            @foreach (json_decode(get_setting('small_banner_images'), true) as $key => $value)
                <div class="col-6 col-xl-6 col-md-6">
                    <div class=" mb-3 mb-lg-0">
                        <img src="{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class=" img-fit img-fluid lazyload zone-banner-one border-radious-5" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)">

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endif

{{-- 4 product slider --}}
@if($business_settings->where('type','section14')->first()->value == 1)
<div id="section_best_sellers">
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3   ">
                <div class="small_slider  aiz-carousel gutters-10 half-outside-arrow pr-0 pl-0" data-items="6" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                    @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section14_products'), true))->get() as $key => $value)
                    <div class="carousel-box" >
                        <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition bg-white">
                            <div class="col-6">
                                <a href="{{route('product',$value->slug)}}" class="d-block p-3" tabindex="0">
                                    <img src="{{uploaded_asset($value->thumbnail_img)}}" alt="Wear Dreams" class="img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-130px">
                                </a>
                            </div>
                            <div class="col-6 cs-border-left cs-border-orange">
                                <div class="p-3 text-left ">
                                    <h2 class="cfs-20 fw-600 text-truncate-2 ">
                                        {{$value->name}}
                                    </h2>

                                    <div class="">

                                        <span class="fw-700 text-primary cfs-15px ">{{home_discounted_base_price($value)}}</span>
                                        <del class="fw-600 opacity-50 cfs-11 ml-1">{{$value->unit_price}}</del>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
           </div>
        </div>
    </section>
</div>
@endif

{{-- big banner home --}}
@if($business_settings->where('type','section15')->first()->value == 1)
<div class="mb-4">
    <div class="container">
        <div class="row gutters-10">
            @foreach (json_decode(get_setting('medium_banner_2_images'), true) as $key => $value)
            <div class="col-6 col-md-6 col-lg-6">
                <div class="mb-3 mb-lg-0">
                    <img src="{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class=" img-fit img-fluid lazyload border-radious-5" >

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- banner 1 --}}

@if($business_settings->where('type','section16')->first()->value == 1)
<div class="mb-4">
    <div class="container">
        <div class="row gutters-10">
            @foreach (json_decode(get_setting('large_size_banner_images'), true) as $key => $value)
            <div class="col-12 col-xl-12 col-md-12 ">
                <div class="mb-3 mb-lg-0">
                    <img src="{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif

{{-- Best Smart Phone slider section17 --}}
  @if($business_settings->where('type','section17')->first()->value == 1)
<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Best Smart Phone</span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>

                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section17_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition ">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                            <div class="absolute-top-left" style="margin-top: 70px;">
                                <div class="bg-warning">
                                <span class="badge  d-block"><i
                                    class="fas fa-shipping-fast "></i></span>
                                    <span class="badge d-block"><i
                                        class="fas fa-box-open"></i></span>
                                    </div>
                            </div>
                        </div>
                        <div class="p-md-2 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                               <a href="{{route('product',$value->slug)}}" > {{$value->name}}</a></h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10   c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> {{$value->unit_price}}</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> {{$value->discount}}% off </span>

                            </div>



                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endif

{{-- Best smart phone 2 section 18 --}}

{{-- @if($business_settings->where('type','section18')->first()->value == 1)
<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Best Smart Phone</span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>

                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section18_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-210px" src="{{uploaded_asset($value->thumbnail_img)}}">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                             <a href="{{route('product',$value->slug)}}"  > {{$value->name}}</a> </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10   c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> {{$value->unit_price}}</del>

                                <span class="fw-600  ml-1 cfs-13 green-color"> {{$value->discount}}% off </span>

                            </div>



                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endif --}}

{{-- best samsung slider section19 --}}

@if($business_settings->where('type','section19')->first()->value == 1)
<section class="mb-4">
    <div class="container">


        <div class="d-flex flex-wrap bg-blue align-items-center top-border-radious-7 p-3 pb-1">

            <h3 class="h5 fw-600 mb-0">
                <div class="main-title-tt">
                    <div class="main-title-left">

                        <h4 class="b-mediya-h4"><span class="  pb-3 ml-2 fw-700 text-color-white">Best Samsung</span>
                            <p class="fs-10 fw-600 margin-top-4px text-color-white ml-2 mt-2">Tag Line Here is text</p>
                        </h4>

                    </div>

                </div>


            </h3>


            <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
            <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
        </div>
    </div>
        <div class="container">
        <div class=" slider-padding bg-white bottom-border-radious-7">
            <div class="col-md-12">

            </div>





            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section19_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition ">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class="img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}">
                            </a>
                            <div class="absolute-top-left pt-2 pl-2 pb-2">
                                <span class="badge badge-inline badge-success">{{$value->discount}}%</span>
                            </div>
                            <div class="absolute-top-left pt-4 pl-2">
                                <span class="badge badge-inline badge-danger mt-2">New</span>
                            </div>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-2  text-md-left">
                            <h3 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                <a href="{{route('product',$value->slug)}}"> {{$value->name}}</a></h3>


                            <div class="fs-15 ">


                                <span class="rating ">
                                    <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                </span>

                            </div>
                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> {{$value->discount}}</del>


                            </div>
                            <a class="btn" href="{{route('product',$value->slug)}}" style="margin-top: -3.125rem; margin-left:9rem;">
                                <span class="fw-900 fs-14   cfs-13 text-color-blue">
                                    <i class=" fas fa-long-arrow-alt-right "></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>

</section>
@endif

{{-- banner --}}
@if($business_settings->where('type','section20')->first()->value == 1)
    <section class="mb-4">
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @foreach (json_decode(get_setting('wide_banners_images'), true) as $key => $value)
                    <div class=" col-12 col-xl  col-md-12">
                        <div class="mb-3 mb-lg-0">
                            <img src="{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class="img-fluid lazyloaded img-fit lazyload mx-auto h-px h-md-310px border-radious-5" width="100%">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif


{{-- best deal slider 1 --}}

@if($business_settings->where('type','section21')->first()->value == 1)
<section class="mb-4">
    <div class="container">
        <div class="deals-6">
            <div class="row gutters-12 bg-white border-radious-7">
                <div class="col-0 col-md-4 mt-2  d-none d-lg-block" style="padding-top:8px;padding-bottom:10px">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-290px  " src="public/assets/img/products/left_img.png">
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8 col-xl col-xs-12">
                    <div class="px-2 py-4 px-md-4 py-md-2 mt-2  product-radious " style="margin-top: 8px;">

                        <div class="d-flex flex-wrap  align-items-baseline top-product-border pb-1">
                            <h3 class="h5 fw-600 mb-0">
                                <span class=" pb-1 d-inline-block">BEST DEALS 1
                            </h3>

                            <div class="aiz-count-down ml-auto ml-lg-3 align-items-center " data-date=""></div>
                            <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto ">View More</a>
                        </div>

                        <div class="deals_day aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section21_products'), true))->get() as $key => $value)
                            <div class="carousel-box p-0 mt-2">
                                <div class="aiz-card-box border border-light rounded  hov-shadow-md my-2 has-transition ">
                                    <div class="position-relative">
                                        <a href="{{route('product',$value->slug)}}" class="d-block">
                                            <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}">
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                <i class="fas fa-compress-alt"></i>
                                            </a>
                                            <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-2 p-2 text-center">
                                        <h3 class=" fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                            <a href="{{route('product',$value->slug)}}"> {{$value->name}} </a> </h3>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color">
                                            Up to {{$value->discount}} off </h3>

                                        <div class="fs-15">

                                            <span class="fw-700 text-color-black"><i class="las la-rupee-sign"></i> {{home_discounted_base_price($value)}}</span>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif

{{-- best deal slider 2 --}}
@if($business_settings->where('type','section22')->first()->value == 1)
<section class="mb-4">
    <div class="container">
        <div class="deals-6">
            <div class="row gutters-12 bg-white border-radious-7">
                <div class="col-0 col-md-4 mt-2  d-none d-lg-block" style="padding-top:8px;padding-bottom:10px">
                    <div class=" aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-290px  " src="public/assets/img/products/left_img.png">
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8 col-xl col-xs-12">
                    <div class="px-2 py-4 px-md-4 py-md-2 mt-2 bg-white shadow-sm product-radious " style="margin-top: 8px;">

                        <div class="d-flex flex-wrap  align-items-baseline top-product-border pb-1">
                            <h3 class="h5 fw-600 mb-0">
                                <span class=" pb-1 d-inline-block">BEST DEALS 2
                            </h3>

                            <div class="aiz-count-down ml-auto ml-lg-3 align-items-center " data-date=""></div>
                            <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto ">View More</a>
                        </div>

                        <div class="deals_day aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section22_products'), true))->get() as $key => $value)
                            <div class="carousel-box p-0 mt-2">
                                <div class="aiz-card-box border border-light rounded  hov-shadow-md my-2 has-transition ">
                                    <div class="position-relative">
                                        <a href="{{route('product',$value->slug)}}" class="d-block">
                                            <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}">
                                        </a>
                                        <div class="absolute-top-right aiz-p-hov-icon">
                                            <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                <i class="la la-heart-o"></i>
                                            </a>
                                            <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                <i class="fas fa-compress-alt"></i>
                                            </a>
                                            <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                <i class="las la-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-md-2 p-2 text-center">
                                        <h3 class=" fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                            <a href="{{route('product',$value->slug)}}"> {{$value->name}} </a> </h3>
                                        <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color">
                                            Up to {{$value->discount}} off </h3>

                                        <div class="fs-15">

                                            <span class="fw-700 text-color-black"><i class="las la-rupee-sign"></i> {{home_discounted_base_price($value)}}</span>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif

  {{-- Top 10 categories and Brands --}}

  <section class="mb-4">
      <div class="container">
          <div class="row gutters-10">




                  <div class="col-lg-12">
                      <div class="d-flex mb-3 align-items-baseline top-product-border">
                          <h3 class="h5 fw-700 mb-0">
                              <span class=" pb-3 d-inline-block">{{ translate('Top 10 Brands') }}</span>
                          </h3>
                          <a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-danger btn-sm shadow-md">{{ translate('View All Brands') }}</a>
                      </div>
                      <div class="row gutters-5">
                        @foreach (App\Models\Brand::whereIn('id',json_decode(get_setting('section23_brands'), true))->get() as $key => $brand)
                                  <div class="col-sm-6 col-lg-3">
                                      <a href="{{ route('products.brand', $brand->slug) }}" class="bg-white border d-block text-reset rounded p-2 hov-shadow-md mb-2">
                                          <div class="row align-items-center no-gutters">
                                              <div class="col-4 text-center">
                                                  <img
                                                      src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                      data-src="{{ uploaded_asset($brand->logo) }}"
                                                      alt="{{ $brand->getTranslation('name') }}"
                                                      class="img-fluid img lazyload h-60px"
                                                      onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                  >
                                              </div>
                                              <div class="col-6">
                                                  <div class="text-truncate-2 pl-3 fs-14 fw-600 text-left text-dark">{{ $brand->getTranslation('name') }}</div>
                                              </div>
                                              <div class="col-2 text-center">
                                                  <i class="la la-angle-right text-primary"></i>
                                              </div>
                                          </div>
                                      </a>
                                  </div>

                          @endforeach
                      </div>
                  </div>

          </div>
      </div>
  </section>

{{-- Brand slider --}}
{{-- @if($business_settings->where('type','section23')->first()->value == 1)
<section>
    <div class="logo-div mb-4">
        <div class="fluid-container p-2">

            <section class="customer-logos slider">
                @foreach (App\Models\Brand::whereIn('id',json_decode(get_setting('section23_brands'), true))->get() as $key => $value)
                <div class="slide"><img class="img-fit lazyload mx-auto h-140px h-md-130px" src="{{uploaded_asset($value->logo)}}" height="100" width="100"></div>
                 @endforeach
            </section>
        </div>
    </div>
</section>
@endif --}}



<section class="mb-4  bg-white">
    <div class="container bg-white  p-0">

            <div class="section145">
                <div class="container bg-white category-carousel">
                    <div class="row ">

                        <div class="col-md-12 ">
                            <div  class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                                @foreach (App\Models\Brand::whereIn('id',json_decode(get_setting('section23_brands'), true))->get() as $key => $value)
                                <div class="item ">
                                    <a href="{{route('products.category',$value->slug)}}" class="category-item " style="margin-top: 20px">
                                        <div class="cate-img" >
                                            <img class="img-fit lazyload mx-auto h-140px h-md-210px" src="{{uploaded_asset($value->logo)}}" alt="">
                                        </div>
                                        <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text text-cat ">{{$value->name}}</span>

                                        </div>
                                    </a>
                                </div>
                            @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>


    </div>

</section>

{{-- Featured Sub to Sub Category Product Carosual - Section 38 --}}
@if($business_settings->where('type','section38')->first()->value == 1)
<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Featured Sub to Sub Category Product Carosual
                            </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (App\Models\Product::whereIn('subsubcategory_id',json_decode(get_setting('section38_featured_subsubcategories'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto h-140px h-md-210px" src=" {{uploaded_asset($value->thumbnail_img)}}">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                <a href="{{route('product',$value->slug)}}">  {{$value->name}} </a></h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign">{{$value->unit_price}}</i></del>

                                <span class="fw-600  ml-1 cfs-13 green-color">  {{$value->discount}}% off </span>

                            </div>



                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- 50% banner  sectoion 39--}}
    @if($business_settings->where('type','section39')->first()->value == 1)
    <div class="mb-4">
        <div class="container ">
            <div class="row gutters-10">
                @foreach (json_decode(get_setting('banner_50_section_images'), true) as $key => $value)
                    <div class="col-6 col-xl col-md-12 ">
                        <div class="mb-3 mb-lg-0">
                            <img src= "{{uploaded_asset($value)}}" alt="Rotech Ecom-site" class="img-fluid zone-banner-one border-radious-3 lazyload " style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%) ; height:400px; width:100% "  >
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

{{-- Sub to Sub Category Product Carosual --}}
@if($business_settings->where('type','section31')->first()->value == 1)
<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700"> Sub to Sub Category Product Carosual
                            </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (App\Models\Product::whereIn('subsubcategory_id',json_decode(get_setting('section31_categories'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto h-140px h-md-210px" src=" {{uploaded_asset($value->thumbnail_img)}}">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                <a href="{{route('product',$value->slug)}}">  {{$value->name}} </a></h3>
                            <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign">{{$value->unit_price}}</i></del>

                                <span class="fw-600  ml-1 cfs-13 green-color">  {{$value->discount}}% off </span>

                            </div>



                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif



{{-- best seller slider --}}


<section class="mb-4">
    <div class="container">
        <div class=" slider-padding bg-white   border-radious-7">
            <div class="d-flex mb-3 align-items-baseline top-product-border">
                <h3 class="h5 fw-700 mb-0">
                    <span class=" pb-3 d-inline-block">{{ translate('Best Sellers')}}</span>
                </h3>
                <a href="#" class="ml-auto mr-0 btn btn-danger btn-sm shadow-md">{{ translate('View All Sellers') }}</a>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="3" data-lg-items="3"  data-md-items="2" data-sm-items="2" data-xs-items="1" data-rows="2">


                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white  ">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="row aiz-card-box no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition">
                                <div class="col-4 position-relative">
                                    <a href="#" class="d-block p-3">
                                        <img src=" public/assets/img/products/m6.jpg " alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                    <div class="absolute-top-right aiz-p-hov-icon">
                                        <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                            <i class="la la-heart-o"></i>
                                        </a>
                                        <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                            <i class="fas fa-compress-alt"></i>
                                        </a>
                                        <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                            <i class="las la-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-8 border-left border-light bg-white">
                                    <div class="p-3 text-left">
                                        <h2 class="h6 fw-600 text-truncate d-block">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5<i class="las la-star ml-1 color" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
        </div>
    </div>
</section>

{{-- you recently view --}}
@if(empty($uid)))

@else
<section class="mb-4">
    <div class="fluid-container">
        <div class="recently_viwed">
            <div class="row gutters-10">
                <div class="col-12 col-md-2 recently_left_text">
                    <div class="recently_div ">
                        <h4 class="align-item-center">
                            <i class="las la-history"></i>

                            You Recently Viewed
                        </h4>
                        <!-- <h4 class="c-mleft-31"> </h4> -->

                        <p class="c-mleft-31 text-color-white">See Your Full histery <i class="las la-angle-right"></i></p>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="deals_day aiz-carousel half-outside-arrow p-0" data-items="5" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                        @foreach (\App\Models\RecentViewProduct::where('user_id', $uid)->get() as $rview)
                        @foreach (\App\Models\Product::where('id', $rview->product_id)->get() as $product)
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img class="img-fluid lazyload mx-auto h-140px h-md-130px" src="{{uploaded_asset($product->thumbnail_img)}}" alt="Wear Dreams" >
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate d-block text-color-blue">
                                            <a href="{{ route('product', $product->slug) }}">{{$product->name}}</a>
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$product->rating}} <i class="las la-star ml-1" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i>{{home_discounted_base_price($product)}}</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign">{{$product->unit_price}}</i></del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach




                    </div>

                </div>
                <div class="col-0 col-md-1 d-none d-md-block">
                    <div class="carousel-box" style="width: 100%; display: inline-block;">
                        <div class="right-div-bg row no-gutters box-3 my-1 align-items-center   border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">

                            <div class="col-1 ">
                                <div class="p-2 text-left h-md-150px">
                                    <h2 class="h6 fw-800 h2-padding">
                                        See All
                                    </h2>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

 <!-- featured product -->
 <section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700" >Features
                            </span>

                        </h4>

                        </div>

                    </div>


                </h3>
  </div>
 <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="3" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                <div class="carousel-box ">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-150px  border-radious-5 " src='{{static_asset('/assets/img/banners/Banner_1.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-140px h-md-150px  border-radious-5 " src='{{static_asset('/assets/img/banners/Banner_2.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-140px h-md-150px  border-radious-5 " src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto  h-140px h-md-150px  border-radious-5 " src='{{static_asset('/assets/img/banners/Banner_1.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-140px h-md-150px" src='{{static_asset('/assets/img/banners/Banner_2.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto   h-md-150px" src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


{{-- video section --}}

<div class="mb-4 mt-4 tabcenter">
    <div class="container video-iframe bg-white mr-1">
        <div class="row">
            <div class="col-md-6 col-12">
                <iframe class="responsive-iframe" src="https://www.youtube.com/embed/0E44DClsX5Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 col-12 h-md-450px pr-2" style="overflow-y: scroll">
            <div class="p-1">
                        <h2 class="fs-24 fw-800 mb-1">
                            <a href="" class="text-reset text-color-black">
                                T-Shirts Every Man Needs in His Wardrobe
                            </a>
                        </h2>
                        <div class="mb-2 opacity-50">
                            <i>Man Fashion</i>
                        </div>
                        <p class="opacity-70  fs-15 mb-4 text-color-black  ">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="opacity-70  fs-15 mb-4 text-color-black">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>


                    </div>
            </div>
        </div>
    </div>
</div>

{{-- About Home Section35 --}}
@if($business_settings->where('type','section35')->first()->value == 1)
<div class="mb-4  ">
    <div class="container" >
        <div class=" slider-padding bg-white   border-radious-7">
        <div class=" col-12 g-about text-center p-2 " id="zonebg" >
            <div class="g-heading my-3">
                <h2 class="cfs-30 fw-900 text-color-black mt-2">
                    About Zone
                </h2>
                <hr class="divider">
            </div>
            <div class="g-about para mt-3 my-5 ">

                <div class="container mb-3">
                    <div class=" text-justify mb-3">
                        @foreach (json_decode(get_setting('about_home',[0
                    ]), true) as $key => $value)
                        <p class="opacity-70  fs-15 mb-4 text-color-black ab-text1 mr-1">
                             {{$value}}
                        </p>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endif
{{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
        <div class="mb-4">
            <div class="container">
                <div class="row gutters-10">
                    @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                    @foreach ($banner_1_imags as $key => $value)
                        <div class=" col-6 col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}"
                                    class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($banner_1_imags[$key]) }}"
                                        alt="{{ env('APP_NAME') }} promo" class="img-fluid border-radious-3 lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif



    {{-- Flash Deal --}}
      @php
    $flash_deal = \App\Models\FlashDeal::where('status', 1)
        ->where('featured', 1)
        ->first();
    @endphp
    @if ($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
        <section class="mb-4">
            <div class="container">
                <div class=" slider-padding bg-white   border-radious-7">


                    <div class="d-flex flex-wrap mb-3 align-items-baseline top-product-border">
                        <h3 class="h5 fw-700 mb-0">
                            <span
                                class="pb-3 d-inline-block">{{ translate('Flash Sale') }}</span>
                        </h3>


                           <div class="aiz-count-down ml-auto ml-lg-3 align-items-center shadow-sm"
                            data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                        <a href="{{ route('flash-deal-details', $flash_deal->slug) }}"
                            class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">{{ translate('View More') }}</a>
                    </div>

                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6"
                        data-lg-items="6" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                        @foreach ($flash_deal->flash_deal_products->take(20) as $key => $flash_deal_product)
                            @php
                                $product = \App\Models\Product::find($flash_deal_product->product_id);
                            @endphp
                            @if ($product != null && $product->published != 0)
                                <div class="carousel-box">
                                    @include('frontend.partials.product_box_1',['product' => $product])
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @endif


    {{-- Featured Section --}}
    <div id="section_featured">

    </div>



    <!-- Auction Product -->
    @if (addon_is_activated('auction'))
        <div id="auction_products">

        </div>
    @endif



    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner2_images') != null)
        <div class="mb-4">
            <div class="container">
                <div class="row gutters-10">
                    @php $banner_2_imags = json_decode(get_setting('home_banner2_images')); @endphp
                    @foreach ($banner_2_imags as $key => $value)
                        <div class=" col-6 col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}"
                                    class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($banner_2_imags[$key]) }}"
                                        alt="{{ env('APP_NAME') }} promo" class="img-fluid border-radious-3 lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@if(empty($uid))
@else
    <section class="mb-4">
        <div class="container">

            <div class=" slider-padding bg-white   border-radious-7">
                <div class="col-md-12">

                </div>
                <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="mediya-h4"> <span class=" pb-3 fw-700"> Suggetion Criteria
                                    </span>
                                    <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                                </h4>

                            </div>

                        </div>


                    </h3>


                    <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                    <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
                </div>




                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                    @foreach (\App\Models\Customer::where('user_id', $uid)->get() as $user)
                    @if (empty(json_decode($user->user_tags)) )
                    <a class="btn btn-primary" href="#">Add User Tags</a>
                    @else

                    @foreach (json_decode($user->user_tags) as $user_tag)


                            @foreach (\App\Models\Product::where('user_tags',$user_tag)->get() as $value)

                    <div class="carousel-box">

                        <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="{{route('product',$value->slug)}}" class="d-block">
                                    <img class="img-fit lazyload mx-auto h-140px h-md-150px" src="{{uploaded_asset($value->thumbnail_img)}}" width="200px" height="100px">
                                </a>
                                <div class="absolute-top-right aiz-p-hov-icon">
                                    <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                        <i class="la la-heart-o"></i>
                                    </a>
                                    <a href="" onclick="addToWishList(id) " data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                        <i class="fas fa-compress-alt"></i>
                                    </a>
                                    <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                        <i class="las la-shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="absolute-top-left" style="margin-top: 70px;">
                                    <div class="bg-warning">
                                    <span class="badge  d-block"><i
                                        class="fas fa-shipping-fast "></i></span>
                                        <span class="badge d-block"><i
                                            class="fas fa-box-open"></i></span>
                                        </div>
                                </div>
                            </div>
                            <div class="p-md-2 p-2 text-center">
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                  <a href="{{route('product',$value->slug)}}"> {{$value->name}} </a> </h3>
                                <h3 class="fw-600 fs-13 text-truncate-2  mb-0 h-auto green-color" id="rating_section">
                                    <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                    <span><i class="fas fa-shipping-fast ml-1"></i></span>

                                </h3>

                                <div class="fs-11  product_text">
                                    <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                    <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> {{$value->unit_price}}</del>

                                    <span class="fw-600  cfs-13 green-color"> {{$value->discount}}% off </span>

                                </div>



                            </div>
                        </div>

                    </div>
                    @endforeach

                    @endforeach
                    @endif
                    @endforeach

            </div>
        </div>
    </section>
    @endif
    {{-- Category wise Products --}}
    <div id="section_home_categories">

    </div>

    {{-- Classified Product --}}
    @if (get_setting('classified_product') == 1)
        @php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')
                ->where('published', '1')
                ->take(10)
                ->get();
        @endphp
        @if (count($classified_products) > 0)
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                        <div class="d-flex mb-3 align-items-baseline top-product-border">
                            <h3 class="h5 fw-700 mb-0">
                                <span
                                    class="pb-3 d-inline-block">{{ translate('Classified Ads') }}</span>
                            </h3>
                            <a href="{{ route('customer.products') }}"
                                class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                        </div>
                        <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5"
                            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                            @foreach ($classified_products as $key => $classified_product)
                                <div class="carousel-box">
                                    <div
                                        class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                        <div class="position-relative">
                                            <a href="{{ route('customer.product', $classified_product->slug) }}"
                                                class="d-block">
                                                <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($classified_product->thumbnail_img) }}"
                                                    alt="{{ $classified_product->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                            <div class="absolute-top-left pt-2 pl-2">
                                                @if ($classified_product->conditon == 'new')
                                                    <span
                                                        class="badge badge-inline badge-success">{{ translate('new') }}</span>
                                                @elseif($classified_product->conditon == 'used')
                                                    <span
                                                        class="badge badge-inline badge-danger">{{ translate('Used') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15 mb-1">
                                                <span
                                                    class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}"
                                                    class="d-block text-reset">{{ $classified_product->getTranslation('name') }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif



    {{-- Banner Section 2 --}}
    @if (get_setting('home_banner3_images') != null)
        <div class="mb-4">
            <div class="container">
                <div class="row gutters-10">
                    @php $banner_3_imags = json_decode(get_setting('home_banner3_images')); @endphp
                    @foreach ($banner_3_imags as $key => $value)
                        <div class=" col-6 col-xl col-md-6">
                            <div class="mb-3 mb-lg-0">
                                <a href="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}"
                                    class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($banner_3_imags[$key]) }}"
                                        alt="{{ env('APP_NAME') }} promo" class="img-fluid border-radious-3 lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif



{{-- installation service text --}}
    <div class="mb-4">
        <div class="container ">
            <div class="row gutters-10 bg-white justify-content-center p-3 mt-1"style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%); border-radius:7px;  background-image: linear-gradient(to right, rgb(51, 161, 236), rgb(193, 36, 161), rgb(249, 112, 27));">
                <i class="fas fa-tools fa-2x mr-4"></i>
                <h4 class=""> Installation service Working Time 10:00 Am To 3:00 PM </h4>
            </div>
        </div>
    </div>

    <div class="mb-0">
        <div class="container-fluid">
            <div class="row gutters-5 bg-white">
                @foreach (json_decode(get_setting('site_map',[0
                ]), true) as $key => $value)
                <p class="p-3 fs-12">{!! $value !!}</p>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            // $.post('{{ route('home.section.best_selling') }}', {
            //     _token: '{{ csrf_token() }}'
            // }, function(data) {
            //     $('#section_best_selling').html(data);
            //       AIZ.plugins.slickCarousel();
            // });
            $.post('{{ route('home.section.auction_products') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            // $.post('{{ route('home.section.best_sellers') }}', {
            //     _token: '{{ csrf_token() }}'
            // }, function(data) {
            //     $('#section_best_sellers').html(data);
            //     AIZ.plugins.slickCarousel();
            // });
        });
    </script>

<script>
    // Set the date we're counting down to
    var d = new Date();

    var countDownDate = d.setHours(20);

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML =   + hours + " Hours : "
      + minutes + " Minutes :" + seconds + " Seconds ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>

@endsection
