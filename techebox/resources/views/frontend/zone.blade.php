@extends('frontend.layouts.app')

@section('content')

<div class="aiz-main-wrapper d-flex flex-column zone-body-color">
<div class="game-zone-1">
    <div class="fluid-container">
        <h5 class="text-center text-color-white zone-text pt-1">Welcome In Gammer Zone</h5>
    </div>
</div>
{{-- zone home slider --}}

<div class="home-banner-area  margin-bottem-10">


    <div class="fluid-container">
        <div class="row gutters-10 position-relative">


            <div class=" col-lg-12 ">
                <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true" data-infinite="true">
                    @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_slider_images')->where('zone_id',$zone->id)->first()) != null)
								{{-- @foreach (json_decode(get_setting('zone_slider_images'), true) as $key => $value) --}}
								@foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_slider_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_slider_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <div class="carousel-box">
                        <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{uploaded_asset($value)}}' alt="Rotech Ecom-site" height="315">
                    </div>
                    </a>
@endforeach
@endif

                </div>

            </div>



        </div>
    </div>
</div>

 <!-- multiple slider -->

 <div class="mb-4">
    <div class="home-banner-area" id="home-banner-area-zone">


        <div class="container">
            <div class="row gutters-10 position-relative">
                <div class="col-6 col-lg-6  ">
                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height zone-img-grab" data-arrows="false" data-dots="false" data-autoplay="true" data-infinite="true">
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload  banner_fit rounded shadow-sm" id="home-banner-zone" src='{{static_asset('/assets/img/sliders/01.jpg')}}' alt="Rotech Ecom-site" height="420" >
                        </div>
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" id="home-banner-zone" src='{{static_asset('/assets/img/sliders/02.jpg')}}' alt="Rotech Ecom-site" height="420">

                        </div>
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" id="home-banner-zone" src='{{static_asset('/assets/img/sliders/s1.jpg')}}' alt="Rotech Ecom-site" height="420">

                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-6   ">
                    <div class="row ">
                        <div class=" col-12">
                            <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height zone-img-grab" data-arrows="false" data-dots="false" data-autoplay="true" data-infinite="true">
                                <div class="carousel-box">
                                    <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/01.jpg')}}' alt="Rotech Ecom-site" height="200">
                                </div>
                                <div class="carousel-box">
                                    <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/02.jpg')}}' alt="Rotech Ecom-site" height="200">
                                </div>
                                <div class="carousel-box">
                                    <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/s1.jpg')}}' alt="Rotech Ecom-site" height="200">

                                </div>
                            </div>
                        </div>
                        <div class=" col-12 mt-3">
                            <div class="aiz-carousel  dots-inside-bottom mobile-img-auto-height zone-img-grab" data-arrows="false" data-dots="false" data-autoplay="true" data-infinite="true">
                                <div class="carousel-box">
                                    <img class="d-block mw-100  lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/01.jpg')}}' alt="Rotech Ecom-site" height="200">
                                </div>
                                <div class="carousel-box">
                                    <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/02.jpg')}}' alt="Rotech Ecom-site" height="200">
                                </div>
                                <div class="carousel-box">
                                    <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src='{{static_asset('/assets/img/sliders/s1.jpg')}}' alt="Rotech Ecom-site" height="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- today's top deals --}}

<section class="mb-5">
    <div class="container">

        <div class=" slider-padding ">

            <div class="d-flex flex-wrap  align-items-center  pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700 text-color-white">TODAY'S TOP DEAL </span>
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
                data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false'
                data-infinite='true'>

                @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_section3_products')->where('zone_id',$zone->id)->first()) != null)
                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_section3_products'), true))->get() as $key => $value)
                <div class="carousel-box  border-radious-3 hov-shadow-md ">
                    <div class="aiz-card-box s-back-1 hmy-2 has-transition " style="margin: 0 5px;">
                        <div class="position-relative">
                            <a href="{{'product',$value->slug}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px"
                                src="{{uploaded_asset($value->thumbnail_img)}}">
                            </a>

                            <div class="absolute-top-right aiz-p-hov-icon ">
                                <a href="" onclick="addToWishList(7)" data-toggle="tooltip" data-title="Add to wishlist"
                                    data-placement="left">
                                    <i class="la la-heart-o "></i>
                                </a>
                                <a href="" onclick="addToCompare(7)" data-toggle="tooltip" data-title="Add to compare"
                                    data-placement="left">
                                    <i class="fas fa-compress-alt"></i>
                                </a>
                                <a href="" onclick="showAddToCartModal(7)" data-toggle="tooltip"
                                    data-title="Add to cart" data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                <a href="{{route('product',$value->slug)}}">   {{$value->name}} </a>
                            </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-7 mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}} <i
                                        class="fas fa-star ml-1"></i></span>
                               <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i
                                        class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>
                                <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">{{$value->discount}}% off</span>

                            </div>
                       </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
{{-- sub categories --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Sub Categories
                                </span>

                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>

            </div>

           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_subcategory_categories')->where('zone_id',$zone->id)->first()) != null)
            @foreach (App\Models\SubCategory::whereIn('id',json_decode(get_setting('zone_subcategory_categories'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('products.subcategory',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{uploaded_asset($value->logo)}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                              </h3>




                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
{{-- small banner --}}

{{-- <div class="mb-4">
    <div class="container ">
        <div class="row gutters-10">
            <div class="col-12 col-xl col-md-12 ">
                @if (json_decode(App\Models\BusinessSetting ::where('type','zone_color_banners_images')->where('zone_id',$zone->id)->first()) != null)
                @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_color_banners_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)


                <div class="mb-3 mb-lg-0">

                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_color_banners_links')->where('zone_id',$zone->id)->first()->value)[$key]}} "><img src='{{uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid zone-banner-one lazyload" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)" width="100%" height="200px"></a>

                </div>
            </div>

            @endforeach
            @endif

        </div>
    </div>
</div> --}}

{{-- demo test slider --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center cs-border-bottom pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Demo Test
                                </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow pl-1 " data-items="6" data-xl-items="6"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
            data-infinite='true'>

            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_section3_products')->where('zone_id',$zone->id)->first()) != null)
            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_section3_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{uploaded_asset($value->thumbnail_img)}}'>
                            </a>
                            <div class="absolute-top-left pt-2 pl-2 pb-2">
                                <span class="badge badge-inline badge-success border-radious-5">{{$value->discount}}%</span>
                            </div>
                            <div class="absolute-top-left pt-4 pl-2">
                                <span class="badge badge-inline badge-danger mt-2 border-radious-5">New</span>
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
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                               <a href="{{route('product',$value->slug)}}">{{$value->name}}</a>
                            </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>
                                <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">{{$value->discount}}% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

{{-- gammer hi --}}

<section class="mb-4">

    <div class="container">
        <div class="delivery gammer border-radious-7">
            <div class="row ">
                @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_custome_highlights_images')->where('zone_id',$zone->id)->first()) != null)
                @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_custome_highlights_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)

                <div class="col-6 col-md-3  col-sm-2 bg-yellow">
                    <div class="">

                        <div class="row mt-2 mb-2 ">

                        <div class="delivery_item gammer_item">
                            <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_custome_highlights_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                            <img src='{{uploaded_asset($value)}}' class="" width="70" height="70">

                            <span >{{json_decode(App\Models\BusinessSetting ::where('type','zone_custome_highlights_heads')->where('zone_id',$zone->id)->first()->value)[$key]}}</span>
                            </a>
                        </div>

                        </div>

                    </div>
                </div>

                @endforeach
                @endif

            </div>
            <div class="game-bottom-delivery">

                <div class="bottom_itam col-auto">
                    <div class="row">
                      <div class="col-12 col-md-12 ">

                            <div class="py-4">
                                <span class="bottom-text-first text-center">About Zone </span>
                            </div>

                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- category slider --}}
@if ( json_decode(App\Models\BusinessSetting ::where('type','zone_section36_featured_categories')->where('zone_id',$zone->id)->first()) != null)
<section class="mb-4 ">
    <div class="container  p-0">

            <div class="section145">
                <div class="container bg-white border-radious-14 category-carousel">
                    <div class="row ">

                        <div class="col-md-12 ">
                            <div  class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>


                                @foreach (App\Models\Category::whereIn('id',json_decode(get_setting('zone_section36_featured_categories'), true))->get() as $key => $category)
                                <div class="item ">
                                    <a href="{{route('products.category',$category->slug)}}" class="category-item ">
                                        <div class="cate-img" >
                                            <img src="{{uploaded_asset($category->logo)}}" alt="">
                                        </div>
                                        <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                            <a href="{{route('products.category',$category->slug)}}">  <span class="fw-600 text-color-blackt left-text text-cat ">{{$category->name}}</span></a>

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
 @endif
{{-- <section class="mb-4">
    <div class="container">
        <div class="container">
            <div class="section145">
                <div class="container bg-white border-radious-14">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                            <div class="icon_slider mt-2 cate-slider owl-theme">
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/1.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Desktop</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/2.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Mouse</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/3.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Desk Gammer</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/4.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Consols</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Desk Gammer</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/6.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Consols</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Consols</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Desk Gammer</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Laptop</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item border-right-category">
                                    <a href="#" class="category-item ">
                                        <div class="cate-img">
                                            <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-blackt left-text">Laptop</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <div class="">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src='{{static_asset('/assets/img/category/5.png')}}' alt="">
                                            </div>
                                            <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text">Laptop</span>

                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}

{{-- computer and accessories --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center cs-border-bottom pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">COMPUTER & ACCESSARIES
                                </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow pl-1 " data-items="6" data-xl-items="6"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
            data-infinite='true'>
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_section11_products')->where('zone_id',$zone->id)->first()) != null)
            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_section11_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{uploaded_asset($value->thumbnail_img)}}'>
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
                            <a href="{{route('product',$value->slug)}}">
                                {{$value->name}}
                            </a>
                            </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign">{{home_discounted_base_price($value)}}</i> </span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>
                                <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">{{$value->discount}}% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

{{-- banner section --}}

<div class="mb-4">
    <div class="container">
        <div class="row gutters-10 ">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_banner2_images')->where('zone_id',$zone->id)->first()) != null)
            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_banner2_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-lg-12 col-4 col-xl-4 col-md-4 ">
                <div class="mb-3 mb-lg-0">
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_banner2_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <img src='{{ uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-3">
                    </a>
                </div>
            </div>
             @endforeach
             @endif

        </div>
    </div>
</div>

{{-- apple section --}}


<div id="section_best_sellers">
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3   ">
                <div class="small_slider  aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                    @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_section14_products')->where('zone_id',$zone->id)->first()) != null)
                    @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_section14_products'), true))->get() as $key => $value)
                    <div class="carousel-box">
                        <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition bg-white">
                            <div class="col-6">
                                <a href="{{route('product',$value->slug)}}" class="d-block p-3" tabindex="0">
                                    <img src="{{uploaded_asset($value->thumbnail_img)}}" alt="Wear Dreams" class="img-fluid lazyloaded">
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
                    @endif
                </div>
           </div>
        </div>
    </section>
</div>

{{-- small 6 banner --}}


<div class="mb-4">
    <div class="container">
        <div class="row gutters-10">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_banner_6_images')->where('zone_id',$zone->id)->first()) != null)
            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_banner_6_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-4 col-xl  col-md-3">
                <div class="mb-3 mb-lg-0">
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_banner_6_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <img src='{{ uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-3" width="200" height="200">
                    </a>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>

   {{-- deals of day slider --}}
   <section class="mb-4">

    <div class="container">


        <div class="mb-4">
            <div class="">
                <div class="g-deals_day_contain   ">
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
                                    <div class="deals_day aiz-carousel  half-outside-arrow " data-items="5" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>

                            @if (get_setting('zone_deals_of_day') != null)
                            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_deals_of_day'), true))->get() as $key => $value)
                                        <div class="carousel-box"  >
                                            <div class="aiz-card-box bg-white border border-light rounded hov-shadow-md my-2 has-transition">
                                                <div class="position-relative">
                                                    <a href="{{route('product',$value->slug)}}" class="d-block">
                                                        <img class="img-fit lazyload mx-auto h-140px h-md-210px" src='{{ uploaded_asset($value->thumbnail_img)}}'>
                                                    </a>

                                                </div>
                                                <div class="p-md-3 p-2 text-center">
                                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto paragraph-24 ">
                                                        <a href="{{route('product',$value->slug)}}">{{$value->name}}</a> </h3>
                                                    <h5 class="fw-600  text-truncate-2 lh-1-4 mb-0 h-auto fs-11">
                                                        {{$value->description}} </h5>




                                                    <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
                                                        <span class="rating">
                                                            <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                                        </span>
                                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}}<i class="fas fa-star ml-1"></i></span>


                                                    </h3>

                                                    <div class="fs-11 product_text">
                                                        <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                                        <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>

                                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> {{$value->discount}}% off </span>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
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

{{-- computer & accessories 2 --}}

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center cs-border-bottom pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">COMPUTER & ACCESSARIES
                                </span>
                                <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                            </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow pl-1 " data-items="6" data-xl-items="6"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
            data-infinite='true'>
            @if (json_decode(App\Models\BusinessSetting ::where('type','zone_computer_products')->where('zone_id',$zone->id)->first()) != null)
					@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_computer_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{uploaded_asset($value->thumbnail_img)}}">
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
                                <a href="{{route('product',$value->slug)}}">  {{$value->name}}</a>
                            </h3>
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}} <i class="fas fa-star ml-1"></i></span>
                                <span><i class="fas fa-shipping-fast ml-1"></i></span>

                            </h3>

                            <div class="fs-11 product_text">
                                <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($value)}}</span>
                                <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>
                                <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">{{$value->discount}}% off</span>

                            </div>



                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</section>

{{-- perfect box --}}

<div class="mb-4">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4 modile-sec">
                <div class="px-5 py-2 border border_box_zone g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition ml-4">
                        <div class="col-4 gammer_item_zone">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid  lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 head-zone text-color-white mt-1">
                                    Best For Gammers
                                </h2> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mobile-sec">
                <div class="px-5 py-2 border border_box_zone g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition ml-4">
                        <div class="col-4">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 head-zone text-color-white mt-1">
                                    Perfect For Xbox
                                </h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mobile-sec">
                <div class="px-5 py-2 border g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition ml-4">
                        <div class="col-4">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 text-color-white mt-1">
                                    Buy Games
                                </h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row gy-5 mt-3">
            <div class="col-lg-4 col-6">
                <div class="px-5 py-2 border border_box_zone g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition  ml-4">
                        <div class="col-4">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 head-zone text-color-white mt-1">
                                    For Profession
                                </h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="px-5 py-2 border border_box_zone g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition  ml-4">
                        <div class="col-4">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 head-zone text-color-white mt-1">
                                    Buy Games
                                </h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mobile-sec">
                <div class="px-5 py-2 border g-tab-bg-color">
                    <div class="row no-gutters box-3 align-items-center  my-2 has-transition  ml-4">
                        <div class="col-4">
                            <a href="" class="d-block p-3" tabindex="0">
                                <img src='{{static_asset('/assets/img/g-pad.png')}}' class="img-fluid lazyloaded">
                            </a>
                        </div>
                        <div class="col-8 ">
                            <div class="p-0 text-left">
                                <h2 class="h6 fw-600 text-color-white mt-1">
                                    For Profession
                                </h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- banner 3 --}}

