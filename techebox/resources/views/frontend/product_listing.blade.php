@extends('frontend.layouts.app')

@if (isset($category_id))
    @php
        $meta_title = \App\Models\Category::find($category_id)->meta_title;
        $meta_description = \App\Models\Category::find($category_id)->meta_description;
    @endphp
@elseif (isset($subcategory_id))
    @php
        $meta_title = \App\Models\SubCategory::find($subcategory_id)->meta_title;
        $meta_description = \App\Models\SubCategory::find($subcategory_id)->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = \App\Models\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Models\Brand::find($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')


    <div class="mb-4 pt-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-12 ">
                    <ul class="breadcrumb bg-white  " style="margin-bottom: -5px;">
                        <li class="breadcrumb-item opacity-50">
                            <i class="fas fa-home" style="margin-top: 2px; "></i> <a class="text-color-black ml-2" href="{{route('home')}}"> Home</a>
                        </li>
                        <li class="breadcrumb-item opacity-50">
                            <a class="text-color-black" href="">All Categories</a>
                        </li>
                        @if($category_id != null)
                        @php
                            $category = \App\Models\Category::find($category_id);
                        @endphp
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.category', $category->slug)}}">
                               {{ $category->name}}
                            </a>
                        </li>

                        @endif

                        @if($subcategory_id != null)
                        @php
                            $subcategory = \App\Models\SubCategory::find($subcategory_id);
                            $category = \App\Models\Category::find($subcategory->category_id);
                        @endphp
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.category', $category->slug)}}">
                               {{ $category->name}}
                            </a>
                        </li>
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.subcategory', $subcategory->slug)}}">
                               {{ $subcategory->name}}
                            </a>
                        </li>

                        @endif


                        @if($subsubcategory_id != null)
                        @php
                            $subsubcategory = \App\Models\SubSubCategory::find($subsubcategory_id);
                            $subcategory = \App\Models\SubCategory::find($subsubcategory->subcategory_id);
                            $category = \App\Models\Category::find($subcategory->category_id);
                        @endphp
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.category', $category->slug)}}">
                               {{$category->name}}
                            </a>
                        </li>
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.subcategory', $subcategory->slug)}}">
                                {{$subcategory->name}}
                            </a>
                        </li>
                        <li class="text-dark fw-600 breadcrumb-item">
                            <a class="text-color-black" href="{{route('products.subsubcategory', $subsubcategory->slug)}}">
                                {{$subsubcategory->name}}
                            </a>
                        </li>

                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <section class="mb-4 mobile-sec">
        <div class="container  p-0">

                <div class="section145">
                    <div class="container bg-white border-radious-14 category-carousel">
                        <div class="row ">

                            <div class="col-md-12 ">
                                <div  class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>

                                    @foreach ($subcategories as $category)
                                    <div class="item ">
                                        @if( $subcategory_id != null)
                                        <a href="{{route('products.subsubcategory', $category->slug)}}" class="category-item1 ">
                                            <div class="cate-img" >
                                                <img src="{{uploaded_asset($category->logo)}}" alt="" width="100px" height="100px">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat ">{{$category->name}}</span>

                                            </div>
                                        </a>
                                        @else

                                        <a href="{{route('products.subsubcategory', $category->slug)}}" class="category-item1 ">
                                            <div class="cate-img" >
                                                <img src="{{uploaded_asset($category->logo)}}" alt=""  width="100px" height="100px">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat ">{{$category->name}}</span>

                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


        </div>

    </section>

{{-- <section class="mb-4">
    <div class="container">
        <div class="container">
            <div class="section145">
                <div class="container  ">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="aiz-carousel gutters-10 half-outside-arrow mt-2  " data-items="6" data-xl-items="6"
                            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
                            data-infinite='true'>
                            @foreach ($subcategories as $category)


                                <div class="item   " >
                                    <div class="">
                                        @if( $subcategory_id != null)
                                        <a href="{{route('products.subsubcategory', $category->slug)}}" class="category-item ">
                                            <div class="cate-img d-flex">

                                                <img src='{{uploaded_asset($category->logo)}}'   alt="" />
                                                <div class="fw-600 text-color-black  left-text margin-top-10 ml-2">
                                                  {{$category->name}}
                                                </div>
                                            </div>

                                        </a>
                                        @else
                                        <a href="{{route('products.subcategory', $category->slug)}}" class="category-item ">
                                            <div class="cate-img d-flex">

                                                <img src='{{uploaded_asset($category->logo)}}'   alt="" />
                                                <div class="fw-600 text-color-black  left-text margin-top-10 ml-2">
                                                  {{$category->name}}
                                                </div>
                                            </div>

                                        </a>
                                        @endif

                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> --}}
<section class="mb-4 mobile-sec">
    <div class="container">

            <div class="col-md-12">

            </div>
             <div class="aiz-carousel gutters-10 half-outside-arrow " data-items="6" data-xl-items="7" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box  bg-white has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto mt-2 h-md-70px" src="{{static_asset('assets/img/Wireless.png')}}">
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                Laptop</h3>
                             </div>

                    </div>
                </div>
            </div>

    </div>
</section>
    <div class="home-banner-area  margin-bottem-10 mobile-sec">


        <div class="fluid-container">
            <div class="row gutters-10 position-relative">


                <div class=" col-lg-12 ">

                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-arrows="true" data-dots="true" data-autoplay="true" data-infinite="true" style="margin-left: -4PX;">
                       @php
                       if($category_id != null)
                       {
                        $category = \App\Models\Category::find($category_id);
                       }
                       elseif ($subcategory_id != null){
                        $category = \App\Models\SubCategory::find($subcategory_id);
                       }
                       elseif ($subsubcategory_id != null){
                        $category = \App\Models\SubSubCategory::find($subsubcategory_id);
                       }

                       @endphp

                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src="{{uploaded_asset( $category->section_1_banner_1)}}" alt="Rotech Ecom-site" height="315">
                        </div>
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src="{{uploaded_asset( $category->section_1_banner_2)}}" alt="Rotech Ecom-site" height="315">
                        </div>
                        <div class="carousel-box">
                            <img class="d-block mw-100 lazyload banner_fit rounded shadow-sm" src="{{uploaded_asset( $category->section_1_banner_3)}}" alt="Rotech Ecom-site" height="315">
                        </div>





                    </div>

                </div>



            </div>
        </div>
    </div>

    <div class="mb-4 bg-white prodetailsshadow mobile-sec">
        <div class="container ">



            <div class="d-flex flex-wrap  align-items-baseline top-product-border py-2">

                {{-- <img class="mt-3" src="{{uploaded_asset( $category->logo)}}" height="50px"; width="50px";  />

                <h3 class="h5 fw-600 mb-0 prodetail-best-deal">
                    <span class=" pb-3 d-inline-block"  >{{$category->name}}
                </h3> --}}
                <div class="col-3 d-inline-block">
                    <img class="mt-3" src="{{uploaded_asset( $category->logo)}}" height="50px"; width="50px";  />
                </div>
                <div class="col-4 mt-4" style="margin-left: -248px;" >
                   <h6><span class="fs-16 fw-700">{{$category->name}}</span></h6>

                </div>
            </div>
            <div class="fs-12">
                <p class=" fs-12 fw-300 text-center p-3 prodetail-passage"> http://localhost/Rotech/admin/catego ries/ eyJpdiI6 Ild5eU4xYz NiZ2dvc09Pb k1oT0k0OGc9PSIsInZh bHVlIjoiS2J3e mhUSktU a zZPa085 bFlMUlA5dz09Iiwib WFjIjoiNDQ4 N2ZmMDc 2N2EzYzQ3M2I5YTA3MWE 3MWVlM2 ZhNjllZDgxZjk5NGV mZTBiYzQ4ZDAyYjI 0MDI5ZDFhZ WYxMSJ9/edit;</p>
            </div>


        </div>
    </div>

    <div class="mb-4 mobile-sec">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-12 col-xl-12 col-md-12 ">
                    <div class="mb-3 mb-lg-0">
                        <img src='{{uploaded_asset( $category->main_banner)}}' alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="mb-4 pt-3 mobile-sec">
        <div class="container">

            <div class="row gutters-10">

                <div class="col-xl  col-md-6">
                    <div class="mb-3 mb-lg-0">
                        <img src="{{uploaded_asset( $category->section_1_banner_1)}}" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-xl  col-md-6">
                    <div class="mb-3 mb-lg-0">
                        <img src="{{uploaded_asset( $category->section_1_banner_2)}}" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-xl  col-md-6">
                    <div class="mb-3 mb-lg-0">
                        <img src="{{uploaded_asset( $category->section_1_banner_3)}}" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>
                <div class="col-xl  col-md-6">
                    <div class="mb-3 mb-lg-0">
                        <img src="{{uploaded_asset( $category->section_1_banner_1)}}" alt="Rotech Ecom-site" class="img-fluid lazyload border-radious-5">

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- sub categories --}}

    <section class="mb-4 mobile-sec">
        <div class="container">
            <div class="container">
                <div class="section145">
                    <div class="container bg-white border-radious-14 category-carousel">
                        <div class="row ">
                            <div class="col-md-12">

                            </div>
                            <div class="col-md-12 ">
                                <div  class="aiz-carousel  half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img" >
                                                <img src="public/assets/img/category/4.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat  ">Desktop</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="item ">
                                        <a href="#" class="category-item" >
                                            <div class="cate-img" >
                                                <img src="public/assets/img/category/2.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text">Laptop</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/5.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">
                                                <span class="fw-600 text-color-blackt left-text text-cat">Individual Parts</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <a href="#" class="category-item category-item_mob ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/5.png" alt="">

                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt d-flex left-text margin-top-10 text-cat ">Accesories & PeriPherals</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/3.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat">Mobile Phones</span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/6.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat">Tablets</span>

                                            </div>
                                        </a>
                                    </div>

                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/1.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat">Smart Device & Wearable Tech
                                                </span>

                                            </div>
                                        </a>
                                    </div>
                                    <div class="item ">
                                        <a href="#" class="category-item ">
                                            <div class="cate-img">
                                                <img src="public/assets/img/category/1.png" alt="">
                                            </div>
                                            <div class="fs-14 text-center margin-bottem-10 margin-top-10">

                                                <span class="fw-600 text-color-blackt left-text text-cat">Mobile & Tablet Accesories
                                                </span>

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
{{-- <section class="mb-4">
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
                <!--<a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto">View More</a>-->
            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="6" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>

                @foreach($subcategories as $subcategory)

                <div class="carousel-box">
                    <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block">
                                <img class=" img-fit lazyload mx-auto  h-md-130px" width="130px" src='{{uploaded_asset( $subcategory->logo)}}'>
                            </a>

                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-600 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                               {{$subcategory->name}} </h3>




                        </div>
                    </div>
                </div>

                @endforeach




            </div>
        </div>
    </div>
</section> --}}

    <section class="mb-4 mobile-sec">
        <div class="container">

            <div class=" slider-padding bg-white   border-radious-7">
                <div class="col-md-12">

                </div>
                <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Featured Products</span>
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
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap6.jfif')}}">
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
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    Soni 14s Core i3 10th Gen </h3>
                                <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap7.jfif')}}">
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
    <section class="mb-4 mobile-sec">
        <div class="container">

            <div class=" slider-padding bg-white   border-radious-7">
                <div class="col-md-12">

                </div>
                <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Demo 2</span>
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
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap5.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap6.jfif')}}">
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
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    Soni 14s Core i3 10th Gen </h3>
                                <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap7.jfif')}}">
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



    <section class="mb-4 mobile-sec">
        <div class="container">

            <div class=" slider-padding bg-white   border-radious-7">
                <div class="col-md-12">

                </div>
                <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Demo 2</span>
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
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    Soni 14s Core i3 10th Gen
                                    Soni 14s Core i3 10th Gen
                                    Soni 14s Core i3 10th Gen
                                    Soni 14s Core i3 10th Gen
                                    Soni 14s Core i3 10th Gen</h3>
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
                    <div class="carousel-box">
                        <div class="aiz-card-box hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap4.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap5.jpg')}}">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap6.jfif')}}">
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
                                <h3 class="fw-700 fs-11 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    Soni 14s Core i3 10th Gen </h3>
                                <h3 class="fw-600 fs-13 text-truncate-2 mb-0 h-auto green-color" id="rating_section">
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
                    <div class="carousel-box">
                        <div class="aiz-card-box  hov-shadow-md my-2 has-transition">
                            <div class="position-relative">
                                <a href="#" class="d-block">
                                    <img class=" img-fit lazyload mx-auto  h-md-130px" src="{{static_asset('assets/img/products/lap7.jfif')}}">
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
   {{-- Top 10 Brands --}}

 <section class="mb-4 mobile-sec">
    <div class="container">
        <div class=" slider-padding bg-white   border-radious-7">
        <div class="row gutters-10">
             <div class="col-lg-12">
                    <div class="d-flex mb-3 align-items-baseline top-product-border">
                        <h3 class="h5 fw-700 mb-0">
                            <span class=" pb-3 d-inline-block text-dark">{{ translate('Top 10 Brands') }}</span>
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
    </div>
</section>

    <!-- under phone -->

<section class="mb-4 mobile-sec">
    <div class="container">

        <div class=" slider-padding  border-radious-3 mobile_under">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="mediya-h4"> <span class=" pb-3 fw-700 text-white">Mobiles Under Phones
                            </span>
                            <p class="fs-10 fw-600 margin-top-4px text-white">Tag Line Here is text</p>
                        </h4>

                        </div>

                    </div>


                </h3>


                <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>

            </div>




            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='false' data-infinite='true'>
                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>

                <div class="carousel-box">
                    <div class="aiz-card-box bg-white p-4 hov-shadow-md my-2 has-transition">
                        <div class="position-relative">
                            <a href="#" class="d-block text-center">
                                <h3 class="fw-500 fs-18 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                    <i class="las la-rupee-sign"></i> 5000- </h3>
                                    <h3 class="fw-700 fs-20 text-truncate-2 lh-1-4 mb-0 h-auto color-change">
                                        <i class="las la-rupee-sign"></i>  15,000 </h3>
                            </a>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
    <section class="mb-4 pt-3" style="padding-top: 2rem !important;">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="#" method="GET">

                <div class="row">

                    <div class="col-xl-3" style="max-width: 23%;">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3">
                                    <h3 class="h6 mb-0 fw-600">Filters</h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" type="button">
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>
                                <div class="container">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="d-flex cs-border-bottom-1px  justify-content-between">
                                                <div class="">
                                                    <div class="card-header" id="heading7">
                                                        <h5 class="mb-0">
                                                            <button class="btn " type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                                                <div class="accordion-heading">
                                                                    <span class="pr-2"><i class="fa" aria-hidden="true"></i></span>
                                                                    <a href="#collapse7" data-toggle="collapse" class="accordion-toggle collapsed text-color-black"> 7 </a>
                                                                </div>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <a href="#" class=" fs-11 text-dark"> Clear All </a>
                                                </div>
                                            </div>

                                            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="p-1">
                                                        <div class="aiz-checkbox-list">
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" name="attribute_1[]" value="M">
                                                                <span class="aiz-square-check"></span>
                                                                <span>Ford</span>
                                                            </label>
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" name="attribute_1[]" value="L">
                                                                <span class="aiz-square-check"></span>
                                                                <span>Chevrolet</span>
                                                            </label>
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" name="attribute_1[]" value="XL">
                                                                <span class="aiz-square-check"></span>
                                                                <span>Audi</span>
                                                            </label>
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" name="attribute_1[]" value="S">
                                                                <span class="aiz-square-check"></span>
                                                                <span>Audi</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">

                                            <div class="card-header cs-border-bottom-1px " id="headingOne">
                                                <h5 class="mb-0">

                                                    <button class="btn " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                                        <div class="accordion-heading">
                                                            <span class="pr-2"><i class="fa" aria-hidden="true"></i></span>
                                                            <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed text-color-black"> Categories </a>

                                                        </div>

                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="p-1">
                                                        <ul class="list-unstyled">
                                                            @if($subsubcategory_id != null)
                                                            <li class="mb-2  ">
                                                                <a class="text-secondary fs-14 fw-600" href="{{route('products.category',$category->parent->parent->slug)}} ">
                                                                    <i class="las la-angle-left"></i>
                                                                    {{$category->parent->parent->name}}
                                                                </a>
                                                            </li>
                                                            <li class="mb-2  ">
                                                                <a class="text-secondary fs-14 fw-600" href="{{route('products.subcategory',$category->parent->slug)}} ">
                                                                    <i class="las la-angle-left"></i>
                                                                    {{$category->parent->name}}
                                                                </a>
                                                            </li>
                                                            @endif
                                                            @if($subcategory_id != null )
                                                            <li class="mb-2  ">
                                                                <a class="text-secondary fs-14 fw-600" href="{{route('products.category',$category->parent->slug)}} ">
                                                                    <i class="las la-angle-left"></i>
                                                                    {{$category->parent->name}}
                                                                </a>
                                                            </li>

                                                            @endif
                                                            <li class="mb-2 active">
                                                                <a class="text-color-black fs-14 fw-600" href="#">
                                                                    <i class="las la-angle-left"></i>
                                                                    {{$category->name}}
                                                                </a>
                                                                <ul>

                                                                    @foreach($subcategories as $subcategory)
                                                            <li class="ml-4 mt-1">
                                                                @if($category_id != null)
                                                                <a class="text-color-light fs-13 fw-400" href="{{route('products.subcategory',$subcategory->slug)}}">

                                                                   {{$subcategory->name}}
                                                                </a>
                                                                @else
                                                                <a class="text-color-light fs-13 fw-400" href="{{route('products.subsubcategory',$subcategory->slug)}}">

                                                                   {{$subcategory->name}}
                                                                </a>
                                                             @endif
                                                            </li>
                                                            @endforeach
                                                                </ul>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card ">
                                            <div class="d-flex  justify-content-between cs-border-bottom-1px">
                                                <div class="">
                                                    <div class="card-header " id="headingTwo">
                                                        <h5 class="mb-0">

                                                            <button class="btn " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                                                                <div class="accordion-heading">
                                                                    <span class="pr-2"><i class="fa" aria-hidden="true"></i></span>
                                                                    <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed text-color-black"> Brands </a>


                                                                </div>

                                                            </button>
                                                        </h5>

                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <a href="#" class=" fs-11 text-dark"> Clear </a>
                                                </div>
                                            </div>

                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="p-1">
                                                        <div class="aiz-checkbox-list">
                                                            @php
                                                            $brand_array = [];
                                                            foreach($products as $p){
                                                                array_push($brand_array,$p->brand);

                                                            }
                                                        @endphp
                                                         {{-- <label>{{json_encode(array_unique($b))}}</label> --}}

                                                         @foreach (array_unique($brand_array) as $item)
                                                         <label class="aiz-checkbox">
                                                            <input type="checkbox" name="attribute_1[]" value="M">
                                                            <span class="aiz-square-check"></span>
                                                            <span>{{$item->name}}</span>
                                                        </label>
                                                         @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="d-flex  justify-content-between cs-border-bottom-1px">
                                                <div class="">
                                                    <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0">

                                                            <button class="btn " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">

                                                                <div class="accordion-heading">
                                                                    <span class="pr-2">
                                                                        <i class="fa" aria-hidden="true"></i></span>
                                                                    <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed text-color-black"> Filter by color </a>

                                                                </div>

                                                            </button>
                                                        </h5>

                                                    </div>
                                                </div>
                                                <div class="p-3">
                                                    <a href="#" class=" fs-11 text-dark"> Clear </a>
                                                </div>
                                            </div>

                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="p-1">
                                                        <div class="aiz-radio-inline">
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="AliceBlue">
                                                                <input type="radio" name="color" value="#F0F8FF" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #F0F8FF;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Black">
                                                                <input type="radio" name="color" value="#000000" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #000000;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Blue">
                                                                <input type="radio" name="color" value="#0000FF" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #0000FF;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Honeydew">
                                                                <input type="radio" name="color" value="#F0FFF0" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #F0FFF0;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightCyan">
                                                                <input type="radio" name="color" value="#E0FFFF" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #E0FFFF;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightYellow">
                                                                <input type="radio" name="color" value="#FFFFE0" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFFE0;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="MidnightBlue">
                                                                <input type="radio" name="color" value="#191970" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #191970;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Brown">
                                                                <input type="radio" name="color" value="#A52A2A" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #A52A2A;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Cornsilk">
                                                                <input type="radio" name="color" value="#FFF8DC" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FFF8DC;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DimGray">
                                                                <input type="radio" name="color" value="#696969" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #696969;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="FloralWhite">
                                                                <input type="radio" name="color" value="#FFFAF0" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFAF0;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Amethyst">
                                                                <input type="radio" name="color" value="#9966CC" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #9966CC;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="AntiqueWhite">
                                                                <input type="radio" name="color" value="#FAEBD7" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FAEBD7;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Crimson">
                                                                <input type="radio" name="color" value="#DC143C" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #DC143C;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkBlue">
                                                                <input type="radio" name="color" value="#00008B" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #00008B;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkGreen">
                                                                <input type="radio" name="color" value="#006400" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #006400;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Aqua">
                                                                <input type="radio" name="color" value="#00FFFF" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #00FFFF;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Aquamarine">
                                                                <input type="radio" name="color" value="#7FFFD4" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #7FFFD4;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightGrey">
                                                                <input type="radio" name="color" value="#D3D3D3" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #D3D3D3;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Navy">
                                                                <input type="radio" name="color" value="#000080" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #000080;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="White">
                                                                <input type="radio" name="color" value="#FFFFFF" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFFFF;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BurlyWood">
                                                                <input type="radio" name="color" value="#DEB887" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #DEB887;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="CadetBlue">
                                                                <input type="radio" name="color" value="#5F9EA0" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #5F9EA0;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="LightSteelBlue">
                                                                <input type="radio" name="color" value="#B0C4DE" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #B0C4DE;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Red">
                                                                <input type="radio" name="color" value="#FF0000" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FF0000;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="RoyalBlue">
                                                                <input type="radio" name="color" value="#4169E1" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #4169E1;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="SlateGray">
                                                                <input type="radio" name="color" value="#708090" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #708090;"></span>
                                                                </span>
                                                            </label>
                                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="Yellow">
                                                                <input type="radio" name="color" value="#FFFF00" onchange="filter()">
                                                                <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                    <span class="size-30px d-inline-block rounded" style="background: #FFFF00;"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card price_card" style="margin:15px;">
                                    <div class="bg-white shadow-sm rounded mb-3 ">

                                        <div class="fs-14 fw-400 p-3 cs-border-bottom-1px ">
                                            <span><a class="text-color-black"> Price range</a> </span>
                                        </div>

                                        <div class="p-3">

                                            <div class="price-slider">
                                                <span>Min <input type="number" value="{{$min_price}}" name="min-price" min="0" max="120000"  />
                                                    to<input type="number" value="50000"   min="0" max="120000" />Max</span>
                                                <input value="25000" min="0" max="120000" step="500" type="range" />
                                                <input value="50000" min="0" max="120000" step="500" type="range" />
                                                <svg width="100%" height="24">
                                                    <line x1="0" y1="0" x2="220" y2="0" stroke="#212121" stroke-width="5" stroke-dasharray="1 28"></line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
                                <script src="function.js"></script>
                                <script>
                                    (function() {

                                        var parent = document.querySelector(".price-slider");
                                        if (!parent) return;

                                        var
                                            rangeS = parent.querySelectorAll("input[type=range]"),
                                            numberS = parent.querySelectorAll("input[type=number]");

                                        rangeS.forEach(function(el) {
                                            el.oninput = function() {
                                                var slide1 = parseFloat(rangeS[0].value),
                                                    slide2 = parseFloat(rangeS[1].value);

                                                if (slide1 > slide2) {
                                                    [slide1, slide2] = [slide2, slide1];
                                                }

                                                numberS[0].value = slide1;
                                                numberS[1].value = slide2;

                                                filter();
                                            }
                                        });

                                        numberS.forEach(function(el) {
                                            el.oninput = function() {
                                                var number1 = parseFloat(numberS[0].value),
                                                    number2 = parseFloat(numberS[1].value);

                                                if (number1 > number2) {
                                                    var tmp = number1;
                                                    numberS[0].value = number2;
                                                    numberS[1].value = tmp;
                                                }

                                                rangeS[0].value = number1;
                                                rangeS[1].value = number2;

                                            }
                                        });

                                    })();
                                </script>



                             @foreach($category->attributes as $attribute)
                                <div class="card" style="margin: 20px;">
                                    <div class="d-flex  justify-content-between cs-border-bottom-1px">
                                        <div class="">
                                            <h5 class="mb-0">

                                                <button class="btn " type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">

                                                    <div class="accordion-heading">
                                                        <span class="pr-2">
                                                            <i class="fa" aria-hidden="true"></i></span>
                                                        <a href="#collapse4" data-toggle="collapse" class="accordion-toggle collapsed text-color-black"> {{$attribute->parent->name}} </a>



                                                    </div>

                                                </button>
                                            </h5>
                                        </div>

                                        <div class="p-3">
                                            <a href="#" class=" fs-11 text-dark"> Clear </a>
                                        </div>
                                    </div>

                                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="p-1">



                                                <div class="aiz-checkbox-list">
                                                    @foreach ($attribute->parent->attribute_values as $item)
                                                  <label class="aiz-checkbox">
                                                    <input type="checkbox" name="attribute_1[]" value="M" onchange="filter()">
                                                    <span class="aiz-square-check"></span>
                                                    <span>{{$item->value}}</span>
                                                </label>
                                                  @endforeach



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              @endforeach



                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-12">
                         <div class="text-left">
                            <div class="d-flex  align-items-center bg-white cs-border-bottom-1px " style="height: 80px;  border-radius:3px;">
                                <div class="">
                                    <h1 class="h6 fw-600 w-300px  fs-20 d-inline-block ml-3 " style="margin-top: 5px!important;   ">
                                        Iphone Mobiles
                                    </h1>
                                </div>
                                <div class="form-group w-200px ml-0 ml-xl-3 d-flex ">
                                    <label class="mb-0 mt-4 mr-4  opacity-50" style="  clear: both;
                                    display: inline-block;
                                    white-space: nowrap;">Sort by</label>
                                    <select class="form-control form-control-sm aiz-selectpicker mt-3">
                                        <option value="newest" class ="text-dark">Newest</option>
                                        <option value="oldest" class ="text-dark">Oldest</option>
                                        <option value="price-asc">Price low to high</option>
                                        <option value="price-desc">Price high to low</option>
                                    </select>
                                </div>

                                <div class="form-group w-200px ml-0 ml-xl-3 mt-3">

                                    <ul id="filter-tabs" class="nav nav-tabs ">
                                        <li class=""> <a class="active" data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large mr-1"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list mr-1"></i>List</a></li>

                                    </ul>
                                </div>
                                <div class="d-xl-none ml-auto ml-xl-3 mr-0 form-group align-self-end ">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x filter_mob"></i>
                                    </button>
                                </div>
                                <div class="form-group ml-auto mr-0 w-250px d-block d-xl-block product_text">

                                    <div class="switch-holder bg-warning" style="margin-top: 50px; margin-right:43px;">
                                        <div class="switch-label d-flex">
                                            <i class="fas fa-truck mt-1"></i><label class="mb-0 fw-600 d-inline-block text-color-black">On Day Delivery <i class="fas fa-info-circle fa-1x " data-toggle="tooltip" data-placement="top" title="on day delivery" href="#"></i></label>
                                        </div>
                                        <!-- Default checked -->
                                        <div class="custom-control custom-switch ">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" >
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="search-result-container mt-4 ">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">

                                        @foreach ($products as $product)
                                        <div class="col mb-3">

                                            <div class="aiz-card-box h-100 border border-light rounded shadow-sm hov-shadow-md has-transition bg-white">
                                                <div class="position-relative">
                                                    <div class="absolute-top-left pt-4 ml-3" style="top: -13px; left:-5px;">
                                                        <span class="badge badge-inline badge-success">Best Sell</span>
                                                    </div>
                                                    <a href="{{route('product',$product->slug)}}" class="d-block p-3" tabindex="0">
                                                        <img src=" {{uploaded_asset( $product->thumbnail_img)}} " alt="Wear Dreams" class="img-fluid lazyloaded c-object-fit">
                                                    </a>
                                                    <div class="absolute-top-right aiz-p-hov-icon">
                                                        <a href="javascript:void(0)" onclick="addToWishList(163)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                            <i class="la la-heart-o"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                            <i class="fas fa-compress-alt"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" onclick="showAddToCartModal(163)" data-toggle="tooltip" data-title="Add to cart" data-placement="left">
                                                            <i class="las la-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="absolute-top-left" style="margin-top: 70px;">
                                                    <div class="bg-warning ml-2">
                                                    <span class="badge  d-block"><i
                                                        class="fas fa-shipping-fast "></i></span>
                                                        <span class="badge d-block"><i
                                                            class="fas fa-box-open"></i></span>
                                                        </div>
                                                </div>
                                                <div class="p-md-3 p-2 text-left">


                                                    <h3 class="fw-700 fs-16 text-truncate-2 lh-1-4 mb-0">
                                                        <a href="{{route('product',$product->slug)}}" class="d-block text-color-black color-change">{{$product->name}}</a>
                                                    </h3>
                                                    <div class="d-flex justify-content-start rating rating-sm mt-1" style="font-size: 15px;">
                                                        {{-- <i class='las la-star'></i>
                                                        <i class='las la-star'></i>
                                                        <i class='las la-star'></i>
                                                        <i class='las la-star'></i>
                                                        <i class=' star-half'></i> --}}
                                                        <span class="c-badge  badge-inline   c-badge-pill badge-success">{{$product->rating}}<i class="fas fa-star fs-8 ml-1 text-white" aria-hidden="true"></i></span>
                                                    </div>
                                                    <div class="">
                                                        @if($product->discount)
                                                            <span class="fw-700 text-color-black fs-16"> <i class="las la-rupee-sign"></i>{{home_discounted_base_price($product)}}</span>
                                                            <del class="fw-600 opacity-50 mr-1 cfs-16"><i class="las la-rupee-sign"></i>{{$product->unit_price}}</del>
                                                            @if($product->discount_type == 'amount')
                                                            <span class="fw-400 ml-1 fs-11 text-color-white c-badge-pill badge-success px-1">  {{$product->discount}} OFF </span>
                                                            @else
                                                            <span class="fw-400 ml-1 fs-11 text-color-white c-badge-pill badge-success px-1">  {{$product->discount}}% OFF </span>
                                                            @endif
                                                        @else
                                                        <span class="fw-700 text-color-black fs-16"> <i class="las la-rupee-sign"></i>{{$product->unit_price}}</span>
                                                         @endif
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                         @endforeach






                                    </div>

                                </div>

                                <!-- /.tab-pane -->

                                <div class="tab-pane " id="list-container">
                                    <div class="category-product mb-3">
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">


                                                    <div class="row no-gutters box-3 aiz-card-box border border-light rounded hov-shadow-md  has-transition product-list-row bg-white">

                                                        <div class="col-3 position-relative">
                                                            <div class="absolute-top-left pt-4 ml-3" style="top: -13px; left:-5px;">
                                                                <span class="badge badge-inline badge-success">Best Sell</span>
                                                            </div>
                                                            <a href="" class="d-block p-3" tabindex="0">
                                                                <img src=" {{static_asset('assets/img/products/m6.jpg')}} " alt="Wear Dreams" class="img-fluid ls-is-cached lazyloaded">
                                                            </a>
                                                            <div class="absolute-top-right aiz-p-hov-icon">
                                                                <a href="javascript:void(0)" onclick="addToWishList(163)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left" data-original-title="" title="">
                                                                    <i class="la la-heart-o"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                                    <i class="fas fa-compress-alt" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" onclick="showAddToCartModal(163)" data-toggle="tooltip" data-title="Add to cart" data-placement="left" data-original-title="" title="">
                                                                    <i class="las la-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="col-9 bg-white" style="margin-top: 10px;">
                                                            <div class=" text-left mt-3">
                                                                <div class="row bg-white ml-1">
                                                                    <div class="col-9">
                                                                        <h2 class="h6 fw-600 text-truncate-2">
                                                                            <a href="" class="text-color-black " tabindex="0">APPLE iPhone 11 (White, 64 GB) </a>
                                                                        </h2>
                                                                        <div class="rating rating-sm mb-1" style="font-size: 15px;">
                                                                            <i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <p class="opacity-70 mb-0">64GB
                                                                            32gn RAM
                                                                            11.94cm display with HD Display
                                                                             A13 Bionic chip with 3rd gen processor
                                                                            Fast Charging port
                                                                           Water Prof resistant </p>

                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="fs-24">
                                                                            <span class="fw-700 text-color-black fs-24"> <i class="las la-rupee-sign"></i>18.000</span>
                                                                        </div>
                                                                        <div class="">

                                                                            <del class="fw-600 opacity-50 mr-1 ml-1 fs-14 "><i class="las la-rupee-sign"></i> 20.000</del>

                                                                            <span class="fw-400  ml-1 fs-11 text-color-white c-badge-pill badge-success px-1"> 40% off </span>

                                                                        </div>
                                                                        <div class="mt-5 ml-1 d-block" style="margin-top: 1rem !important;">
                                                                            <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                                                 <span class="badge badge-warning mb-2"  style="width: 100px;"> <i class="fas fa-shopping-cart fa-lg"></i></span></a>

                                                                                 <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                                            <span class="badge badge-success mb-2"  style="width: 100px;"> <i class="fas fa-compress-alt fa-lg" aria-hidden="true"></i></span></a>

                                                                            <a href="javascript:void(0)" onclick="showAddToCartModal(163)" data-toggle="tooltip" data-title="Add to cart" data-placement="left" data-original-title="" title="">
                                                                            <span class="badge badge-primary mb-2"  style="width: 100px;">  <i class="fa fa-heart fa-lg"></i></span></a>


                                                                        </div>
                                                                        <div class="absolute-top-left" style="margin-top: 70px; margin-left:80%;">
                                                                            <div class="bg-warning">
                                                                            <span class="badge  d-block"><i
                                                                                class="fas fa-shipping-fast "></i></span>
                                                                                <span class="badge d-block"><i
                                                                                    class="fas fa-box-open"></i></span>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mt-4">
                                                                        <div class="row">
                                                                            <div class="col-9">


                                                                            </div>
                                                                                                     </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <!-- /.products -->
                                        </div>



                                    </div>
                                    <div class="category-product mb-3">
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">


                                                    <div class="row no-gutters box-3 aiz-card-box border border-light rounded hov-shadow-md  has-transition product-list-row bg-white">
                                                        <div class="col-3 position-relative">
                                                            <div class="absolute-top-left pt-4 ml-3"style="top: -13px; left:-5px;">
                                                                <span class="badge badge-inline badge-success">Best Sell</span>
                                                            </div>
                                                            <a href="" class="d-block p-3" tabindex="0">
                                                                <img src=" {{static_asset('assets/img/products/m6.jpg')}} " alt="Wear Dreams" class="img-fluid ls-is-cached lazyloaded ">
                                                            </a>
                                                            <div class="absolute-top-right aiz-p-hov-icon">
                                                                <a href="javascript:void(0)" onclick="addToWishList(163)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left" data-original-title="" title="">
                                                                    <i class="la la-heart-o"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                                    <i class="fas fa-compress-alt" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" onclick="showAddToCartModal(163)" data-toggle="tooltip" data-title="Add to cart" data-placement="left" data-original-title="" title="">
                                                                    <i class="las la-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-9 bg-white" style="margin-top:10px;  ">
                                                            <div class=" text-left mt-3">
                                                                <div class="row bg-white ml-1">
                                                                    <div class="col-9  ">
                                                                        <h2 class="h6 fw-600 ">
                                                                            <a href="" class="text-color-black" tabindex="0">APPLE iPhone 11 (White, 64 GB)</a>
                                                                        </h2>
                                                                        <div class="rating rating-sm mb-1" style="font-size: 15px;">
                                                                            <i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i><i class="las la-star"></i> <span class="c-badge  badge-inline fs-10  c-badge-pill badge-success">4.3 <i class="fas fa-star ml-1" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <p class="opacity-70 mb-0">64GB
                                                                         32gn RAM
                                                                         11.94cm display with HD Display
                                                                          A13 Bionic chip with 3rd gen processor
                                                                         Fast Charging port
                                                                        Water Prof resistant </p>

                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="fs-24">
                                                                            <span class="fw-700 text-color-black fs-24"> <i class="las la-rupee-sign"></i>18.000</span>
                                                                        </div>
                                                                        <div class="">

                                                                            <del class="fw-600 opacity-50 mr-1 ml-1 fs-14"><i class="las la-rupee-sign"></i> 20.000</del>

                                                                            <span class="fw-400  ml-1 fs-11 text-color-white c-badge-pill badge-success px-1"> 40% off </span>

                                                                        </div>
                                                                        <div class="mt-5 ml-1 d-block" style="margin-top: 1rem !important;">
                                                                            <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to wishlist" data-placement="left">
                                                                                 <span class="badge badge-warning mb-2"  style="width: 100px;"> <i class="fas fa-shopping-cart fa-lg"></i></span></a>

                                                                                 <a href="javascript:void(0)" onclick="addToCompare(163)" data-toggle="tooltip" data-title="Add to compare" data-placement="left">
                                                                            <span class="badge badge-success mb-2"  style="width: 100px;"> <i class="fas fa-compress-alt fa-lg" aria-hidden="true"></i></span></a>

                                                                            <a href="javascript:void(0)" onclick="showAddToCartModal(163)" data-toggle="tooltip" data-title="Add to cart" data-placement="left" data-original-title="" title="">
                                                                            <span class="badge badge-primary mb-2"  style="width: 100px;">  <i class="fa fa-heart fa-lg"></i></span></a>


                                                                        </div>
                                                                        <div class="absolute-top-left" style="margin-top: 70px; margin-left:80%;">
                                                                            <div class="bg-warning">
                                                                            <span class="badge  d-block"><i
                                                                                class="fas fa-shipping-fast "></i></span>
                                                                                <span class="badge d-block"><i
                                                                                    class="fas fa-box-open"></i></span>
                                                                                </div>
                                                                        </div>
                                                                        {{-- <div class="absolute-top-left pt-2 pl-2  pb-0 badge-off" style="margin-top: 70px; margin-left:71%;">
                                                                            <span class="badge badge-inline  badge-warning d-block"><i
                                                                                    class="fas fa-shipping-fast ml-1"></i> </span>
                                                                            <span class="badge badge-inline  badge-warning d-block"><i
                                                                                    class="fas fa-box-open ml-1"></i></span>
                                                                        </div> --}}
                                                                    </div>
                                                                    <div class="col-12 mt-4">
                                                                        <div class="row">
                                                                            <div class="col-9">

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>

                                            </div>
                                            {{-- <div class="absolute-top-right pt-6 pl-2 pb-0 badge-off" style=" ;
                                                        margin-right: 30px;">
                                                            <span class="badge badge-inline  badge-warning d-block"><i
                                                                    class="fas fa-shipping-fast ml-1"></i> </span>
                                                            <span class="badge badge-inline  badge-warning d-block"><i
                                                                    class="fas fa-box-open ml-1"></i></span>
                                                        </div> --}}
                                            <!-- /.products -->
                                        </div>



                                    </div>

                                </div>

                            </div>
                            <div class="border_box text-center d-flex mt-3" style="margin-top: 8px;">
                              <h3 class=" mt-1 fs-23 text-center ml-4 " >That's All We Have Friend</h3>
                             </div>
                            <div class="aiz-pagination aiz-pagination-center mt-4">
                                <nav>
                                    <ul class="pagination"  >

                                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>





                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                        <li class="page-item"><a class="page-link" href="Men-Clothing-Fashion4658.html?page=2">2</a></li>


                                        <li class="page-item">
                                            <a class="page-link" href="Men-Clothing-Fashion4658.html?page=2" rel="next" aria-label="Next »">&rsaquo;</a>
                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
