@if (get_setting('topbar_banner') != null)
    <div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
        <a href="{{ get_setting('topbar_banner_link') }}" class="d-block text-reset">
            <img src="{{ uploaded_asset(get_setting('topbar_banner')) }}"
                class="w-100 mw-100 h-50px h-lg-auto img-fit">
        </a>
        <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed"
            data-toggle="remove-parent" data-parent=".top-banner">
            <i class="la la-close la-2x"></i>
        </button>
    </div>
@endif

<header class="@if (get_setting('header_stikcy') == 'on') sticky-top @endif  bg-white  shadow-sm" id="topnav">

    <div class="position-relative logo-bar-area  logo-header-color " id="header">
        <div class="container top-container">

            <div class=" d-flex align-items-center p-1">


                <div class=" col-md-2  d-flex align-items-center" id="logo">
                    <a class=" content d-block padding-top-bootom mr-0 ml-lg-5" href="{{ route('home') }}"
                        id="category-menu-icon">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if ($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" id="logo" alt="{{ env('APP_NAME') }}"
                                class="mw-100 h-40px h-md-50px logomargin" height="40">
                        @else
                            <img src="{{ static_asset('assets/img/new_logo.png') }}" alt="{{ env('APP_NAME') }}"
                                class="mw-100 h-40px h-md-50px logomargin" height="40">
                        @endif

                        <div class="overlay">
                            <div class="row">
                                <div class="col-7 col-md-7 text">
                                    <p>Contact Us : 11, NAVYUG COLONY, PADAMPURA, AURANGABAD</p>
                                    <p>Contact Us : + 91 8446060608 / 9049049336</p>
                                    <p>Email : abc@gmail.com</p>
                                    <ul class="list-inline">
                                        <li list-inline-item><i class="lab la-facebook-f"></i></li>
                                        <li list-inline-item><i class="lab la-twitter"></i></li>
                                        <li list-inline-item><i class="lab la-instagram"></i></li>
                                        <li list-inline-item><i class="lab la-youtube"></i></li>
                                    </ul>
                                </div>
                                <div class="col-5 col-md-5 text1">

                                    <img src='{{ static_asset('/assets/img/new_logo.png') }}'
                                        style="height:60%;width:60%;margin-bottom:15px;">

                                    <p>Contact Us : 11, NAVYUG COLONY, PADAMPURA, AURANGABAD</p>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>



                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white  search-radius">
                    <div class="position-relative flex-grow-1 ">

                        <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle"
                                    data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i
                                            class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group ">
                                    <input type="text" class="border-0  form-control" id="search" name="keyword"
                                        @isset($query) value="{{ $query }}" @endisset
                                        placeholder="{{ translate('Search for Product and More') }}"
                                        autocomplete="off">
                                    <div class="dropdown search-arrow">
                                        <button class="dropbtn"><i
                                                class="fas fa-angle-down fs-15 text-color-black"></i></button>
                                        <div class="dropdown-content">
                                            @foreach (\App\Models\Category::all() as $key => $category)
                                            <a href="{{route('products.category', $category->slug)}}">{{ __($category->name) }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="" style="border-right: 2px solid orange;
                                           height: 24px;
                                           padding: 0px 3px 0;
                                           margin: 6.5px 0 0 0;"></div>
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn" type="submit"
                                            style="padding-top: 6px;padding-bottom: 2px;padding-right: 9px;padding-left:11px;">

                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                            style="min-height: 200px;">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box  ">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>




                <div class="d-none d-lg-block ml-lg-5 mr-0">
                    @if (Auth::check())
                        <span class=" top-badge badge badge-primary badge-inline badge-pill">0</span>
                    @endif
                    <div class="" id="wishlist">

                        <div class="dropdown margin-top-6px">

                            @if (Auth::check())
                                <button class="dropbtn"> <b><?php
if (strlen(Auth::user()->name) > 6) {
    echo substr(Auth::user()->name, 0, 6) . '..';
} else {
    Auth::user()->name;
}
?> </b> <i
                                        class="fas fa-angle-down top-icon"></i></button>
                                <div class="dropdown-content">
                                    <a class="cs-border-bottom-nav" href="{{ route('profile') }}"><i
                                            class="fas fa-id-badge user cfs-15 mr-2"></i> My Profile </a>

                                    <a class="cs-border-bottom-nav" href="#"><i
                                            class="fas fa-box-open  box cfs-15 mr-2 "></i> My Orders </a>


                                    <a class="cs-border-bottom-nav" href="#"><i
                                            class="fab fa-uncharted  user cfs-15 mr-2 "></i> Digital Library </a>

                                    <a class="cs-border-bottom-nav" href="#"><i
                                            class="fas fa-heart heart cfs-15 mr-2 "></i> Wishlist </a>


                                    <a class="cs-border-bottom-nav" href="#"><i
                                            class="fas fa-bell cfs-15 user mr-2"></i> Your Notifications </a>

                                    <a class="cs-border-bottom-nav" href="#"><i
                                            class="fas fa-ticket-alt  box cfs-15 mr-2"></i> Support Tickets </a>


                                    <a class="cs-border-bottom-nav" href=""><i class="fas fa-gift cfs-15 box mr-2"></i>
                                        Coupons </a>


                                    <a class="" href="{{ route('logout') }}" class=""><i
                                            class="fas fa-sign-out-alt heart cfs-15 mr-2 "></i>LOGOUT</a>

                                </div>
                            @else
                                <a href="{{ route('user.login') }}" class="btn btn-link text-white fs-16"> <b>Sign in
                                    </b> </a>
                                <div class="dropdown-content mt-2 removable-session pincode1 d-none "data-key="pincode" data-value="removed">

                                        <div class="row">

                                            <div class="col-12 product_text p-5">

                                                <h6 class="cs-border-bottom-1px">Where do you want the delivery?</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <h6>Top Searched Cities</h6>
                                            </div>
                                        </div>
                                        <div class="row pr-3">

                                            <div class="col-3 d-inline-block p-3" style="padding-left: -20px;">
                                                <a href="" class=" ">
                                                    <img src="public/assets/img/pune.png" alt="" class="img lazyloaded"
                                                        style="width: 70px;height:50px;">
                                                    <span class="justify-content-center pl-4">Pune</span>
                                                </a>
                                            </div>
                                            <div class="col-3 d-inline-block p-3">
                                                <a href="" class=" ">
                                                    <img src="public/assets/img/pune.png" alt="Wear Dreams"
                                                        class="img lazyloaded" style="width: 70px;height:50px;">
                                                    <span class="text-center">Aurangabad</span>
                                                </a>
                                            </div>
                                            <div class="col-3 d-inline-block p-3">
                                                <a href="" class="">
                                                    <img src="public/assets/img/pune.png" alt="Wear Dreams"
                                                        class="img lazyloaded" style="width: 70px;height:50px;">
                                                    <span class="text-center pl-4">Nashik</span>
                                                </a>
                                            </div>
                                            <div class="col-3 d-inline-block p-3">
                                                <a href="" class="">
                                                    <img src="public/assets/img/pune.png" alt="Wear Dreams"
                                                        class="img lazyloaded" style="width: 70px;height:50px;">
                                                    <span class="text-center pl-4">Nagpur</span>
                                                </a>
                                            </div>

                                        </div>
                                        <div class="col-12 text-center mb-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Type Your Pincode">
                                                <a class="btn  border text-white mb-1 btn-danger" href="#"
                                                    role="button" style="height: 38px;"><i
                                                        class=" fas fa-paper-plane"></i>Detect</a>
                                            </div>
                                        </div>
                                        <div class="container border-radius-7">
                                            <button class="btn text-dark absolute-top-right set-session" data-key="pincode" data-value="removed"
                                                data-toggle="remove-parent" data-parent=".pincode1">
                                                <i class="la la-close la-2x"></i>
                                            </button>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="dropdown margin-top-6px">
                        <button class="dropbtn"><b> More </b> <i
                                class="fas fa-angle-down top-icon"></i></button>
                        <div class="dropdown-content  ">
                            <a class="cs-border-bottom-nav" href="{{route('frontend_update')}}"><i class="fas fa-rss cfs-15 mr-2 user"></i>
                                Updates <span class=" mt-1 badge badge-success badge-inline badge-pill" style="margin-left: 50px;">New</span> </a>


                            <a class="cs-border-bottom-nav" href="#"><i class="fas fa-shapes box cfs-15 mr-2"></i>
                                Suggestion Criteria </a>

                            <a class="cs-border-bottom-nav" href="#"><i
                                    class="fas fa-headphones-alt desktop cfs-15 mr-2"></i> Customer Care </a>


                            <a class="cs-border-bottom-nav" href="#"><i
                                    class="fas fa-user-circle cfs-15 mr-2 box"></i> Recent View Products </a>


                            <a class="cs-border-bottom-nav" href="#"><i
                                    class="fas fa-briefcase cfs-15 mr-2 desktop "></i> Be a Seller </a>

                            <a class="cs-border-bottom-nav" href="#"><i class="fas fa-ticket-alt box cfs-15 mr-2"></i>
                                Support Tickets </a>


                            <a href="#"><i class="fab fa-apple  cfs-15 mr-1 user"></i> <i
                                    class="fab fa-android cfs-15 mr-1 user"></i> Download App </a>


                        </div>
                    </div>
                </div>
                <div class="d-block d-lg-block ml-3 mr-0 ">
                    <div class="" id="wishlist">
                        @include('frontend.partials.wishlist')
                    </div>

                </div>

                <div class="d-block d-lg-block ml-3 mr-lg-5 box_cart">


                    <div class="" id="wishlist">
                        @include('frontend.partials.cart')

                    </div>
                </div>
            </div>
            <div class="flex-grow-1  d-flex align-items-center bg-white  search-radius d-lg-none ">
                <div class="position-relative flex-grow-1 ">
                    <div class="d-flex position-relative align-items-center">
                        <div class="input-group " style="width: 100%;">
                            <input type="text" class="border-0  form-control" id="" name="q"
                                placeholder="Search for Product and More" autocomplete="off">
                            <div class="dropdown search-arrow">
                                <button class="dropbtn "><i
                                        class="fas fa-angle-down fs-15 text-color-black"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                            <div class="" style="border-right: 3px solid orange;
                    height: 24px;
                    padding: 0px 3px 0;
                    margin: 6.5px 0 0 0;"></div>
                            <div class="input-group-append d-block ">
                                <button class="btn btn-info" type="submit"
                                    style="padding-top: 10px;padding-bottom: 2px;padding-right: 9px;padding-left:11px;">

                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</header>

<div class="menu-item-div">

    <div class="container ">

        <div id="mega-menu" class="hide-on-med-and-down">
            <ul class="sub-nav list-inline mb-0 pl-0 text-center">


                @foreach (\App\Models\Category::where('published', 1)->get() as $category)
                    <li class="list-inline-item mr-0"><a
                            href="{{ route('products.category', $category->slug) }}">{{ $category->name }}
                            <i class="fas fa-angle-down top-icon "></i>
                            <span class="boreder-menu"></span>
                        </a>
                        <div class="container" style="border-radius: 3px;">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="mega-menu-container  w-100 ">
                                        <div class="mega-menu-grid ">
                                            <div class="sub-nav-column col">
                                                <ul class="collection row">
                                                    @foreach (\App\Models\SubCategory::where('category_id', $category->id)->where('published', 1)->get()
    as $subcategory)
                                                        <li class="collection-item  col-md-3 "><a
                                                                href="{{ route('products.subcategory', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                            <i class="fas fa-angle-right top-icon color-black"></i>
                                                            <ul>
                                                                @foreach (\App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->where('published', 1)->get()
    as $subsubcategory)
                                                                    <li class=" collection_item_sub"><a
                                                                            href="{{ route('products.subsubcategory', $subsubcategory->slug) }}">{{ $subsubcategory->name }}</a>
                                                                    </li>
                                                                @endforeach


                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach


                <li class="list-inline-item mr-0 zone-item ">`
                    <i class="fas fa-bolt"></i>
                    <a href="{{ route('frontend.try_guide') }}"
                        class=" cus-fs-0
                     d-inline-block fw-600 hov-opacity-100 text-reset">
                        Try Guide
                        <span class="boreder-menu"></span>
                    </a>
                </li>
                <li class="list-inline-item mr-0 zone-item ">
                    <i class="fas fa-tag"></i>
                    <a href="{{ route('flash-deals') }}"
                        class=" cus-fs-0
                     d-inline-block fw-600 hov-opacity-100 text-reset">
                        Offers
                        <span class="boreder-menu"></span>
                    </a>
                </li>





                <li class="list-inline-item mr-0 zone-item ">
                    <i class="fas fa-bolt"></i>
                    <a href="" class=" cus-fs-0
                     d-inline-block fw-600 hov-opacity-100 text-reset">
                        ZONES
                        <i class="fas fa-angle-down top-icon"></i>
                    </a>
                    <div class="sub-nav-column col-2 col-md-2 " style="margin-left: 77%;border-radius:3px">
                        <ul class="collection text-left">

                            <li class="collection-item cs-border-bottom"> <img class="mr-3 "
                                    src='{{ static_asset('/assets/img/ps-1.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Consols</a>

                            <li class="collection-item cs-border-bottom"> <img class="mr-3 "
                                    src='{{ static_asset('/assets/img/p-3.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            <li class="collection-item cs-border-bottom"> <img class="mr-3"
                                    src='{{ static_asset('/assets/img/ps-1.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            <li class="collection-item cs-border-bottom"> <img class="mr-3"
                                    src='{{ static_asset('/assets/img/ps-2.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            <li class="collection-item cs-border-bottom"> <img class="mr-3"
                                    src='{{ static_asset('/assets/img/ps-1.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            <li class="collection-item cs-border-bottom"> <img class="mr-3"
                                    src='{{ static_asset('/assets/img/ps-2.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            <li class="collection-item"> <img class="mr-3"
                                    src='{{ static_asset('/assets/img/ps-1.png') }}' alt=""
                                    style=width:55px;height:55px;padding:2px;><a href="#">Desk Gammer</a>

                            </li>

                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-device-nav d-md-block">
    <div class="container">
        <ul class="list-inline mb-0 pl-0  text-center menu-padding">
            <li class="list-inline-item mr-0">
                <a href="" class=" cus-fs-0 d-inline-block fw-600 hov-opacity-100 text-reset">
                    Try Guide
                    <span class="boreder-menu"></span>
                </a>

            </li>
            <li class="list-inline-item mr-0">
                <a href="" class=" cus-fs-0  d-inline-block fw-600 hov-opacity-100 text-reset">
                    Build Pc
                    <span class="boreder-menu"></span>
                </a>
            </li>
            <li class="list-inline-item mr-0">
                <i class="fas fa-bolt"></i>
                <a href="zone.php"
                    class=" cus-fs-0
                   d-inline-block fw-600 hov-opacity-100 text-reset">
                    Zones

                </a>
            </li>
            <li>

            </li>
        </ul>
    </div>
</div>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $("#header").addClass("active");
        } else {
            $("#header").removeClass("active");
        }
    });
</script>
