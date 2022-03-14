@extends('frontend.layouts.app')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:price:currency" content="{{ \App\Models\Currency::findOrFail(get_setting('system_default_currency'))->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('content')
<section class="mb-4 pt-3">
    <div class="container">
        <div class="bg-white shadow-sm rounded p-3">
            <div class="row">
                <div class="col-xl-5 col-lg-6 mb-4">
                    <div class="fixed-product z-3 row gutters-10">

                        <div class="col order-1 order-md-2">
                            <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true'>
                                @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                                    <div class="carousel-box img-zoom rounded">
                                        <img
                                            class="img-fluid lazyload"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($photo) }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                        >
                                    </div>
                                @endforeach
                                @foreach ($detailedProduct->stocks as $key => $stock)
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
                            <div class="  mt-14 d-flex">
                                <button type="button" class="btn c-btn-soft-secondary mr-2 add-to-cart fw-600  add-box-widht py-2 col-xs-6 btn-widthandflex" style="height: 50px; justify-content:center; " onclick="addToCart()">
                                    <i class="fas fa-box-open margintop"></i>
                                    <span class=" d-md-inline-block " style="text-align: center; padding:5px;">ADD TO BOX</span>
                                </button>
                                <button type="button" class="btn c-btn-soft-primary buy-now fw-600 buy-now-width py-2 col-xs-6  btwidth add-box-widht btn-widthandflex" style="height: 50px; justify-content:center;" onclick="buyNow()">
                                    <i class="fas fa-box margintop"></i>
                                    <span class=" d-md-inline-block " style="text-align: center; padding:5px;">BUY NOW</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto w-md-80px order-2 order-md-1 mt-3 mt-md-0">
                            <div class="aiz-carousel product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                @foreach (json_decode($detailedProduct->photos) as $key => $photo)
                                <div class="carousel-box c-pointer border p-1 rounded">
                                    <img
                                        class="lazyload mw-100 size-50px mx-auto"
                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ uploaded_asset($photo) }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    >
                                </div>
                                @endforeach
                                @foreach ($detailedProduct->stocks as $key => $stock)
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

                {{-- <div class="col-xl-5 col-lg-6 mb-4">
                    <div class="fixed-product z-3 row gutters-10">
                        <div class="col order-1 order-md-2">
                            <div class="aiz-carousel product-gallery" data-nav-for='.product-gallery-thumb' data-fade='true'>
                                <div class="carousel-box img-zoom rounded">
                                    <!-- comment   <div class="absolute-top-right pt-3 pr-3">
                                        <span class="badge badge-inline badge-secondary p-3"><i class="far fa-heart fs-15"></i></span>
                                    </div> -->
                                    <img class="img-fluid lazyload" src="{{ static_asset('assets/img/products/p11.jpg') }}">

                                </div>
                                <div class="carousel-box img-zoom rounded">
                                    <img class="img-fluid lazyload" src="{{ static_asset('assets/img/products/p12.jpg') }}">

                                </div>


                            </div>

                            <div class="  mt-14 d-flex">
                                <button type="button" class="btn c-btn-soft-secondary mr-2 add-to-cart fw-600  add-box-widht py-2 col-xs-6 btn-widthandflex" style="height: 50px; justify-content:center; " onclick="addToCart()">
                                    <i class="fas fa-box-open margintop"></i>
                                    <span class=" d-md-inline-block " style="text-align: center; padding:5px;">ADD TO BOX</span>
                                </button>
                                <button type="button" class="btn c-btn-soft-primary buy-now fw-600 buy-now-width py-2 col-xs-6  btwidth add-box-widht btn-widthandflex" style="height: 50px; justify-content:center;" onclick="buyNow()">
                                    <i class="fas fa-box margintop"></i>
                                    <span class=" d-md-inline-block " style="text-align: center; padding:5px;">BUY NOW</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto w-md-80px order-2 order-md-1 mt-3 mt-md-0">
                            <div class="aiz-carousel product-gallery-thumb" data-items='5' data-nav-for='.product-gallery' data-vertical='true' data-vertical-sm='false' data-focus-select='true' data-arrows='true'>
                                <div class="carousel-box c-pointer border p-1 rounded">
                                    <img class="img-fluid lazyload" src="{{ static_asset('assets/img/products/p11.jpg') }}">

                                </div>
                                <div class="carousel-box c-pointer border p-1 rounded">
                                    <img class="img-fluid lazyload" src="{{ static_asset('assets/img/products/p12.jpg') }}">

                                </div>

                            </div>


                        </div>

                    </div>


                </div> --}}

                <div class="col-xl-7 col-lg-6">
                    <div class="text-left pl-4">

                        <ul class="breadcrumb bg-transparent p-0 mb-3 justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item opacity-50">
                                <a class="b-color" href="">
                                    Home
                                </a>
                            </li>
                            <li class="text-dark fw-600 breadcrumb-item">
                                <a class="b-color" href="">
                                    Mobile
                                </a>
                            </li>
                            <li class="text-dark fw-600 breadcrumb-item">
                                <a class="b-color" href="">
                                    SAMSUNG Mobile
                                </a>
                            </li>
                        </ul>
                        <div class="row align-items-center super-bg-color mb-2 mr-2 ">
                            <div class="col-12 ">
                                <h1 class="fs-20 fw-600 my-2">
                                    <i class=" fas fa-shopping-cart" aria-hidden="true" style="color:orange;padding-right:7px"></i>
                                    Super Saver Days Starts in : 06 hrs : 54 mins : 44 secs
                                </h1>

                            </div>

                        </div>



                        <div class="row align-items-center">
                            <div class="col col-md-9 d-inline-block">
                                <h1 class="mb-1 fs-20 fw-600 avbl-text "  >
                                   {{$detailedProduct->name}}


                                </h1>

                            </div>
                            <div class="col-4 col-md-3 text-right ">

                                <div class="favorite-button m-t-10 ">
                                    <div class="middle">
                                        <div class="sm-container">
                                            <a class="show-btn" data-toggle="tooltip" data-placement="top" title="Share" href="#">
                                                <i class="fas fa-share-alt share mr-3"></i></a>
                                            <div class="sm-menu">
                                                <a href="#"><i class="fab fa-facebook-f facebook"></i></a>
                                                <a href="#"><i class="fab fa-twitter twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram instagram-icon"></i></a>
                                                <a href="#"><i class="fab fa-youtube youtube"></i></a>
                                                <a href="#"><i class="fab fa-whatsapp whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.querySelector('.show-btn').addEventListener('click', function() {
                                            document.querySelector('.sm-menu').classList.toggle('active');
                                        });
                                    </script>





                                    <span class="border-compare camparebtn"></span>
                                    <a class="btn btn-primary1 camparebtn" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                        <i class="fas fa-compress-alt"></i>
                                    </a>
                                    <span class="border-compare camparebtn"></span>
                                    <a class="btn btn-primary1" data-toggle="tooltip" data-placement="right" title="Add to favorite" href="#">
                                        <i class="far fa-heart" id="addheart"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8 col-md-8">
                                {{-- <span class="rating pr-1 product-rating-star">
                                    <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                </span>
                                <span class="badge badge-md badge-inline badge-pill badge-green c-height-20px">4.3 <i class='las la-star'></i> </span> --}}


                                        @php
                                            $total = 0;
                                            $total += $detailedProduct->reviews->count();
                                        @endphp
                                        <span class="rating">
                                            {{ renderStarRating($detailedProduct->rating) }}
                                        </span>
                                        <span class="badge badge-md badge-inline badge-pill badge-green c-height-15px">{{ $detailedProduct->rating }}<i class='fas fa-star'></i> </span>

                                    </div>
                                    {{-- @if ($detailedProduct->est_shipping_days)
                                    <div class="col-auto ml">
                                        <small class="mr-2 opacity-50">{{ translate('Estimate Shipping Time')}}: </small>{{ $detailedProduct->est_shipping_days }} {{  translate('Days') }}
                                    </div>
                                    @endif --}}



                            <div class="col-4 text-right">
                                <span class="badge badge-md badge-inline badge-pill badge-success mr-2">In stock</span>
                            </div>
                            @if($detailedProduct->allow_badge == 1)
                            <div class="col-4 text-right mt-1" style="margin-left: auto;">
                                <span class="badge badge-md badge-inline badge-pill mr-2" style=" color :  <?php echo $detailedProduct->badge_forecolor;?> ; background-color : <?php echo $detailedProduct->badge_backcolor; ?>">{{$detailedProduct->badge_title}}</span>
                            </div>
                            @endif
                        </div>

                        <div class="margin-top-bottem-10">
                            <div class="row">
                                @php
                                $labels = json_decode( $detailedProduct->key_feature_labels);
                                $values = json_decode($detailedProduct->key_feature_values);
                                $img = json_decode($detailedProduct->key_feature_img);
                                @endphp

                                <div class="col-3 col-md-2 specification-b-right">
                                    <img class="img-responsive ml-2 specimg" src="{{uploaded_asset($img[0])}}"  >
                                        <div class="text-center">
                                            <span class="text-center fs-14 fw-600">{{($labels[0])}}</span>
                                        </div>
                                        <div class="center ">
                                            <span class="fs-16 fw-700 text-color-orange">{{$values[0]}}</span>
                                        </div>
                                </div>
                                <div class="col-3 col-md-2 specification-b-right">
                                    <img class="img-responsive ml-2 specimg" src="{{static_asset('assets/img/ram.png')}}" >
                                        <div class="center">
                                            <span class=" fs-14 fw-600">{{$labels[1]}}</span>
                                        </div>
                                        <div class="text-center">
                                            <span class="fs-16 fw-700 text-color-orange" >intel i9</span>
                                        </div>
                                </div>
                                <div class="col-3 col-md-2 specification-b-right">
                                    <img class="img-responsive ml-2 specimg" src="{{static_asset('assets/img/ram.png')}}" >
                                        <div class="text-center" >
                                            <span class=" fs-14 fw-600">{{$labels[2]}}</span>
                                        </div>
                                        <div class="text-center" >
                                            <span class="fs-16 fw-700 text-color-orange">8 GB</span>
                                        </div>
                                </div>
                                <div class="col-3 col-md-2">
                                    <img class="img-responsive ml-2 specimg" src="{{static_asset('assets/img/ram.png')}}" >
                                        <div class="text-center">
                                            <span class="  fs-14 fw-600">{{$labels[3]}}</span>
                                        </div>
                                        <div  class="text-center" >
                                            <span class="fs-16 fw-700 text-color-orange" >intel i9</span>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters mt-1">

                            <div class="col-sm-10 ">
                                <div class="product_text">
                                    @if($detailedProduct->discount)
                                        <strong class="h2 fw-700  prize-color">
                                            <i class="la la-rupee-sign mr-1" aria-hidden="true"></i> <span class="ml-md-n3">{{home_discounted_base_price($detailedProduct)}} </span>
                                        </strong>
                                        <del class="fw-600 opacity-50 mr fs-16 c-prize-del-color"> <i class="la la-rupee-sign" aria-hidden="true"></i> {{$detailedProduct->unit_price}}</del>

                                        @if($detailedProduct->discount_type == 'amount')
                                        <span class="fw-700 text-color-green fs-18">Flat {{$detailedProduct->discount}} off</span>
                                        @else
                                        <span class="fw-700 text-color-green fs-18"> {{$detailedProduct->discount}}% Off</span>
                                        @endif
                                    @else
                                    <strong class="h2 fw-700  prize-color">
                                        <i class="la la-rupee-sign mr-1" aria-hidden="true"></i> <span class="ml-md-n3">{{home_discounted_base_price($detailedProduct)}} </span>
                                    </strong>
                                    @endif
                                </div>
                            </div>
                        </div>







                        <div class="row no-gutters my-1 mt-2">
                            <div class="col-sm-12">
                                <h5 class="fw-600 avbl-text" style="font-size: 1.20rem;">Avaliable Offers</h5>
                            </div>
                            @php
                            $offer_ids = array();
                                $company_offer_ids = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->company_offers);
                                $emi_offer_ids = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->emi_offers);
                                $other_offer_ids = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->other_offers);
                                $bank_offer_ids = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->bank_offers);
                                if($bank_offer_ids != null){
                                   $offer_ids = array_merge( $offer_ids,$bank_offer_ids);
                                }
                                if($emi_offer_ids != null){
                                    $offer_ids =  array_merge( $offer_ids,$emi_offer_ids);
                                }
                                if($company_offer_ids != null){
                                    $offer_ids =  array_merge( $offer_ids,$company_offer_ids);
                                }
                                if($other_offer_ids != null){
                                    $offer_ids =  array_merge( $offer_ids,$other_offer_ids);
                                }


                                $offers = (App\Models\Offer::whereIn('id',$offer_ids)->orderby('type_id','asc')->get());
                            @endphp

                            @if($offers)


                            @foreach ($offers as $poffer)


                            <div class="col-sm-12">
                                <div class="fs-14" style="margin-bottom: 3px;">
                                    <span class="text-color-green mr-2"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                    <span class="fw-600">{{$poffer->offer_type->name}}</span>
                                    <span class="strong-700">{{$poffer->title}} </span><span class="tc-div" id="tandc" data-toggle="modal"  data-target="#offer_modal_{{$poffer->id}}"><b>T&C </b></span>
                                </div>
                                {{-- t and c modal --}}
                             <div class="modal fade" id="offer_modal_{{$poffer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  style="margin-left:232px;">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">
                                  <h6>Terms and Conditions</h6>
                                 <?php
                                    echo $poffer->t_and_c;
                                  ?>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="col-sm-12 mt-2 ml-4">
                                @if(count($offers) > 3)
                                <div class="fs-14 pl-1" style="margin-bottom: 15px;">
                                    <a href="#"> <span class="text-color-orange marginleftoffer">View {{count($offers) - 2}} More offers</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>





                        <form id="option-choice-form mt-1">
                            <input type="hidden" name="id" value="110">


                            <div class="row no-gutters">
                                <div class="col-sm-2">
                                    <div class="text-color-black fw-600 my-2">Varients Color :</div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="aiz-radio-inline">
                                        <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BlanchedAlmond" data-original-title="" title="">
                                            <input type="radio" name="color" value="BlanchedAlmond" checked="">
                                            <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                <span class="size-30px d-inline-block rounded" style="background: #FFEBCD;"></span>
                                            </span>
                                        </label>
                                        <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="BurlyWood" data-original-title="" title="">
                                            <input type="radio" name="color" value="BurlyWood">
                                            <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                <span class="size-30px d-inline-block rounded" style="background: #DEB887;"></span>
                                            </span>
                                        </label>
                                        <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="DarkGoldenrod" data-original-title="" title="">
                                            <input type="radio" name="color" value="DarkGoldenrod">
                                            <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                <span class="size-30px d-inline-block rounded" style="background: #B8860B;"></span>
                                            </span>
                                        </label>
                                        <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="IndianRed">
                                            <input type="radio" name="color" value="IndianRed">
                                            <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                <span class="size-30px d-inline-block rounded" style="background: #CD5C5C;"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row no-gutters ">
                                <div class="col-sm-2 ">
                                    <div class="text-color-black fw-600 my-1"> RAM :</div>
                                </div>

                                <div class="aiz-megabox  col-md-2 col-sm-2  col-xs-2 col-6" style="margin-right: -25px;">
                                    <div class="text-color-prize my-2 prize-box" data-toggle="tooltip" data-placement="top" title="126GB" style=" border: 2px solid  #ff0000; text-align:center;">
                                        <span class="rounded text-color-black">126 GB </span>
                                    </div>

                                </div>
                                <!-- <span class="border-left-storage"></span> -->
                                <div class=" aiz-megabox col-sm-2 col-xs-2 col-md-2 col-6">
                                    <div class="text-color-prize my-2 prize-box" data-toggle="tooltip" data-placement="top" title="128GB" style="text-align:center;">
                                        <span class="rounded text-color-black"> 128 GB </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row no-gutters" style="margin-bottom: 10px;">
                                <div class="col-sm-2 ">
                                    <div class="text-color-black fw-600 my-2"> Storage :</div>
                                </div>

                                <div class="aiz-megabox col-md-2  col-sm-6 col-xs-6 col-6" style="margin-right: -25px; text-align:center;">
                                    <div class="text-color-prize my-2 prize-box" data-toggle="tooltip" data-placement="top" title="126GB">
                                        <span class="rounded text-color-black"> 128 GB </span>
                                    </div>

                                </div>
                                <!-- <span class="border-left-storage"></span> -->
                                <div class=" aiz-megabox col-sm-6 col-xs-6 col-md-2 col-xs-6 col-6">
                                    <div class="text-color-prize my-2 prize-box" data-toggle="tooltip" data-placement="top" title="164GB" style="text-align:center;">
                                        <span class="rounded text-color-black"> 164 GB </span>
                                    </div>
                                </div>

                            </div>
                            <div class="row no-gutters mt-1">
                                <div class="col-1">
                                    <div class="text-color-black fw-600 my-2"> Delivery</div>
                                </div>
                                <div class="col-md-4 mr-3 ">
                                    <div class="_1NQxOU pt-1">
                                        <div class="ibtBU6 _3t6eWY">
                                            <i class="fas fa-location-arrow mr-1"></i>
                                            <input type="text" placeholder="Enter pincode" value="" maxlength="6" autocomplete="off" class="cfnctZ">
                                            <span class="UgLoKg jlIjY- fw-600">Check</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_text mr-3 ">
                                    <h6 class="pt-2 fw-600 todays-margin today_text">
                                        <span class="fa-stack fa-1x">
                                            <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                            <i class="fas fa-shipping-fast fa-stack-1x"></i>
                                        </span>

                                        Today by 20th Oct <span class="c-border-right  m-1"></span><span class=" today_text free_color fs-20 ">Free</span>
                                    </h6>
                                </div>
                            </div>
                  </form>
                    <div class="row no-gutters mt-1">
                            <div class="col-sm-4 col-8">
                                <h4 class="btn pl-0  text-color-red fw-700">Buy With Exchange</h4>
                            </div>
                            <div class="col-sm-3 col-4 product_text">
                                <h4 class="btn pl-0  fw-700 text-color-blue">EMI Option</h4>
                            </div>
                        </div>
                        <hr class="hr_new">
                        <div class="row no-gutters mt-2">
                            <div class="col-sm-6 product-desctiption">
                                <h4 class="btn pl-0  text-color-black fw-600"> <i class="far fa-star fs-07"></i><span style="margin-left: 4px;">Highlighted<span style="margin-left: 4px;"></h4>
                             <?php echo $detailedProduct->description ?>
                            </div>
                            <div class="col-sm-6 product-desctiption">
                                <h4 class="btn pl-0  fw-400 text-color-black "></h4>
                                <div class="warranty-div">
                                    <h4 class="btn pl-0  text-color-black fw-600 " style="margin-top:-25px;">
                                        <i class="far fa-star fs-07"></i><span style="margin-left: 4px;">Warranty</span>
                                    </h4>
                                    <div class="warranty-div-inner">
                                        <div class="warranty-div-img">
                                            <div class="warranty-img">
                                                <img src="https://rukminim1.flixcart.com/image/160/160/prod-fk-cms-brand-images/9d5696196cfb3f4440ca99b1018c8ff91a53716d1948ba73ee3bb68f36571d7a.jpg?q=90">
                                            </div>
                                        </div>
                                        <div class="warranty-head">
                                            <div class="warrany-heading">Brand Warranty of 1 Year
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <ul class="mr-1 pl-3 product-desctiption-li mt-2">
                                    <li>
                                        <?php echo $detailedProduct->warranty_details ?>
                                    </li>



                                </ul>
                                {{-- <h4 class="btn pl-0  text-color-black fw-600">
                                    <i class="far fa-star fs-07 "></i><span style="margin-left: 4px;">Installation :not required</span>
                                </h4>
                                <h4 class="btn pl-0  text-color-black fw-600">
                                    <i class="far fa-star fs-07"></i><span style="margin-left: 4px;">Cancellation : not allowed</span>
                                </h4>
                                <h4 class="btn pl-0  text-color-black fw-600">
                                    <i class="far fa-star fs-07"></i><span style="margin-left: 4px;">Replacement : 7 Days</span>
                                </h4> --}}

                            </div>
                        </div>
                        <hr class="hr_new">

                        <div class="seller  product-spec">
                            <div class="row ">

                                @if($detailedProduct->installation == 1)
                                <div class="col-2 col-md-2 mt-2 install" style="margin-left: 60px">

                                    <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">


                                    <span class="fw-700  text-center ">Installation </span>
                                    <span class="fw-700   text-center"> Avilable</span>

                                </div>
                                @endif

                                @if($detailedProduct->cancellation == 0)
                                <div class="col-2 col-md-2 mb-4 mt-2">

                                        <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="" >
                                        <span class="fw-700  text-center ">Cancellation </span>
                                        <span class="fw-700   text-center"> not allowed</span>

                                </div>
                                @endif
                                @if($detailedProduct->return_and_replacement == 0)
                                    <div class="col-2 col-md-2 mt-2">
                                        <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">
                                        <span class="fw-700  text-center ">   Return </span>
                                        <span class="fw-700   text-center">& Replacement not allowd</span>
                                    </div>
                                @elseif($detailedProduct->return_and_replacement_type == 'return')
                                    <div class="col-2 col-md-2 mt-2">
                                        <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">
                                        <span class="fw-700  text-center ">Return </span>
                                        <span class="fw-700   text-center"> 7 Days</span>
                                    </div>
                                @elseif($detailedProduct->return_and_replacement_type == 'replacement')
                                    <div class="col-2 col-md-2 mt-2">
                                        <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">
                                        <span class="fw-700  text-center ">Replacement </span>
                                        <span class="fw-700   text-center"> 7 Days</span>
                                    </div>
                                @endif
                                @if($detailedProduct->return_and_replacement == 1 && $detailedProduct->return_and_replacement_type == 'return')
                                <div class="col-2 col-md-2 mt-2">
                                    <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">
                                    <span class="fw-700  text-center d-block">Refund </span>

                                </div>
                                @endif
                                <div class="col-2 col-md-2 mt-2 ">
                                    <img src="{{ static_asset('assets/img/cash.png') }}" class=" mt-2 mb-2 text-center  bg-white border-radious-77" alt="">
                                    <span class="fw-700  text-center d-block">Delivery </span>
                                    <span class="fw-700   text-center ml-4"> Free</span>
                                </div>


                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-4 pt-3">
    <div class="container">
        <div class="  ">
            <div class="row">
                <div class="col-xl-3 col-lg-6 mb-4">
                    <div class="fixed-product z-3 row gutters-10">

                        <div class="col-12 col-md w-md-80px order-2 order-md-1 mt-3 mt-md-0 ">
                            <div class=" ">
                                <div class="bg-color-yellow shadow-sm p-1 mb-3 border-radious-25 ">
                                    <div class="position-relative  text-left pl-2 my-2">

                                        <div class="opacity-50 fs-21 text-center text-color-light-black">Sold by</div>
                                        <div class=" d-block fw-600 fs-21 text-center text-truncate-2 mb-2">Rotech Store</div>



                                        <div class="container align-items-center">
                                            <div class="col ml-4" >
                                                <ul class="social list-inline mb-0 ">
                                                    <li class="list-inline-item rating_tech">
                                                        <i class='fas fa-star mr-1 text-white'></i><i class='fas fa-star mr-1 text-white '>
                                                            </i><i class='fas fa-star mr-1 text-white'></i><i class='fas fa-star mr-1 text-white'></i>
                                                            <i class='fas fa-star text-white '></i>  <span class=" c-badge  badge-inline fs-10 ml-1 c-badge-pill badge-success ">4.5<i class="fas fa-star ml-1 color text-white"></i></span>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="  mb-3 ">

                                    <div class="py-2 bg-white mb-3 shadow-sm border-radious-25 cs-border-bottom-1px">
                                        <div class="review-bar  ">
                                            <div class="heading_tag text-center">
                                                <h4 class="fs-20 fw-500 text-color-prize text-center">Rating & Reviews </h4>
                                                <h3 class=""><span class="product_rating_h3 fw-700 text-center d-inline-block" style="font-size: 55px;">{{$detailedProduct->rating}}</span>
                                                    <span class="fa fa-star checked d-inline-block" style="color: orange;font-size:32px;"></span>
                                                </h3>
                                                <h5 class="fs-13 fw-500 text-center">Product Rating</h5>
                                            </div>
                                            <div class="skill-grids ">
                                                <div class="col-md-12 ">
                                                    <h4 class="mb-2 text-center" style="margin-top: -30px; justify-content:center">By Feature</h4>

                                                    <div class="row  mt-4 align-items-center  "style="margin-left:auto;">
                                                        <div class="col-md-3 col-3">
                                                            <div class="progress-circle blue">
                                                                <span class="progress-left-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <span class="progress-right-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <div class="progress-value-circle">90%
                                                                    <p class="fs-13 fw-700 " style="margin-top: -20px;">Camera</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-3">
                                                            <div class="progress-circle yellow">
                                                                <span class="progress-left-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <span class="progress-right-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <div class="progress-value-circle">75%
                                                                    <p class="fs-13 fw-700" style="margin-top: -20px;">Battery</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-3">
                                                            <div class="progress-circle pink">
                                                                <span class="progress-left-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <span class="progress-right-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <div class="progress-value-circle">60%
                                                                    <p class="fs-13 fw-700" style="margin-top: -20px;">Design</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-3">
                                                            <div class="progress-circle red">
                                                                <span class="progress-left-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <span class="progress-right-circle">
                                                                    <span class="progress-bar-circle"></span>
                                                                </span>
                                                                <div class="progress-value-circle">90%
                                                                    <p class="fs-13 fw-700" style="margin-top: -20px;">Display</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white rounded shadow-sm mb-3">
                                    <div class="p-3 border-bottom fs-16 fw-600">
                                        {{ translate('Top Selling Products')}}
                                    </div>
                                    <div class="p-3">
                                        <ul class="list-group list-group-flush">
                                            @foreach (filter_products(\App\Models\Product::where('user_id', $detailedProduct->user_id)->orderBy('num_of_sale', 'desc'))->limit(6)->get() as $key => $top_product)
                                            <li class="py-3 px-0 list-group-item border-light">
                                                <div class="row gutters-10 align-items-center">
                                                    <div class="col-5">
                                                        <a href="{{ route('product', $top_product->slug) }}" class="d-block text-reset">
                                                            <img
                                                                class="img-fit lazyload h-xxl-110px h-xl-80px h-120px" style="object-fit: contain"
                                                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                                data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
                                                                alt="{{ $top_product->getTranslation('name') }}"
                                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                            >
                                                        </a>
                                                    </div>
                                                    <div class="col-7 text-left">
                                                        <h4 class="fs-13 text-truncate-2">
                                                            <a href="{{ route('product', $top_product->slug) }}" class="d-block text-dark">{{ $top_product->getTranslation('name') }}</a>
                                                        </h4>
                                                        <div class="rating rating-sm mt-1">
                                                            {{ renderStarRating($top_product->rating) }}
                                                        </div>
                                                        <div class="mt-2">
                                                            <span class="fs-17 fw-600 text-dark d-block"><i class="las la-rupee-sign"></i>{{ home_discounted_base_price($top_product) }}</span>
                                                            <del class="fw-600 opacity-50 mr-1 "><i class="las la-rupee-sign">10000</i></del>
                                                            <span class="fw-600  ml-1 cfs-16 green-color">20% off</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                           </div>

                    </div>
                  </div>

                <div class="col-xl-9 col-lg-6">
                    <div class="text-left ">
                        <div class="bg-white mb-3 shadow-sm border-radious-25">
                            <div class="nav border-bottom aiz-nav-tabs zone-word-wrap">
                                <a href="#tab_default_1" data-toggle="tab" class="p-3 fs-16 fw-700 b-color active show">SPECIFICATION</a>
                                <a href="#tab_default_2" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">OFFERS</a>
                                <a href="#tab_default_3" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">DESCRIPTION</a>
                                <a href="#tab_default_4" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">VIDEO</a>
                                <a href="#tab_default_5" data-toggle="tab" class="p-3 fs-16 fw-700 b-color">PRODUCT SUPPORT AND FAQS</a>
                            </div>

                            <div class="tab-content pt-0">
                                <div class="tab-pane fade active show" id="tab_default_1">
                                    <div class="p-4">
                                        <div class="row no-gutters border-gray pb-3">
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07 fw-600">Rear Camera </div>
                                                <div class="product-description-label mt-1 heading-4"> 12 MP + 64 MP + 12MP</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07 fw-600">RAM </div>
                                                <div class="product-description-label mt-1 heading-4"> 8 GB</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07 fw-600">Storage </div>
                                                <div class="product-description-label mt-1 heading-4"> 128 GB</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07 fw-600">Battery Capacity </div>
                                                <div class="product-description-label mt-1 heading-4"> 4000 mAh</div>

                                            </div>
                                        </div>
                                        <div class="row no-gutters mt-3 border-gray pb-3">
                                            <div class="col-3 ">
                                                <div class="product-description-label mt-2 fs-07 fw-600">Rear Camera </div>
                                                <div class="product-description-label mt-1 heading-4"> 12 MP + 64 MP + 12MP</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07">RAM </div>
                                                <div class="product-description-label mt-1 heading-4"> 8 GB</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07 fw-600">Storage </div>
                                                <div class="product-description-label mt-1 heading-4"> 128 GB</div>

                                            </div>
                                            <div class="col-3">
                                                <div class="product-description-label mt-2 fs-07">Battery Capacity </div>
                                                <div class="product-description-label mt-1 heading-4"> 4000 mAh</div>

                                            </div>
                                        </div>
                                        <div class="row no-gutters mt-3  pb-3">
                                            <div class="col-12">
                                                <div class="product-description-label mt-2 fs-07 fw-600">OS </div>
                                                <div class="product-description-label mt-1 heading-4"> Android 10</div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @php
                                $compfes =  (App\Models\Product::where('id',$detailedProduct->id)->first()->company_features);

                                @endphp
                                <div class="tab-pane fade" id="tab_default_2">

                                        <div class="col-sm-12">
                                            <div class="fs-14" style="margin-bottom: 3px;">
                                                <span class="text-color-green mr-2"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                                <span class="fw-600">{!! $compfes !!}</span>
                                                {{-- <span class="strong-700">{{$compfe->title}} </span><span class="tc-div" id="tandc" data-toggle="modal"  data-target="#offer_modal_{{$poffer->id}}"><b>T&C </b></span> --}}
                                        </div>
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="tab_default_4">
                                    <div class="p-4">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/uwv2pDY3G_k"></iframe>
                                        </div>
                                    </div>
                                </div>
                                @php
                                        $desc = (App\Models\Product::where('id',$detailedProduct->id)->first()->description);

                                    @endphp
                                <div class="tab-pane fade" id="tab_default_3">
                                     <div class="p-4 text-center ">
                                         <p> {!! $desc !!}</p>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="tab_default_5">
                                    <div class="p-4">
                                        <ul class="list-group list-group-flush">
                                        </ul>
                                        @php
                                        $faqs = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->faq_questions);
                                        $ans = json_decode(App\Models\Product::where('id',$detailedProduct->id)->first()->faq_answers);
                                    @endphp
                                          @if($faqs != null)
                                        <div class=" border-bottom-black2px p-3 mt-4">
                                            <h5 class="fw-700 fs-18">Frequently Ask Question's</h5>
                                        </div>
                                        @else
                                        <div class=" border-bottom-black2px p-3 mt-4">
                                            <h5 class="fw-700 fs-18">No FAQ's For this product</h5>
                                        </div>
                                        @endif

                                        <div class="tab-content pt-0">
                                            <div class="tab-pane fade active show" id="tab_default_1">
                                                <div class="p-4">

                                                    @if($faqs != null)
                                                        @foreach ( $faqs as $key => $faq )


                                                        <div class="row no-gutters border-gray pb-3">
                                                            <div class="col-12 p-2">
                                                                <div class="product-description-label mt-2 fs-07 fw-600">Q : {{$faq}}  </div>
                                                                    <div class="product-description-label mt-1 heading-4">A : {{ $ans[$key]}}</div>

                                                                </div>
                                                        </div>
                                                        @endforeach

                                                         <div class="mb-4 mt-2">
                                                                    <a href="" class="ml-auto mr-0 float-right btn btn-danger btn-xs shadow-md w-100 w-md-auto" data-toggle="modal" data-target="#exampleModalLong" style="padding: 0.25rem 1.75rem;font-size:0.75rem;">view all</a>
                                                        </div>
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

            </div>
        </div>
    </div>
