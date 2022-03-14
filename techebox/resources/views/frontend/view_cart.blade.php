@extends('frontend.layouts.app')

@section('content')
<div class="" style="background-color: #ffdf00;margin-top: 0px;">

    <div class="container p-3">
      <div class="text-center m-0  mr-0">
        <ul class="nav nav-tabs shadow-md border-radious-5" style="background-color: white;
        height:30px;
width: 27%;
margin-left:40%;
color: black;">
          <li class=" inline-item text-center"> <a data-toggle="tab" class="nav-link fs-14 fw-700 "
          href="my-box"
          style="margin-left:5px;margin-top:-4px;"><i class="icon fas fa-box mr-2"></i>My Box <span class=" d-flex d-lg-flex left-badge ml-2 badge badge-primary badge-inline badge-pill" style="margin-top: 1px;margin-left:7px;">15</span> </a> </li>

          <div class="" style="border-right: 3px solid orange;
                                       height: 30px;
                                       margin: 0px ;
                                       margin-left:10px;
                                     "></div>

          <li class="inline-item text-center mr-2"> <a data-toggle="tab" class="nav-link fs-14 fw-700 "
          href="#my-digital-box"
          style="margin-right:-100px;margin-top:-4px;"><i class="icon fas fa-box mr-2"></i>Digital Box <span class=" d-flex d-lg-flex left-badge ml-2 badge badge-primary badge-inline badge-pill" style="margin-top: 1px;">15</span>
        </a> </li>


        </ul>
      </div>
    </div>
  </div>
  <div class="" style="background-color: #F7ff00;">

    <div class="container p-1 ">

              <div class="form-inline " style="margin-left:40%;">
                    <div class="form-group">
                        <label for="" class="col-xs-2 control-label mr-2"><a href="#" class="fs-14 fw-700 ml-4 text-black"><i class="fas fa-location-arrow "></i> Delivery to  </a></label>
                        <input type="text" class="form-control" placeholder="431001"/>
                    </div>
                </div>


    {{-- <div class="text-center">
        <a href="#" class="fs-14 fw-700 ml-4 text-black"><i class="fas fa-location-arrow "></i> Delivery to 431001 </a>

      </div> --}}

    </div>
  </div>