<div class="mb-4">
    <div class="container">
        <div class="row gutters-10">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_wide_banners_images')->where('zone_id',$zone->id)->first()) != null)
            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_wide_banners_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-xl  col-md-12">
                <div class="mb-3 mb-lg-0">
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_wide_banners_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <img src='{{uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5" width="100%">
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

{{-- video section --}}

<div class="mb-4 mt-4">
    <div class="container video-iframe">
        <div class="row">
            @if (get_setting('video_link') != null)
								@foreach (json_decode(get_setting('video_link'), true) as $key => $value)
            <div class="col-md-6 col-12">
                <iframe class="responsive-iframe" src="https://www.youtube.com/embed/{{$value}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            @endforeach
            @endif
            <div class="col-md-6 col-12 h-md-450px pr-2" style="overflow-y: scroll">
            <div class="p-1 ">
                        <h2 class="fs-24 fw-800 mb-1">
                            <a href="" class="text-reset text-color-white">
                               <h4  class=" text-color-black"> T-Shirts Every Man Needs in His Wardrobe </h4>
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
                        </p>
                        <a href="" class="btn btn-soft-success">
                            View More
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

{{-- about zone --}}

<div class="mb-4 mt-2">
    <div class="container  " >

        <div class=" col-12 g-about text-center " id="zonebg">
            <div class="g-heading my-3">
                <h2 class="cfs-30 fw-900 text-color-white ">
                    About Zone
                </h2>
                <hr class="divider">
            </div>
            <div class="g-about para mt-3 my-5 ">

                <div class="container">
                    <div class=" text-justify">
                        <p class="opacity-70  fs-15 mb-4 text-color-white ab-text1">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="opacity-70  fs-15 mb-4 text-color-white ab-text1">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p class="opacity-70  fs-15 mb-4 text-color-white ab-text1">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- xiaomi section --}}

<div class="mb-4 xiaomi_section">
    <div class="container " >
        <div class="row bg-white" style="border-radius: 10px;margin-bottom:-30px;">
            <div class="col-6 col-sm-6 border-right-zone ">
                <div class="row">
                    <div class="col-6">
                        <div class="row margin-top-20">
                            <div class="col-3 ">
                                <div class="aiz-carousel product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                    <div class="carousel-box c-pointer border p-1 rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p11.jpg')}}'>

                                    </div>
                                    <div class="carousel-box c-pointer border p-1 rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p12.jpg')}}'>

                                    </div>

                                </div>
                            </div>
                            <div class="col-9">
                                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true'>
                                    <div class="carousel-box rounded">

                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p11.jpg')}}'>

                                    </div>
                                    <div class="carousel-box  rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p12.jpg')}}'>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="g-save" style="margin-top: -45px;">
                            <button type="button" class="btn btn-soft-secondary  add-to-cart fw-500">

                                <span class="">Save You</span>
                                <span class="" style="color: #17d600"> <i class="las la-rupee-sign"></i>18.000</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="g-product-desc py-4">
                            <h2 class="fw-800 text-truncate-2" style="font-size: 1.1rem;">Xiaomi Redmi 4x </h2>
                            <div class="fs-18">
                                <span class="rating">
                                    <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                </span>
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>

                            </div>

                            <div class="">
                                <span class="fw-700 text-color-black fs-21"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-500 fs-14 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                            </div>
                            <div class="mt-2">
                                <p class="fw-500 text-justify">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="mt-2 d-inline-block" style="margin-left: -10px">
                                <button type="button" class="btn btn-soft-secondary  add-to-cart fw-500" onclick="addToCart()">
                                    <i class="fas fa-box-open "></i>
                                    <span class=""> Add to cart</span>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fas fa-compress-alt"></i>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fa fa-share-alt"></i>
                                </button>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-6 col-sm-6">
                <div class="row">
                    <div class="col-6">
                        <div class="row margin-top-20">
                            <div class="col-3 ">
                                <div class="aiz-carousel product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                    <div class="carousel-box c-pointer border p-1 rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p11.jpg')}}'>

                                    </div>
                                    <div class="carousel-box c-pointer border p-1 rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p12.jpg')}}'>

                                    </div>

                                </div>
                            </div>
                            <div class="col-9">
                                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true'>
                                    <div class="carousel-box rounded">

                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p11.jpg')}}'>

                                    </div>
                                    <div class="carousel-box rounded">
                                        <img class="img-fluid lazyload" src='{{static_asset('/assets/img/products/p12.jpg')}}'>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="g-save" style="margin-top: -45px;">
                            <button type="button" class="btn btn-soft-secondary  add-to-cart fw-500">

                                <span class="">Save You</span>
                                <span class="" style="color: #17d600"> <i class="las la-rupee-sign"></i>18.000</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="g-product-desc py-4">
                            <h2 class="fw-800 text-truncate-2"  style="font-size: 1.1rem;">Xiaomi Redmi 4x</h2>
                            <div class="fs-18">
                                <span class="rating">
                                    <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                </span>
                                <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>

                            </div>

                            <div class="">

                                <span class="fw-700 text-color-black fs-21"> <i class="las la-rupee-sign"></i>18.000</span>
                                <del class="fw-500 fs-14 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                            </div>
                            <div class="mt-2">
                                <p class="fw-500 text-justify">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="mt-4 d-inline-block" style="margin-left: -10px">
                                <button type="button" class="btn btn-soft-secondary add-to-cart fw-500" onclick="addToCart()">
                                    <i class="fas fa-box-open "></i>
                                    <span class=""> Add to cart</span>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fas fa-compress-alt"></i>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-soft-secondary buy-now fw-500" onclick="buyNow()">
                                    <i class="fa fa-share-alt"></i>
                                </button>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- thoughts banner --}}

{{-- <div class="mb-4">
    <div class="container ">
        <div class="row m-15 p-5" id="row_banner">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_banner_4_images')->where('zone_id',$zone->id)->first()) != null)
                @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_banner_4_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-6 col-lg-4 col-md-4">
                <div class="">
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_banner_4_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <img src='{{ uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid zone-img-banner lazyload img-fit">
                    </a>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div> --}}

{{-- demo category section --}}

<section class="mb-4 mt-4">
    <div class="container">
        <div class="container">
            <div class="section145">
                <div class="slider-padding  bottom-border-radious-5">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                                <div class="item ">
                                    <a href="#" class="category-item rounded-circle s-back-1"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle s-back-2"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle  s-back-3 "  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item ">
                                    <a href="#" class="category-item rounded-circle  s-back-4"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle  s-back-5"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle  s-back-6"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle s-back-7"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#" class="category-item rounded-circle s-back-1"  style="margin: 0 5px;">
                                        <div class="cate-img mt-2">
                                            <img src='{{static_asset('/assets/img/mouse-slider.png')}}' alt="">
                                        </div>
                                        <div class="fs-15 text-center margin-bottem-10 margin-top-10">

                                            <span class="fw-600 text-color-black left-text">Demo</span>

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- console banner --}}

<div class="mb-4">
    <div class="container">
        <div class="row gutters-10">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_big_banners_images')->where('zone_id',$zone->id)->first()) != null)
            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_big_banners_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-xl  col-md-12">
                <div class="mb-3 mb-lg-0">
                    <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_big_banners_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                    <img src='{{uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5 img-fit">

                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>

 {{-- Top 10 Brands --}}

 <section class="mb-4">
    <div class="container">
        <div class="row gutters-10">
             <div class="col-lg-12">
                    <div class="d-flex mb-3 align-items-baseline top-product-border">
                        <h3 class="h5 fw-700 mb-0">
                            <span class=" pb-3 d-inline-block text-white">{{ translate('Top 10 Brands') }}</span>
                        </h3>
                        <a href="{{ route('brands.all') }}" class="ml-auto mr-0 btn btn-danger btn-sm shadow-md">{{ translate('View All Brands') }}</a>
                    </div>
                    <div class="row gutters-5">
                      @foreach (App\Models\Brand::whereIn('id',json_decode(get_setting('section23_brands'), true))->get() as $key => $brand)
                                <div class="col-sm-3">
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
                                                <div class="text-truncate-2 pl-3 fs-14 fw-600 text-dark text-left">{{ $brand->name }}</div>
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


{{-- best deals section --}}


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
                                <img class="img-fluid lazyloaded img-fit lazyload mx-auto h-140px h-md-290px " src="public/assets/img/products/left_img.png">
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
                                <div class="aiz-card-box   hov-shadow-md my-2 has-transition ">
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

{{-- simple slider --}}

{{-- <section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white border-radious-7">
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
            data-infinite='true'>
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_simple_products')->where('zone_id',$zone->id)->first()) != null)
            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_simple_products'), true))->get() as $key => $value)
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="{{route('product',$value->slug)}}" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{uploaded_asset($value->thumbnail_img)}}'>
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
                        <div class="p-md-3  text-md-left">
                            <h3 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                <a href="{{route('product',$value->slug)}}">{{$value->name}} </a> </h3>
                            <div class="fs-15 ">


                                <span class="rating mt-2">
                                    <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                    <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">{{$value->rating}}<i class="las la-star ml-1" style="color: white;"></i></span>
                                </span>

                            </div>
                            <div class="fs-11 product_text mt-1">
                                <span class="fw-700 text-color-blue fs-07"> <i class="las la-rupee-sign"></i> {{home_discounted_base_price($value)}}</span>
                                <del class="fw-700 opacity-60 pr-5"><i class="las la-rupee-sign "></i>{{$value->unit_price}}</del>


                            </div>
                            <a class="btn" href=" {{route('product',$value->slug)}}" style="margin-top: -3.125rem; margin-left:9rem;">
                                <span class="fw-900 fs-14   cfs-13 text-color-blue">
                                    <i class=" fas fa-long-arrow-alt-right "></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
                 @endforeach
                 @endif
            </div>
        </div>
    </div>
</section> --}}

{{-- two banners section --}}

<div class="mb-4">
    <div class="container">
    </div>
    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_banner_50_section_images')->where('zone_id',$zone->id)->first()) != null)
                            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_banner_50_section_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
                <div class="col-12 col-xl col-md-6">
                    <div class=" mb-3 mb-lg-0">
                        <a href="{{json_decode(App\Models\BusinessSetting ::where('type','zone_banner_50_section_links')->where('zone_id',$zone->id)->first()->value)[$key]}}">
                        <img src='{{uploaded_asset($value)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">
                        </a>
                    </div>
                </div>

                @endforeach
                @endif



            </div>
        </div>
    </div>

    {{-- you recently view --}}

<section class="mb-4">
    <div class="fluid-container">
        <div class="recently_viwed">
            <div class="row gutters-10">
                <div class="col-12 col-md-2 recently_left_text">
                    <div class="recently_div ">
                        <h4 class="align-item-center">
                            <i class="las la-history"></i>

                            You Recently
                        </h4>
                        <h4 class="c-mleft-31"> Viewed</h4>

                        <p class="c-mleft-31 text-color-white">See Your Full histery <i class="las la-angle-right"></i></p>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="deals_day aiz-carousel  half-outside-arrow p-0" data-items="5" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate d-block text-color-blue">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate d-block text-color-blue">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate d-block text-color-blue">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate d-block text-color-blue">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
                                        </div>
                                        <div class="fs-11 product_text ">

                                            <span class="fw-700 text-color-blue fs-07"><i class="las la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                            <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-box" style="width: 100%; display: inline-block;">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="col-4">
                                    <a href="" class="d-block p-3" tabindex="0">
                                        <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                    </a>
                                </div>
                                <div class="col-8 border-left border-light">
                                    <div class="p-3 text-left">
                                        <p class="text-color-black">Viewed</p>
                                        <h2 class="h6 fw-600 text-truncate-2 d-block text-color-blue">
                                            Mobile
                                        </h2>
                                        <div class="rating rating-sm mb-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
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
                <div class="col-0 col-md-1 d-none d-md-block">
                    <div class="carousel-box" style="width: 100%; display: inline-block;">
                        <div class="right-div-bg row no-gutters box-3 my-1 align-items-center   border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">

                            <div class="col-1 ">
                                <div class="p-3 text-left">
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

{{-- mobile banner section --}}

<div class="mb-4">
    <div class="container mobile-sec" style="width:100%;" >
        <div class="row">
            <div class="zone-second-sec">
                <div class="row bg-white p-4 border-radious-7">
                    <div class="col-lg-6 col-md-6  zone-border">
                        <div class="carousel-box  p-3">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="caorusel-card my-1" style="width: 100%; display: inline-block;">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <a href="#" class="d-block p-3">
                                                <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                            </a>
                                        </div>
                                        <div class="col-8 c-border-left">
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
                    <div class="col-lg-6 col-md-6 zone-border-one ">
                        <div class="carousel-box p-3">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="caorusel-card my-1" style="width: 100%; display: inline-block;">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <a href="#" class="d-block p-3">
                                                <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                            </a>
                                        </div>
                                        <div class="col-8 c-border-left">
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
                </div>
            </div>
        </div>
     </div>
</div>
<div class="mb-4">
    <div class="container ">
        <div class="row">