</section>
<section class="mb-4 mt-4">
    <div class="container ">

        <div class="bg-white mb-3 overflow-hidden shadow-sm border-radious-25">
            <div class=" border-bottom-black2px pb-2" style="margin-top: 0.8rem !important;">
                <div class="d-flex flex-wrap  align-items-center  justify-content-around  mx-2" style="margin-left: 1.5rem !important; margin-right:1.5rem !important">

                    <h3 class="h5 fw-600 mb-0">
                        <div class="main-title-tt">
                            <div class="main-title-left">

                                <h4 class="mediya-h4"> <span class=" pb-3 fw-700"> Reviews
                                    </span>

                                </h4>

                            </div>

                        </div>


                    </h3>


                    <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date=""></div>
                    <a href="" class="ml-auto mr-0 btn btn-danger btn-xs shadow-md w-100 w-md-auto" style="padding: 0.25rem 1.75rem;font-size:0.75rem;">Rate Product</a>
                </div>
            </div>

            <div class="p-4 border-bottom-black2px">
                <div class="row">
                    <div class=" col-md-4 col-xs-12">
                        <h3 class="d-m-font fs-20"> Customer Rating</h3>


                        <div class=" mb-3">
                            <i class='fas fa-star text-color-orange fs-20' ></i>
                            <i class='fas fa-star text-color-orange fs-20'></i>
                            <i class='fas fa-star text-color-orange fs-20'></i>
                            <i class='fas fa-star text-color-orange fs-20'></i>
                            <i class='fas fa-star text-color-black fs-20'></i>
                            <span class="ml-3"style="font-size: 15px;">3 out of 5</span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-2 col-3 left-side-raing fs-11 fw-500">
                                <p class="fs-15">5 <span> <i class='las la-star text-color-orange fs-15'></i></span></p>
                            </div>
                            <div class="col-lg-6 col-5 left-side-raing">
                                <div class="progress mt-1" >
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4 left-side-raing">
                                <p class="fs-15 text-dark" >60 %</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-2 col-3 left-side-raing fs-11 fw-500">
                                <p class="fs-15">4 <span class="fs-15"> <i class='las la-star text-color-orange fs-15'></i></span></p>
                            </div>
                            <div class="col-lg-6 col-5 left-side-raing">
                                <div class="progress mt-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 23%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4 left-side-raing">
                                <p class="fs-15 text-dark" >23 %</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-2 col-3 left-side-raing fs-11 fw-500">
                                <p class="fs-15">3 <span> <i class='las la-star text-color-orange fs-15'></i></span></p>
                            </div>
                            <div class="col-lg-6 col-5 left-side-raing">
                                <div class="progress mt-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 7%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4 left-side-raing">
                                <p class="fs-15 text-dark">7 %</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-2 col-3 left-side-raing fs-11 fw-500">
                                <p class="fs-15">2 <span> <i class='las la-star text-color-orange fs-15'></i></span></p>
                            </div>
                            <div class="col-lg-6 col-5 left-side-raing">
                                <div class="progress mt-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 3%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4 left-side-raing">
                                <p class="fs-15 text-dark" >3 %</p>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-2 col-3 left-side-raing fs-11 fw-500">
                                <p class="fs-15">1 <span> <i class='las la-star text-color-orange fs-15'></i></span></p>
                            </div>
                            <div class="col-lg-6 col-5 left-side-raing">
                                <div class="progress mt-1">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 1%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-4  left-side-raing">
                                <p class="fs-15 text-dark" >1 %</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 col-md-1 border-right-rating"></div>
                    <div class="col-7 col-md-7">



                        <h3 class="d-m-font fs-20">Customer Images </h3>
                        <div class="d-flex  m-flex-wrap mt-4 p-0 top-img">
                            <div class="p-2 "><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                            </div>
                        <div class="mt-4">
                            <a href="" class="ml-auto mr-0 float-right btn btn-danger btn-xs shadow-md w-100 w-md-auto" data-toggle="modal" data-target="#exampleModalLong" style="padding: 0.25rem 1.75rem;font-size:0.75rem;">view all</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 col-md-12 justify-content-center  ">


                            <div class="d-flex justify-content-center m-flex-wrap mt-4 p-0 top-img">
                                <div class="p-2 "><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class="  c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>
                                <div class="p-2"><img class=" c-top-img" src="{{static_asset('assets/img/products/lap1.jpg')}}"></div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

            <div class="p-4 border-bottom-black3" style="padding: 1rem !important;">

                <div class="mb-2 ">
                    <div class="row ">
                        <div class=" col-md-0 mt-2 ">
                            <h3 class="fw-500 fs-18 customer-text">Gaurav Pathak</h3>
                        </div>
                        <div class=" col-md-3  mt-2">
                            <div class="">
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star' ></i>
                                <span class="fs-25 ml-2"style="font-size: 13px !important;">11-3-2020</span>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="opacity-70 mb-4" style="margin-bottom: 0.5rem !important;">
                        <p>The Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone
                            e MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Bes</p>

                    </div>

                </div>
                <div class="d-flex  m-flex-wrap m-0 p-0">
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                </div>




            </div>

            <div class="p-4 border-bottom-black3">

                <div class="mb-2 ">
                    <div class="row">
                        <div class=" col-md-0 mt-2">
                            <h3 class="fw-500 fs-18 customer-text">Gaurav Pathak</h3>
                        </div>
                        <div class=" col-md-3  mt-2">
                            <div class="">
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star' ></i>
                                <span class="fs-25 ml-2"style="font-size: 13px !important;">11-3-2020</span>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="opacity-70 mb-4">
                        <p>The Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone
                            e MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Bes</p>

                    </div>

                </div>
                <div class="d-flex  m-flex-wrap m-0 p-0">
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                </div>




            </div>
            <div class="p-4 border-bottom-black3">

                <div class="mb-2 ">
                    <div class="row">
                        <div class=" col-md-0 mt-2">
                            <h3 class="fw-500 fs-18 customer-text">Gaurav Pathak</h3>
                        </div>
                        <div class=" col-md-3  mt-2">
                            <div class="">
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star' ></i>
                                <span class="fs-25 ml-2"style="font-size: 13px !important;">11-3-2020</span>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="opacity-70 mb-4">
                        <p>The Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone
                            e MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Bes</p>

                    </div>

                </div>
                <div class="d-flex m-flex-wrap  m-0 p-0">
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                </div>




            </div>
            <div class="p-4 border-bottom-black3">

                <div class="mb-2 ">
                    <div class="row">
                        <div class=" col-md-0 mt-2">
                            <h3 class="fw-500 fs-18 customer-text">Gaurav Pathak</h3>
                        </div>
                        <div class=" col-md-3  mt-2">
                            <div class="">
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star text-color-orange' ></i>
                                <i class='fs-25 fas fa-star' ></i>
                                <span class="fs-25 ml-2"style="font-size: 13px !important;">11-3-2020</span>

                            </div>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="opacity-70 mb-4">
                        <p>The Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone
                            e MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Best Phone for the MoneyThe Bes</p>

                    </div>

                </div>
                <div class="d-flex  m-flex-wrap m-0 p-0">
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                    <div class="p-2"><img class=" review-img" src="{{ static_asset('assets/img/products/lap1.jpg') }}"></div>
                </div>




            </div>
            <div class="p-4  ">



                <div class="d-flex  justify-content-center ">
                    <a href="" class="btn btn-soft-primary bg-color-orrange text-color-white pl-5 pr-5" >
                        See All Reviews
                    </a>
                </div>



            </div>
        </div>
    </div>
</section>


<section class="mb-4 pt-3 ">
    <div class="mb-4">



        <div class="col-md-12 col-xs-12 ">
            <div class="row  ">
                <div class="col-md-2"></div>
                <div class="u-buy-padd col-sm-12 col-md-8 bg-white border-radious-7">
                    <h3 class="text-color-buy fw-700 h4 margin-top-bottem-10 avbl-text">
                        You Can Buy With
                    </h3>
                    <div class="row ">

                        <div class="col-md-3 col-xs-3">
                            <div class="buy-with">
                                <div class="absolute-top-right  ">
                                    <span class=" ">
                                        <div class="mt-2 ">
                                            <input class="largerCheckbox pt-3 " type="checkbox">
                                        </div>
                                    </span>
                                </div>
                                <img class=" lazyload img-fit  mx-auto h-140px h-md-210px mb-2" src=" {{ uploaded_asset($detailedProduct->thumbnail_img) }}">
                                <div class="">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto">
                                            {{$detailedProduct->name}} </h3>
                                    <span class="rating">
                                        {{ renderStarRating($detailedProduct->rating) }}
                                    </span>

                                    <div class="fs-15">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i>  {{home_discounted_base_price($detailedProduct)}}</span>
                                        @if($detailedProduct->discount_type == 'amount')
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color">Flat {{$detailedProduct->discount}} off</span>
                                        @else
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> {{$detailedProduct->discount}}% Off</span>
                                        @endif
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="col-md-1 col-xs-1" style="margin-right: 24px;">
                            <div class="pluse-icon pluscenter">
                                <i class="fas fa-plus cfs-30 fas-plus-color"></i>
                            </div>
                        </div>
                        @php
                            $addons = json_decode(App\Models\Product::where('id',$detailedProduct->id)->where('product_addon',$detailedProduct->product_addon)->get());
                        @endphp
                     {{   print_r($addons)}}
                        <div class="col-md-3 col-xs-3">
                            <div class="buy-with">
                                <div class="absolute-top-right  ">
                                    <span class=" ">
                                        <div class="mt-2 ">
                                            <input class="largerCheckbox pt-3 " type="checkbox">
                                        </div>
                                    </span>
                                </div>
                                <img class=" lazyload mx-auto h-140px h-md-210px mb-2" src="{{ static_asset('assets/img/products/p1.jpg') }}">
                                <div class="">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto ">
                                   {{-- {{$addons->product_addon->name}}  --}}   </h3>
                                    <span class="rating">
                                        <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                    </span>

                                    <div class="fs-15">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="col-md-1 col-xs-1" style="margin-right: 23px;">
                            <div class="pluse-icon pluscenter">
                                <i class="fas fa-plus  cfs-30 fas-plus-color"></i>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-3">
                            <div class="buy-with">
                                <div class="absolute-top-right  ">
                                    <span class=" ">
                                        <div class="mt-2 checkbox">
                                            <input class="largerCheckbox pt-3 " type="checkbox">
                                        </div>
                                    </span>
                                </div>
                                <img class=" lazyload mx-auto h-140px h-md-210px mb-2" src=" {{ static_asset('assets/img/products/p1.jpg') }}">
                                <div class="">
                                    <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto">
                                       </h3>

                                    <span class="rating">
                                        <i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i><i class='las la-star'></i>
                                    </span>

                                    <div class="fs-15">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                        <span class="fw-600 opacity-50 ml-1 cfs-13 green-color"> 40% off </span>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="border-item margin-top-bottem-10"></div>
                    <div class="row">

                        <div class="col-md-2 col-xs-3 mobile-sec">
                            <div class="">

                                <div class="buy-with">
                                    <h3 class="fw-500 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto">
                                        1 Item </h3>


                                    <div class="fs-15">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i> {{home_discounted_base_price($detailedProduct)}}</span>
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="col-md-1 col-xs-1 mobile-sec">
                            <div class="bottom-plus">
                                <i class="fas fa-plus  fas-plus-color cfs-30"></i>
                            </div>
                        </div>


                        <div class="col-md-2 col-xs-3 mobile-sec">
                            <div class="buy-with">

                                <div class="">
                                    <h3 class="fw-500 fs-13 text-truncate-2 lh-1-4 mb-0 h-auto">
                                        2 Addons </h3>


                                    <div class="fs-15">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i>1,548.00</span>
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="col-md-1 col-xs-1">
                            <div class="bottom-plus pluscenter">
                                <i class="fas fa-equals cfs-25 fas-plus-color "></i>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-3 ">
                            <div class="">

                                <div class="buy-with">
                                    <h3 class="fw-600 fs-15 text-truncate-2 lh-1-4 mb-0 h-auto">
                                        Total Price :</h3>


                                    <div class="fs-18">

                                        <span class="fw-700 prize-color"><i class="la la-rupee-sign" aria-hidden="true"></i> 1,548.00</span>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-3 textcenter margintopbtn ">
                            <button type="button" class="c-btn-padding btn c-btn-soft-secondary buy-now fw-600  ml-3 mt-1 float-right" onclick="buyNow()">
                                <i class="la la-shopping-cart"></i> Add To Box
                            </button>
                        </div>

                    </div>


                </div>
                <div class="col-md-2"></div>
                <hr>
             </div>
        </div>
    </div>
</section>


<section class="mb-4">
    <div class="container">

        <div class=" slider-padding bg-white   border-radious-7">
            <div class="col-md-12">

            </div>
            <div class="d-flex flex-wrap  align-items-center top-product-border pb-1">

                <h3 class="h5 fw-600 mb-0">
                    <div class="main-title-tt">
                        <div class="main-title-left">

                            <h4 class="b-mediya-h4"><span class=" pb-3 fw-700">Related Product</span>
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

<section class="mb-0 ">

<div class="fluid-container">
    <div class="delivery product_delivery">
        <div class="row">
            <div class="col-6 col-md-3 bg-pure-white">
                <div class="delivery_item product_delivery_item  r">
                <i class="fas fa-shipping-fast truck_icon fs-24 ml-5 mt-4 mb-4 text-color-orange"></i>
                    <span>On Day Delivery</span>

                </div>
            </div>

            <div class=" col-6 col-md-3 top_border bg-pure-white">
                <div class="delivery_item product_delivery_item">
                <i class="fas fa-shipping-fast truck_icon fs-24 align-items-center ml-5 mt-4 mb-4 text-color-orange"></i>
                    <span>On Day Delivery</span>

                </div>
            </div>
            <div class=" col-6 col-md-3 top_border bg-pure-white">
                <div class="delivery_item product_delivery_item">
                <i class="fas fa-shipping-fast truck_icon fs-24 align-items-center ml-5 mt-4 mb-4 text-color-orange"></i>
                    <span>On Day Delivery</span>

                </div>
            </div>
            <div class="col-6 col-md-3  top_border bg-pure-white">
                <div class="delivery_item product_delivery_item">
                <i class="fas fa-shipping-fast truck_icon fs-24 align-items-center ml-5 mt-4 mb-4 text-color-orange"></i>
                    <span>On Day Delivery</span>

                </div>
            </div>

        </div>

    </div>
</div>
</section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            getVariantPrice();
    	});

        function CopyToClipboard(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                AIZ.plugins.notify('success', '{{ translate('Link copied to clipboard') }}');
            } catch (err) {
                AIZ.plugins.notify('danger', '{{ translate('Oops, unable to copy') }}');
            }
            $temp.remove();
            // if (document.selection) {
            //     var range = document.body.createTextRange();
            //     range.moveToElementText(document.getElementById(containerid));
            //     range.select().createTextRange();
            //     document.execCommand("Copy");

            // } else if (window.getSelection) {
            //     var range = document.createRange();
            //     document.getElementById(containerid).style.display = "block";
            //     range.selectNode(document.getElementById(containerid));
            //     window.getSelection().addRange(range);
            //     document.execCommand("Copy");
            //     document.getElementById(containerid).style.display = "none";

            // }
            // AIZ.plugins.notify('success', 'Copied');
        }
        function show_chat_modal(){
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

    </script>
@endsection