<section class="pt-5 mb-4">
    <div class="container" style="width: 66%;">
        <div class=" slider-padding bg-white h-md-100px border-radious-5">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('1. My Cart')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('2. Shipping info')}}</h3>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('3. Delivery info')}}</h3>
                        </div>
                    </div> --}}
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('3. Payment')}}</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">{{ translate('4. Confirmation')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="mb-4" id="cart-summary">
    <div class="container">

            <div class="row">
                <div class="col-xxl-8 col-xl-10 mx-auto">
                    <div class="shadow-sm bg-white p-3 p-lg-4 rounded text-left">
                        <div class="mb-4">
                            <div class="row gutters-5 d-none d-lg-flex border-bottom mb-3 pb-3">
                                <div class="col-md-5 fw-600">{{ translate('Product')}}</div>
                                <div class="col fw-600">{{ translate('Price')}}</div>

                                <div class="col fw-600">{{ translate('Quantity')}}</div>
                                <div class="col fw-600">{{ translate('Total')}}</div>
                                <div class="col fw-600">{{ translate('Save for Later')}}</div>
                                <div class="col fw-600">{{ translate('Service Center')}}</div>
                                <div class="col-auto fw-600">{{ translate('Remove')}}</div>
                            </div>
                            <ul class="list-group list-group-flush">



                                    <li class="list-group-item px-0 px-lg-3">
                                        <div class="row gutters-5">
                                            <div class="col-lg-5 d-flex">
                                                <span class="mr-2 ml-0">
                                                    <img
                                                        src="public/assets/img/products/m6.jpg "
                                                        class="img-fit size-130px rounded"
                                                        alt=" "
                                                    >
                                                </span>
                                                <span class="fs-14 text-truncate">Product name with choice
                                                    <div class="rating rating-sm mt-1">
                                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="las la-star  text-white ml-1"></i></span>
                                                        <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-warning">Assured</span>
                                                        <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-danger">Hot</span>
                                                      </div>
                                                      <div class="mt-1">
                                                        <span class="fw-600 text-color-black fs-15 opacity-40"> Delivery By Fri 20</span>
                                                        <span class="c-border-right  m-1"></span>
                                                        <span class="fw-600 text-color-black fs-18 text-success"> Free</span>
                                                    </div>
                                                </span>
                                                <div class="absolute-top-left" style="margin-top: 20px;">
                                                    <div class="bg-warning">
                                                    <span class="badge  d-block"><i
                                                        class="fas fa-shipping-fast "></i></span>
                                                        <span class="badge d-block"><i
                                                            class="fas fa-box-open"></i></span>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="col-lg col-4 order-1 order-lg-0 my-1 my-lg-0 mr-4">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">{{ translate('Price')}}</span>
                                                <span class="fw-700 fs-18 d-block mr-4" style="margin-left: -30px;"> $ 100000</span>
                                                <span class="product_text " style="margin-left: -30px;">
                                                    <del class="fw-600 fs-14 opacity-50"><i class="las la-rupee-sign"></i>20.000</del>
                                                    <span class="fw-600  ml-1 cfs-14 green-color">40% off</span>

                                                </span>
                                            </div>

                                            <div class="col-lg col-4 order-3 order-lg-0 my-3 my-lg-0">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">{{ translate('Total')}}</span>
                                                <span class="fw-600 fs-16 text-primary">1</span>
                                            </div>
                                            <div class="col-lg-auto col-6 order-5 order-lg-0 ">
                                                <a href=" #" class="btn btn-icon btn-sm btn-danger btn-circle"
                                                style="margin-right:60px; ">
                                                    <i class="far fa-bookmark"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                                <a href=" #" class="btn btn-icon btn-sm btn-success btn-circle" style="margin-right:40px;">
                                                    <i class="fas fa-tools"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                                <a href=" #" class="btn btn-icon btn-sm btn-soft-primary btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                            </ul>
                        </div>

                        <div class="px-3 py-2 lh-4 d-flex border-top  justify-content-between">
                            <span class="fw-500  fs-16">{{translate('Price(1 item)')}}</span>
                            <span class="fw-600 fs-15">$1000</span>
                        </div>
                        <div class="px-3 py-2 lh-4 d-flex justify-content-between">
                            <span class="fw-500  fs-16">{{translate('Discount')}}</span>
                            <span class="fw-600 fs-15 text-success">$1000</span>
                        </div>
                        <div class="px-3 py-2 lh-4 d-flex justify-content-between">
                            <span class="fw-500  fs-16">{{translate('Discount')}}</span>
                            <span class="fw-600 fs-15">$1000</span>
                        </div>
                        <div class="px-3 py-2 pt-4 mb-4 border-top d-flex justify-content-between">
                            <span class="fw-700 fs-18">{{translate('Subtotal')}}</span>
                            <span class="fw-700 fs-18 text-success">$1000</span>
                        </div>
                        <div class="px-3 py-2 lh-4 border-top d-flex justify-content-between">
                            <span class="fw-600 fs-16 " style="color: #388e3c">You will save 20Rs. on this order</span>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                                <a href="{{ route('home') }}" class="btn btn-link">
                                    <i class="las la-arrow-left"></i>
                                    {{ translate('Return to shop')}}
                                </a>
                            </div>
                            <div class="col-md-6 text-center text-md-right">
                                @if(Auth::check())
                                    <a href="{{ route('checkout.shipping_info') }}" class="btn btn-primary fw-600">
                                        {{ translate('Continue to Shipping')}}
                                    </a>
                                @else
                                    <button class="btn btn-success fw-600" onclick="showCheckoutModal()">{{ translate('Continue to Shipping')}}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                    <ul class="list-group list-group-flush mt-4">



                        <li class="list-group-item px-0 px-lg-3">
                            <div class="row gutters-5">
                                <div class="col-lg-5 d-flex">
                                    <span class="mr-2 ml-0">
                                        <img
                                            src="public/assets/img/products/m6.jpg "
                                            class="img-fit size-130px rounded"
                                            alt=" "
                                        >
                                    </span>
                                    <span class="fs-14 text-truncate">Product name with choice
                                        <div class="rating rating-sm mt-1">
                                            <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="las la-star  text-white ml-1"></i></span>
                                            <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-warning">Assured</span>
                                            <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-danger">Hot</span>
                                          </div>
                                          <div class="mt-1">
                                            <span class="fw-600 text-primary fs-15 "> Currently Out of Stock</span>
                                            <span class=" ml-2"></span>
                                           <a href=""> <span class="fw-600 fs-13 text-info"><u>Find Similar</u> </span></a>
                                        </div>
                                    </span>
                                    <div class="absolute-top-left" style="margin-top: 20px;">
                                        <div class="bg-warning">
                                        <span class="badge  d-block"><i
                                            class="fas fa-shipping-fast "></i></span>
                                            <span class="badge d-block"><i
                                                class="fas fa-box-open"></i></span>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg col-4 order-1 order-lg-0 my-1 my-lg-0 mr-4">
                                    <span class="opacity-60 fs-12 d-block d-lg-none">{{ translate('Price')}}</span>
                                    <span class="fw-700 fs-18 d-block mr-4" style="margin-left: -30px;"> $ 100000</span>
                                    <span class="product_text " style="margin-left: -30px;">
                                        <del class="fw-600 fs-14 opacity-50"><i class="las la-rupee-sign"></i>20.000</del>
                                        <span class="fw-600  ml-1 cfs-14 green-color">40% off</span>

                                    </span>
                                </div>

                                <div class="col-lg col-4 order-3 order-lg-0 my-3 my-lg-0">
                                    <span class="opacity-60 fs-12 d-block d-lg-none">{{ translate('Total')}}</span>
                                    <span class="fw-600 fs-16 text-primary">1</span>
                                </div>
                                <div class="col-lg-auto col-6 order-5 order-lg-0 ">
                                    <a href=" #" class="btn btn-icon btn-sm btn-danger btn-circle"
                                    style="margin-right:60px; ">
                                        <i class="far fa-bookmark"></i>
                                    </a>
                                </div>
                                <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                    <a href=" #" class="btn btn-icon btn-sm btn-success btn-circle" style="margin-right:40px;">
                                        <i class="fas fa-tools"></i>
                                    </a>
                                </div>
                                <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                    <a href=" #" class="btn btn-icon btn-sm btn-soft-primary btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </li>

                </ul>
            </div>
                </div>
            </div>



    </div>