<div class="col-12 col-md-12 d-lg-none  zone-border ">
                        <div class="carousel-box zone-box">
                            <div class="row no-gutters box-3 align-items-center border border-light rounded hov-shadow-md my-2 has-transition best-seller-bg">
                                <div class="caorusel-card my-1" style="width: 100%; display: inline-block;">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-4">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="" class="d-block p-3" tabindex="0">
                                                    <img src='{{static_asset('/assets/img/products/m6.jpg ')}}' alt="Wear Dreams" class="img-fluid lazyloaded">
                                                </a>

                                                <div class="product-btns">
                                                    <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(30)" tabindex="0">
                                                        <i class="la la-heart-o"></i>
                                                    </button>
                                                    <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(30)" tabindex="0">
                                                        <i class="la la-refresh"></i>
                                                    </button>
                                                    <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(30)" tabindex="0">
                                                        <i class="la la-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-8 c-border-left border-light">
                                            <div class="p-3 text-left">
                                                <h2 class="h6 fw-600 text-truncate d-block">
                                                    Mobile
                                                </h2>
                                                <div class="rating rating-sm mb-2">
                                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                    <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.5 <i class="las la-star ml-1" style="color: white;"></i></span>
                                                </div>
                                                <div class="fs-15 product_text">

                                                    <span class="fw-700 text-secondary"><i class="las la-rupee-sign"></i> 1,548.00</span>
                                                    <del class="fw-600 opacity-50 pr-5"><i class="las la-rupee-sign"></i> 20.000</del>

                                                </div>
                                                <div class="fs-15">
                                                    <i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i>
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
{{-- compare product --}}

<div class="mb-4 comparepadding">
    <div class="container  ">
        <div class="row  justify-content-center  slider-padding bg-white   border-radious-7">
            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_compare')->where('zone_id',$zone->id)->first()) != null)
            @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('zone_compare'), true))->get() as $key => $value)
            <div class="col-5 col-md-5 justify-content-start ">
                <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true'>
                    <div class="carousel-box  rounded">
                        <img class="img-fluid compare-img lazyload" src='{{uploaded_asset($value->thumbnail_img)}}'>
                    </div>

                </div>
                <div class="g-product-desc py-5 text-center"  >
                    <h2 class="fw-800 compare-text text-truncate-2">{{$value->name}}</h2>
                        <div class="fs-18 mobile-sec">
                            <span class="rating">
                                <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                            </span>
                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">{{$value->rating}}<i class="las la-star ml-1" style="color: white;"></i></span>
                        </div>

                        <div class=" mobile-sec" >
                            <span class="fw-700 text-color-black fs-21"> <i class="las la-rupee-sign">{{home_discounted_base_price($value)}}</i> </span>
                            <del class="fw-500 fs-16 opacity-50 mr-1"><i class="las la-rupee-sign"></i>{{$value->unit_price}}</del>
                        </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="col-2 col-md-2 mt-6 "style="text-align: center; margin-top:10% ; ">
                <h2 class="fw-900 compare-text fs-24" > VS</h2>
            </div>


            <div class=""style="text-align:center;margin-top:-50px;">
            <button class="btn btn-xlg btn-danger compare-buttonmar">Compare Product</button>
        </div>
        </div>

    </div>
</div>
{{-- custome link --}}
<section class="mb-4">
<div class="container">
    <div class=" slider-padding bg-white   border-radious-7">
        <div class="row p-4">

            @if ( json_decode(App\Models\BusinessSetting ::where('type','zone_custome_links_images')->where('zone_id',$zone->id)->first()) != null)
            @foreach (json_decode(App\Models\BusinessSetting ::where('type','zone_custome_links_images')->where('zone_id',$zone->id)->first()->value) as $key => $value)
            <div class="col-6">
                <a href="{{ json_decode(App\Models\BusinessSetting ::where('type','zone_custome_links_links')->where('zone_id',$zone->id)->first()->value) [$key]}}">
                <img src='{{uploaded_asset($value)}}' alt="Wear Dreams" class="img-fluid lazyloaded border-radious-3" style="width:100%;height:200px;">


                <div class="text-center">
                   <span> <h6 class="fw-700 mt-2" >{{ json_decode(App\Models\BusinessSetting ::where('type','zone_custome_links_heads')->where('zone_id',$zone->id)->first()->value) [$key]}}</h6></span>
                </div>
                </a>
            </div>

            @endforeach
            @endif
        </div>

    </div>
