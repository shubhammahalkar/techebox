@extends('frontend.layouts.app')

@section('meta_title'){{ $zone->meta_title }}@stop

@section('meta_description'){{ $zone->meta_description }}@stop

@section('meta_keywords'){{ $zone->tags }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $zone->meta_title }}">
    <meta itemprop="description" content="{{ $zone->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($zone->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $zone->meta_title }}">
    <meta name="twitter:description" content="{{ $zone->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($zone->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $zone->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ URL($zone->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($zone->meta_img) }}" />
    <meta property="og:description" content="{{ $zone->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ $zone->getTranslation('title') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('custom-zone.show_custom_zone', $zone->slug ) }}">"{{ $zone->title }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
	<div class="container">
        <div class="p-4 bg-white rounded shadow-sm overflow-hidden mw-100 text-left">
		    @php echo $zone->getTranslation('content'); @endphp
        </div>
	</div>
</section>
@endsection