</section>



<section class="mb-4">
    <div class="container " style="width: 70%;">
  <div class=" bg-white  border-radious-5">
  <div class="row   pb-2 pl-2 pr-2">
    <div class="col-3 text-center">
    <div class="position-relative">
     <a href="#" class="d-block  p-4" >
     <img class=" img-fit lazyload mx-auto  h-md-130px  rounded-circle bg-light" src="public/assets/img/3.png">
            </a>
     <span class=""> Safe & Secure Payment </span>
    </div>
    </div>
    <div class="col-3 text-center">
    <div class="position-relative">
    <a href="#" class="d-block  p-4" >
    <img class=" img-fit lazyload mx-auto h-md-130px  rounded-circle bg-light" src="public/assets/img/">
            </a>
         <span class=""> Easy Reture Refund </span>
    </div>
    </div>
    <div class="col-3 text-center">
    <div class="position-relative">
    <a href="#" class="d-block  p-4" >
    <img class=" img-fit lazyload mx-auto h-md-130px   rounded-circle bg-light" src="public/assets/img/">
            </a>
     <span class=""> 100% Authentic Product </span>
    </div>
    </div>
    <div class="col-3 text-center">
    <div class="position-relative">
    <a href="#" class="d-block  p-4" >
    <img class=" img-fit lazyload mx-auto h-md-130px   rounded-circle bg-light" src="public/assets/img/">
            </a>
         <span class=" " >  Free Delivery</span>
    </div>
    </div>
</div>
  </div>
    </div>
  </section>
  <section class="mb-4" style="margin-top: 20px;">
    <div class="container ">
    <div class="pl-15px pr-15px bg-white  border-radious-3">
  <div class="col-12 text-center p-2">
   <h4 class="ml-4"><i class="far fa-bookmark mr-3"></i>Saved for Later (5)</h4>
    </div>
    </div>
</div>
  </section>


  <section class="mb-4" id="cart-summary">
    <div class="container">

            <div class="row">
                <div class="col-xxl-8 col-xl-10 mx-auto">
                    <div class="shadow-sm bg-white p-3 p-lg-4 rounded text-left">
                        <div class="mb-4">
                            <div class="row gutters-5 d-none d-lg-flex border-bottom mb-3 pb-3">
                                <div class="col-md-5 fw-600">{{ translate('Product')}}</div>
                                <div class="col fw-600">{{ translate('Price')}}</div>
                                <div class="col fw-600">{{ translate('Move to Box')}}</div>
                                <div class="col fw-600">{{ translate('Service Center')}}</div>
                                <div class="col-auto fw-600">{{ translate('Removed Saved')}}</div>
                            </div>
                            <ul class="list-group list-group-flush">



                                    <li class="list-group-item px-0 px-lg-3">
                                        <div class="row gutters-5">
                                            <div class="col-lg-5 d-flex">
                                                <span class="mr-2 ml-0">
                                                    <img
                                                        src="public/assets/img/products/m6.jpg "
                                                        class="img-fit size-130px  rounded"
                                                        alt=" "
                                                    >
                                                </span>
                                                <span class="fs-14 ">Product name with choice
                                                    <div class="rating rating-sm mt-1">
                                                        <span class="c-badge  badge-inline fs-11  c-badge-pill badge-success">4.3 <i class="fas fa-star text-white ml-1"></i></span>
                                                        <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-warning">Assured</span>
                                                        <span class="c-badge  badge-inline fs-11 text-white c-badge-pill badge-danger">Hot</span>
                                                      </div>
                                                      <div class="mt-1">
                                                        <span class="fw-600 text-color-black fs-15 opacity-40"> Delivery By Fri 20</span>
                                                        <span class="c-border-right  m-1"></span>
                                                        <span class="fw-600 text-color-black fs-18 text-success"> Free</span>
                                                    </div>
                                                </span>

                                            </div>

                                            <div class="col-lg col-4 order-1 order-lg-0 my-1 my-lg-0 mr-4">
                                                <span class="opacity-60 fs-12 d-block d-lg-none">{{ translate('Price')}}</span>
                                                <span class="fw-700 fs-18 d-block mr-4" style="margin-left: -30px;"> $ 100000</span>
                                                <span class="product_text " style="margin-left: -30px;">
                                                    <del class="fw-600 fs-14 opacity-50"><i class="las la-rupee-sign"></i>20.000</del>
                                                    <span class="fw-600  ml-1 cfs-14 green-color">40% off</span>

                                                </span>
                                            </div>




                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-center">
                                                <a href=" #" class="btn btn-icon btn-sm btn-warning btn-circle"
                                                style="margin-right: 110px;">
                                                    <i class="fas fa-box-open"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                                <a href=" #" class="btn btn-icon btn-sm btn-success btn-circle" style="margin-right:140px;">
                                                    <i class="fas fa-tools"></i>
                                                </a>
                                            </div>

                                            <div class="col-lg-auto col-6 order-5 order-lg-0 text-right">
                                                <a href=" #" class="btn btn-icon btn-sm btn-soft-primary btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </div>



    </div>
</section>
@endsection

@section('modal')
    <div class="modal fade" id="login-modal">
        <div class="modal-dialog modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-600">{{ translate('Login')}}</h6>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                            @csrf
                            @if (addon_is_activated('otp_system') && env("DEMO_MODE") != "On")
                                <div class="form-group phone-form-group mb-1">
                                    <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                </div>

                                <input type="hidden" name="country_code" value="">

                                <div class="form-group email-form-group mb-1 d-none">
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" id="email" autocomplete="off">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class=opacity-60>{{  translate('Remember Me') }}</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>
                            </div>
                        </form>

                    </div>
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>
                        <a href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>
                    </div>
                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                        <div class="separator mb-3">
                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-3">
                            @if (get_setting('facebook_login') == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                            @endif
                            @if(get_setting('google_login') == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                        <i class="lab la-google"></i>
                                    </a>
                                </li>
                            @endif
                            @if (get_setting('twitter_login') == 1)
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function removeFromCartView(e, key){
            e.preventDefault();
            removeFromCart(key);
        }

        function updateQuantity(key, element){
            $.post('{{ route('cart.updateQuantity') }}', {
                _token   :  AIZ.data.csrf,
                id       :  key,
                quantity :  element.value
            }, function(data){
                updateNavCart(data.nav_cart_view,data.cart_count);
                $('#cart-summary').html(data.cart_view);
            });
        }

        function showCheckoutModal(){
            $('#login-modal').modal();
        }

        // Country Code
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.iso2 == 'bd'){
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                $('input[name=phone]').val(null);
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                $('input[name=email]').val(null);
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection
