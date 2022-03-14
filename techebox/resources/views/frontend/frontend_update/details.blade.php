@extends('frontend.layouts.app')

@section('meta_title'){{ $update->meta_title }}@stop

@section('meta_description'){{ $update->meta_description }}@stop

@section('meta_keywords'){{ $update->meta_keywords }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $update->meta_title }}">
    <meta itemprop="description" content="{{ $update->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($update->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $update->meta_title }}">
    <meta name="twitter:description" content="{{ $update->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($update->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $update->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('frontend_update.details', $update->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($update->meta_img) }}" />
    <meta property="og:description" content="{{ $update->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('content')

<section class="py-4">
    <div class="container">
        <div class="mb-4">
            <img
                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ uploaded_asset($update->banner) }}"
                alt="{{ $update->title }}"
                class="img-fluid lazyload w-100"
            >
        </div>
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="bg-white rounded shadow-sm p-4">
                    <div class="border-bottom">
                        <h1 class="h4">
                            {{ $update->title }}
                        </h1>

                        @if($update->category != null)
                        <div class="mb-2 opacity-50">
                            <i>{{ $update->category->category_name }}</i>
                        </div>
                        @endif
                    </div>
                    <div class="mb-4 overflow-hidden">
                        {!! $update->description !!}
                    </div>

                    @if (get_setting('facebook_comment') == 1)
                    <div>
                        <div class="fb-comments" data-href="{{ route("frontend_update",$update->slug) }}" data-width="" data-numposts="5"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
    @if (get_setting('facebook_comment') == 1)
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId={{ env('FACEBOOK_APP_ID') }}&autoLogAppEvents=1" nonce="ji6tXwgZ"></script>
    @endif
@endsection