</div>
</section>
        <!-- mobile phones -->
        <section class="mb-4">
            <div class="container">

                <div class=" slider-padding bg-white   border-radious-7">
                    <div class="col-md-12">

                    </div>
                    <div class="d-flex flex-wrap  align-items-center pb-1">

                        <h3 class="h5 fw-600 mb-0">
                            <div class="main-title-tt">
                                <div class="main-title-left">

                                    <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Mobiles Under Phones
                                    </span>
                                    <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                                </h4>

                                </div>

                            </div>


                        </h3>


                        <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>

                    </div>
                    <div class="nav border-bottom aiz-nav-tabs zone-word-wrap  bg-info mediaforblueline descktopforblueline">

                        <a href="#tab_default_1" data-toggle="tab" class="p-3 fs-16 fw-700 b-color active show text-color-white">Budget Laptops</a>
                        <a href="#tab_default_2" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">Best Mobile</a>
                        <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">New Launch</a>
                        <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">New Trend</a>
                        <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">New Launch</a>

                    </div>
                 <div class="aiz-carousel gutters-10 half-outside-arrow pl-1 " data-items="4" data-xl-items="4"
                    data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false'
                    data-infinite='false'>
                        <div class="carousel-box">
                            <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                                <div class="position-relative">
                                    <a href="#" class="d-block">
                                        <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{static_asset('/assets/img/products/a2.jpg')}}'>
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
                                        Soni 14s Core i3 10th Gen
                                    </h3>
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                        <span><i class="fas fa-shipping-fast ml-1"></i></span>

                                    </h3>

                                    <div class="fs-11 product_text">
                                        <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                        <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">40% off</span>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                                <div class="position-relative">
                                    <a href="#" class="d-block">
                                        <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{static_asset('/assets/img/products/a3.jpg')}}'>
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
                                        Soni 14s Core i3 10th Gen
                                    </h3>
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                        <span><i class="fas fa-shipping-fast ml-1"></i></span>

                                    </h3>

                                    <div class="fs-11 product_text">
                                        <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                        <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">40% off</span>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                                <div class="position-relative">
                                    <a href="#" class="d-block">
                                        <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{static_asset('/assets/img/products/a4.jpg')}}'>
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
                                        Soni 14s Core i3 10th Gen
                                    </h3>
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                        <span><i class="fas fa-shipping-fast ml-1"></i></span>

                                    </h3>

                                    <div class="fs-11 product_text">
                                        <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                        <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">40% off</span>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="carousel-box">
                            <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                                <div class="position-relative">
                                    <a href="#" class="d-block">
                                        <img class=" img-fit lazyload mx-auto  h-md-130px" src='{{static_asset('/assets/img/products/a5.jpg')}}'>
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
                                        Soni 14s Core i3 10th Gen
                                    </h3>
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto green-color" id="rating_section">
                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1"></i></span>
                                        <span><i class="fas fa-shipping-fast ml-1"></i></span>

                                    </h3>

                                    <div class="fs-11 product_text">
                                        <span class="fw-700 text-color-black fs-07"> <i class="las la-rupee-sign"></i>18.000</span>
                                        <del class="fw-600 opacity-50 mr-1"><i class="las la-rupee-sign"></i> 20.000</del>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">40% off</span>

                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


          <!-- scrollable banner -->
          <section class="mb-4 ">
            <div class="container">
                <div class="container">
                    <div class="section145">
                        <div class="container">
                            <div class="row ">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12 ">
                                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>

                                        <div class="item ">
                                            <div class="" style="margin: 0 5px;">
                                {{-- <div class="d1-first-heading">
                                    <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                                </div> --}}
                                <div class="d1-first-img text-center mt-5">
                                    <img src='{{static_asset('/assets/img/banners/Banner_1.png')}}' alt="" class="pt-3" style="width: 200px;height:400px;">
                                </div>
                            </div>
                                            </div>
                                            <div class="item ">
                                                <div class="d2-first-banner p-5" style="margin: 0 5px;">
                                    <div class="d1-first-heading">
                                        <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                                    </div>
                                    <div class="d1-first-img text-center mt-5">
                                        <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                                    </div>
                                </div>
                                                </div>

                                        <div class="item ">
                                        <div class="d3-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>
                                        <div class="item ">
                                        <div class="d4-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center ">Thoughts Related To Zone </h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>
                                        <div class="item ">
                                        <div class="d1-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>
                                        <div class="item ">
                                        <div class="d5-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone</h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>

                                        <div class="item ">
                                        <div class="d4-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>
                                        <div class="item ">
                                        <div class="d3-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone </h6>
                            </div>
                            <div class="d1-first-img text-center mt-5">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
                            </div>
                        </div>
                                        </div>
                                        <div class="item ">
                                        <div class="d2-first-banner p-5" style="margin: 0 5px;">
                            <div class="d1-first-heading">
                                <h6 class="text-color-white text-center">Thoughts Related To Zone</h6>
                            </div>
                            <div class="d1-first-img text-center mt-5" style="margin: 0 5px;">
                                <img src='{{static_asset('/assets/img/ps-1.png')}}' alt="" class="pt-3">
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

  <!-- under phone -->

<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700">Mobiles Under Phones
                            </span>
                            <p class="fs-10 fw-600 margin-top-4px text-color-grey">Tag Line Here is text</p>
                        </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>

            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="4" data-xl-items="4" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='false'>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-170px" src='{{static_asset('/assets/img/products/lap4.jpg')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-170px" src='{{static_asset('/assets/img/products/lap4.jpg')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-170px" src='{{static_asset('/assets/img/products/lap4.jpg')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-170px" src='{{static_asset('/assets/img/products/lap4.jpg')}}'>
                            </a>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

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
 <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="3" data-lg-items="3" data-md-items="3" data-sm-items="1" data-xs-items="1" data-arrows='false' data-infinite='true'>
                <div class="carousel-box ">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class="img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_1.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_2.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_1.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_2.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class=" my-2 ">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  feture-img h-md-270px" src='{{static_asset('/assets/img/banners/Banner_3.png')}}'>
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
