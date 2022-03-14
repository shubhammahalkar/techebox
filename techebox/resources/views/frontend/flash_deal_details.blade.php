@extends('frontend.layouts.app')

@section('content')

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


        <div class="mb-4">
            <div class="container ">
                <div class="row gutters-10 ">

                        <div class="col-3 col-xl-3 col-md-3 col-6">
                           <a href="{{$flash_deal->banner_1_url}}" ><div class="mb-3 mb-lg-0 ">
                                <img src="{{uploaded_asset($flash_deal->banner_1_img)}}" alt="Rotech Ecom-site" class="img-fluid lazyload  border-radious-5" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)">
                            </div> </a>
                        </div>
                        <div class="col-3 col-xl-3 col-md-3 col-6">
                           <a href="{{$flash_deal->banner_2_url}}" ><div class="mb-3 mb-lg-0 ">
                                <img src="{{uploaded_asset($flash_deal->banner_2_img)}}" alt="Rotech Ecom-site" class="img-fluid lazyload  border-radious-5" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)">
                            </div> </a>
                        </div>
                        <div class="col-3 col-xl-3 col-md-3 col-6">
                           <a href="{{$flash_deal->banner_3_url}}" ><div class="mb-3 mb-lg-0 ">
                                <img src="{{uploaded_asset($flash_deal->banner_3_img)}}" alt="Rotech Ecom-site" class="img-fluid lazyload  border-radious-5" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)">
                            </div> </a>
                        </div>
                        <div class="col-3 col-xl-3 col-md-3 col-6">
                           <a href="{{$flash_deal->banner_4_url}}" ><div class="mb-3 mb-lg-0 ">
                                <img src="{{uploaded_asset($flash_deal->banner_4_img)}}" alt="Rotech Ecom-site" class="img-fluid lazyload  border-radious-5" style="box-shadow: 16px 16px 11px 0 rgb(0 0 0 / 5%)">
                            </div> </a>
                        </div>

                </div>
            </div>
        </div>

        <section class="mb-4">
            <div class="container">
                <div class="text-center my-4 text-{{ $flash_deal->text_color }}">
                    <h1 class="h2 fw-600">{{ $flash_deal->title }}</h1>
                    <div class="aiz-count-down aiz-count-down-lg ml-3 align-items-center justify-content-center" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                    @php
                        $count = (App\Models\FlashDeal::all()->count());
                    @endphp

                    <h2 class="fw-500 fs-20">Items ({{$count}})</h2>
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
    @else
        <div style="background-color:{{ $flash_deal->background_color }}">
            <section class="text-center">
                <img src="{{ uploaded_asset($flash_deal->banner) }}" alt="{{ $flash_deal->title }}" class="img-fit w-100">
            </section>
            <section class="pb-4">
                <div class="container">
                    <div class="text-center text-{{ $flash_deal->text_color }}">
                        <h1 class="h3 my-4">{{ $flash_deal->title }}</h1>
                        <p class="h4">{{  translate('This offer has been expired.') }}</p>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection
