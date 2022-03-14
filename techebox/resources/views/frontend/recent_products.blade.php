@extends('frontend.layouts.app')

@section('content')


    <div style="background-color:#f9f9f9">

        <section class="pb-4">
            <div class="container">
                <div class="text-center my-4 text-secondary">
                    {{-- <h1 class="h3">{{ $flash_deal->title }}</h1> --}}
                    {{-- <div class="countdown countdown-sm countdown--style-1" data-countdown-date="{{ date('m/d/Y', $flash_deal->end_date) }}" data-countdown-label="show"></div> --}}
                </div>
                <div class="gutters-5 row">
                    @foreach ($flash_deal as $key => $flash_deal_product)
                        @php
                            $product = \App\Product::find($flash_deal_product->product_id);
                        @endphp

                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                <div class="product-card-2 card card-product shop-cards shop-tech mb-2">
                                    <div class="card-body p-0">

                                        <div class="card-image">
                                            <a href="{{ route('product', $product->slug) }}" class="d-block text-center" >
                                                <img class="img-fit lazyload" src="{{ asset('frontend/images/placeholder.jpg') }}" data-src="{{ asset($product->flash_deal_img) }}" alt="{{ __($product->name) }}">
                                            </a>
                                        </div>

                                        <div class="p-3">
                                            <div class="price-box">
                                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                                    <del class="old-product-price strong-400">{{ home_base_price($product->id) }}</del>
                                                @endif
                                                <?php if ($product->assured == 1) { ?>
                                            <div class="">
                                                <span class="badge badge-warning">Assured</span>
                                            </div>
                                            <?php } ?>
                                                <span class="product-price strong-600">{{ home_discounted_base_price($product->id) }}</span>
                                            </div>
                                            <h2 class="product-title p-0 mt-2">
                                                <a href="{{ route('product', $product->slug) }}" class="text-truncate">{{ __($product->name) }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>


@endsection
