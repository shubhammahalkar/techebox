@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">{{ translate('All Category') }}</h1>
        </div>
    </div>

    <div class="row">



        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        {{ translate('Category Info') }}
                    </h5>
                </div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">{{ translate('Selected Brand') }}</label>
                        <input type="text" placeholder="{{ translate('Name') }}" name="name"
                            value="{{ $product->name }}" class="form-control" required disabled>

                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Bank Offers') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{ route('products.submit_offers', $product->id) }}" method="post">
                            @csrf
                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label"
                                        for="products">{{ translate('Select Offers') }}</label>
                                    <div class="col-sm-9">
                                        <select name="bank_offers[]" id="bank_offers" class="form-control aiz-selectpicker"
                                            multiple data-placeholder="{{ translate('Choose Products') }}"
                                            data-live-search="true" data-selected-text-format="count"
                                            data-selected="{{ $product->bank_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 1)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="bank_offers_table">
                                            @if (json_decode($product->bank_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($product->bank_offers)]);
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">Update</button>
                    </div>
                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('EMI Offers') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.submit_offers', $product->id) }}" method="post">
                        @csrf

                        <div class="form-group">

                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label"
                                        for="products">{{ translate('Select Offers') }}</label>
                                    <div class="col-sm-9">
                                        <select name="emi_offers[]" id="emi_offers" class="form-control aiz-selectpicker"
                                            multiple data-placeholder="{{ translate('Choose Products') }}"
                                            data-live-search="true" data-selected-text-format="count"
                                            data-selected="{{ $product->emi_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 3)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="emi_offers_table">
                                            @if (json_decode($product->emi_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($product->emi_offers)]);
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Company Offers') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.submit_offers', $product->id) }}" method="post">
                        @csrf
                        <div class="form-group">

                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label"
                                        for="products">{{ translate('Select Offers') }}</label>
                                    <div class="col-sm-9">
                                        <select name="company_offers[]" id="company_offers"
                                            class="form-control aiz-selectpicker" multiple
                                            data-placeholder="{{ translate('Choose Products') }}" data-live-search="true"
                                            data-selected-text-format="count"
                                            data-selected="{{ $product->company_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 2)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="company_offers_table">
                                            @if (json_decode($product->company_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($product->company_offers)]);
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Other Offers') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.submit_offers', $product->id) }}" method="post">
                        @csrf
                        <div class="form-group">

                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label"
                                        for="products">{{ translate('Select Offers') }}</label>
                                    <div class="col-sm-9">
                                        <select name="other_offers[]" id="other_offers"
                                            class="form-control aiz-selectpicker" multiple
                                            data-placeholder="{{ translate('Choose Products') }}" data-live-search="true"
                                            data-selected-text-format="count"
                                            data-selected="{{ $product->other_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 4)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="other_offers_table">
                                            @if (json_decode($product->other_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($product->company_offers)]);
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Installation Service') }}</h5>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Status') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox"   name="installation" id="installation"
                                    value="{{ $product->id }}" <?php if ($product->installation) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                        <br>
                        <textarea id="installation_description" name="installation_description" rows="5" class="aiz-text-editor"> {{$product->installation_description}}</textarea>

                    </div>
                    <input type="button" value="update" onclick="update_installation({{$product->id}})" class="btn btn-primary float-right"/>

                </div>
            </div>



                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{ translate('Return & Replacement Policy') }}
                        </h5>
                    </div>

                    <div class="card-body">
                        <textarea class="aiz-text-editor" id="randr_policy" name="randr_policy">{{$product->return_and_replacement_policy}}</textarea>
                        <input type="button" value="update" onclick="update_RandR_policy({{$product->id}})" class="btn btn-primary float-right"/>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{ translate('Additional Text') }}
                        </h5>
                    </div>

                    <div class="card-body">
                        <textarea class="aiz-text-editor" id="additional_text" name="additional_text">{{$product->additional_text}}</textarea>
                        <input type="button" value="update" onclick="update_additional_text({{$product->id}})" class="btn btn-primary float-right"/>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Delivery Boy Guide') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.delivery_boy_guide', $product->id) }}" method="post">
                            @csrf
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 control-label"
                                            for="products">{{ translate('Select Guide') }}</label>
                                        <div class="col-sm-9">
                                            <select name="delivery_boy_guide" id=" "
                                                class="form-control aiz-selectpicker"
                                                data-placeholder="{{ translate('Choose Products') }}" data-live-search="true"
                                                data-selected-text-format="count"
                                                data-selected="{{ $product->delivery_boy_guide }}">
                                                <option value="0"> -- select Guide --</option>
                                                @foreach (\App\Models\DeliveryBoyGuide::orderBy('created_at', 'desc')->get()
            as $guide)
                                                    <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Vendor Packaging Guide') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.vendor_package_guide', $product->id) }}" method="post">
                            @csrf
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 control-label"
                                            for="products">{{ translate('Select Guide') }}</label>
                                        <div class="col-sm-9">
                                            <select name="vendor_package_guide" id=" "
                                                class="form-control aiz-selectpicker"
                                                data-placeholder="{{ translate('Choose Products') }}" data-live-search="true"
                                                data-selected-text-format="count"
                                                data-selected="{{ $product->vendor_packaging_guide }}">
                                                <option value="0"> -- select Guide --</option>
                                                @foreach (\App\Models\VendorPackagingGuide::orderBy('created_at', 'desc')->get()
            as $guide)
                                                    <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Buying Guide') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.buying_guide', $product->id) }}" method="post">
                            @csrf
                            <div class="form-group">

                                <div class="col-lg-10">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 control-label"
                                            for="products">{{ translate('Select Guide') }}</label>
                                        <div class="col-sm-9">
                                            <select name="buying_guide" id=" "
                                                class="form-control aiz-selectpicker"
                                                data-placeholder="{{ translate('Choose Products') }}" data-live-search="true"
                                                data-selected-text-format="count"
                                                data-selected="{{ $product->buying_guide }}">
                                                <option value="0"> -- select Guide --</option>
                                                @foreach (\App\Models\BuyingGuide::orderBy('created_at', 'desc')->get()
            as $guide)
                                                    <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('FAQs') }}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.updatefaq',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <div class="home-banner1-target">

                                    @if ( json_decode($product->faq_questions))
                                        @foreach (json_decode($product->faq_questions) as $key => $value)
                                            <div class="row gutters-5">

                                                <div class="col-md">
                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Question" name="questions[]" value="{{json_decode($product->faq_questions)[$key]}} ">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Answer" name="answers[]" value="{{json_decode($product->faq_answers)[$key]}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-auto">
                                                    <div class="form-group">
                                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                            <i class="las la-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                         @endforeach
                                    @endif
                                </div>
                                <button
                                    type="button"
                                    class="btn btn-soft-secondary btn-sm"
                                    data-toggle="add-more"
                                    data-content='
                                    <div class="row gutters-5">

                                        <div class="col-md">
                                            <div class="form-group">

                                                <input type="text" class="form-control" placeholder="Question" name="questions[]">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">

                                                <input type="text" class="form-control" placeholder="Answer" name="answers[]">
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="form-group">
                                                <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                    <i class="las la-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>'
                                    data-target=".home-banner1-target">
                                    {{ translate('Add New') }}
                                </button>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>


        </div>
        <div class="col-lg-4">




            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        {{ translate('Return & Replacement Configuration') }}
                    </h5>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Return & Replacement') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" id="return_and_replacement" name="return_and_replacement"
                                    <?php if($product->return_and_replacement) { echo "checked";} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" id="return_and_replacement_type"
                            name="retun_and_replacement_type" data-selected="{{ $product->return_and_replacement_type }}">
                            <option value="">Choose a Type</option>
                            <option value="replacement">{{ translate('Replacement') }}</option>
                            <option value="return">{{ translate('Return') }}</option>

                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right" onclick="updateRandR({{ $product->id }})"
                            type="button" value="Save" />
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        {{ translate('Instant Return & Replacement Configuration') }}
                    </h5>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Instant Return & Replacement') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" id="instant_return_and_replacement"
                                    name="instant_return_and_replacement" <?php if ($product->instant_return_and_replacement) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" id="instant_return_and_replacement_type"
                            name="instant_return_and_replacement_type" data-selected="{{ $product->instant_return_and_replacement_type }}">
                            <option value="">Choose a Type</option>

                            <option value="instant_return">{{ translate('Instant Return') }}</option>
                            <option value="instant_replacement">{{ translate('Instant Replacement') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right"
                            onclick="updateInstantRandR({{ $product->id }})" type="button" value="Save" />
                    </div>
                </div>
            </div>





            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Delivery Type') }}</h5>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Cash On Delivery') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_COD(this)" name="cash_on_delivery"
                                    value="{{ $product->id }}" <?php if ($product->cash_on_delivery) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('On Day Delivery') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_on_day_delivery(this)" name="on_day_delivery"
                                    value="{{ $product->id }}" <?php if ($product->on_day_delivery) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>



                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Brand Approval Status') }}</h5>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Status') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_brand_approval(this)" name="brand_approval"
                                    value="{{ $product->id }}" <?php if ($product->brand_approval) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">
                        {{ translate('Packaging Method') }}
                    </h5>
                </div>

                <div class="card-body">

                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" id="package_method"
                            name="package_method" data-selected="{{ $product->package_method }}">
                            <option value="">Choose a Type</option>
                            @foreach (App\Models\PackageMethod :: all() as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach


                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right"
                            onclick="updatePackageMethod({{ $product->id }})" type="button" value="Save" />
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Badge') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Allow Badge') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="allow_product_badge" id="allow_product_badge" value="free" <?php if($product->allow_badge){ echo "checked";} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Fore Color ( e.g #FFFFF)') }}
                        </label>
                        <input type="text"  value="{{$product->badge_forecolor}}" id="badge_forecolor" name="badge_forecolor" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Back Color ( e.g. #FFFFF)') }}
                        </label>
                        <input type="text"  value="{{$product->badge_backcolor}}"  id="badge_backcolor" name="badge_backcolor" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Title') }}
                        </label>
                        <input type="text" value="{{$product->badge_title}}" id="badge_title" name="badge_title" class="form-control">
                    </div>

                    <input class="btn btn-sm btn-primary m-3 float-right"
                    onclick="update_badge({{ $product->id }})" type="button" value="Save" />
            </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Allow Cacellation') }}</h5>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Status') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" id="cancellation" onchange="update_cancellation(this)"
                                    name="cancellation" value="{{ $product->id }}" <?php if ($product->cancellation) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>





            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Discount') }}</h5>
                </div>
                <div class="card-body">


                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Discount') }}
                        </label>
                        <input type="number" id="discount" name="discount" value="{{ $product->discount }}" min="0"
                            step="1" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Discount Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" name="discount_type"
                            data-selected="{{ $product->discount_type }}" id="discount_type">
                            <option value="">Choose Discount Type</option>
                            <option value="amount">{{ translate('Flat') }}</option>
                            <option value="percent">{{ translate('Percent') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right"
                            onclick="updateDiscount({{ $product->id }})" type="button" value="Save" />
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Estimate Shipping Time') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Shipping Days') }}
                        </label>
                        <div class="input-group">
                            <input type="number" class="form-control"
                                onchange="update_est_shipping_days({{ $product->id }})" id="est_shipping_days"
                                name="est_shipping_days" value="{{ $product->est_shipping_days }}" min="1" step="1"
                                placeholder="{{ translate('Shipping Days') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">{{ translate('Days') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Commision') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Commision') }}
                        </label>
                        <input type="number" id="commission" name="commission" value="{{ $product->commission }}" min="0" step="1"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Commision Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker"   name="commission_type"
                            data-selected="{{ $product->commission_type }}" id="commission_type">
                            <option value="">Choose Commission Type</option>
                            <option value="amount">{{ translate('Flat') }}</option>
                            <option value="percent">{{ translate('Percent') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right" onclick="updatecommission({{ $product->id }})"
                            type="button" value="Save" />
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('VAT & Tax')}}</h5>
                </div>
                <div class="card-body">


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" lang="en" min="0" value="{{$product->tax}}" step="0.01" placeholder="{{ translate('Tax') }}" id="tax" name="tax" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" id="tax_type" name="tax_type" data-selected="{{$product->tax_type}}">
                                <option value="amount">{{translate('Flat')}}</option>
                                <option value="percent">{{translate('Percent')}}</option>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-sm btn-primary m-3 float-right" onclick="updatetax({{ $product->id }})"
                    type="button" value="Save" />

                </div>
            </div>








    </div>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#bank_offers').on('change', function() {
                var offer_ids = $('#bank_offers').val();
                if (offer_ids.length > 0) {
                    $.post('{{ route('products.update_offers') }}', {
                        _token: '{{ csrf_token() }}',
                        offer_ids: offer_ids
                    }, function(data) {
                        $('#bank_offers_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                } else {
                    $('#bank_offers_table').html(null);
                }
            });
            $('#emi_offers').on('change', function() {
                var offer_ids = $('#emi_offers').val();
                if (offer_ids.length > 0) {
                    $.post('{{ route('products.update_offers') }}', {
                        _token: '{{ csrf_token() }}',
                        offer_ids: offer_ids
                    }, function(data) {
                        $('#emi_offers_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                } else {
                    $('#emi_offers_table').html(null);
                }
            });
            $('#company_offers').on('change', function() {
                var offer_ids = $('#company_offers').val();
                if (offer_ids.length > 0) {
                    $.post('{{ route('products.update_offers') }}', {
                        _token: '{{ csrf_token() }}',
                        offer_ids: offer_ids
                    }, function(data) {
                        $('#company_offers_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                } else {
                    $('#company_offers_table').html(null);
                }
            });
            $('#other_offers').on('change', function() {
                var offer_ids = $('#other_offers').val();
                if (offer_ids.length > 0) {
                    $.post('{{ route('products.update_offers') }}', {
                        _token: '{{ csrf_token() }}',
                        offer_ids: offer_ids
                    }, function(data) {
                        $('#other_offers_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                } else {
                    $('#other_offers_table').html(null);
                }
            });
        });



        function sort_brands(el) {
            $('#sort_brands').submit();
        }

        function update_cancellation(el) {
            if ($('#cancellation').prop('checked')) {
                var status = 1;
            } else {
                var status = 0;
            }

            $.post('{{ route('products.cancellation') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }



        function update_COD(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('products.cod') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_on_day_delivery(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('products.ondaydelivery') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_brand_approval(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('products.brandapproval') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_installation(id) {
            if ($('#installation').prop('checked')) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('products.updateinstallation') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status,
                description : $('#installation_description').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function update_RandR_policy(id) {

            $.post('{{ route('products.updaterandrpolicy') }}', {
                _token: '{{ csrf_token() }}',
                id: id,

                description : $('#randr_policy').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_additional_text(id) {

            $.post('{{ route('products.updateadditionaltext') }}', {
                _token: '{{ csrf_token() }}',
                id: id,

                description : $('#additional_text').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function updateDiscount(id) {
            $.post('{{ route('products.updatediscount') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                discount: $('#discount').val(),
                discount_type: $('#discount_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function updateoffers(id) {
            console.log($('#other_offers').val());
            $.post('{{ route('products.update_offers') }}', {
                _token: '{{ csrf_token() }}',
                other_offers: $('#other_offers').val()
            }, function(data) {

                $('#other_offers_table').html(data);
                AIZ.plugins.fooTable();
            });

            // if($('#other_offers').val()){
            //         $.post('{{ route('subsubcategories.update_offers') }}', {_token:'{{ csrf_token() }}', other_offers:$('#other_offers').val()}, function(data){
            //             $('#other_offers_table').html(data);
            //             AIZ.plugins.fooTable();
            //         });
            //     }
            //     else{
            //         console.log('else called.....');
            //         $('#other_offers_table').html(null);
            //     }

        }

        function updateTax(id) {
            $.post('{{ route('products.updatetax') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                tax: $('#tax').val(),
                tax_type: $('#tax_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function updatecommission(id) {
            $.post('{{ route('products.updatecommission') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                commission: $('#commission').val(),
                commission_type: $('#commission_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function updatetax(id) {
            $.post('{{ route('products.updatetax') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                tax: $('#tax').val(),
                tax_type: $('#tax_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function updateRandR(id) {

            if ($('#return_and_replacement').prop('checked')) {
                status = 1;
            } else {
                status = 0;
            }
            $.post('{{ route('products.updaterandr') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                return_and_replacement: status,
                return_and_replacement_type: $('#return_and_replacement_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function updatePackageMethod(id) {


            $.post('{{ route('products.updatePackageMethod') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                method: $('#package_method :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Package Method updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_badge(id) {

            if ($('#allow_product_badge').prop('checked')) {
                status = 1;
            } else {
                status = 0;
            }
            $.post('{{ route('products.updatebadge') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status,
                forecolor: $('#badge_forecolor').val(),
                backcolor: $('#badge_backcolor').val(),
                title: $('#badge_title').val(),
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


        function updateInstantRandR(id) {

            if ($('#instant_return_and_replacement').prop('checked')) {
                status = 1;
            } else {
                status = 0;
            }
            $.post('{{ route('products.instantupdaterandr') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                instant_return_and_replacement: status,
                instant_return_and_replacement_type: $('#instant_return_and_replacement_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_est_shipping_days(id) {
            $.post('{{ route('products.updateshippingdays') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                est_shipping_days: $('#est_shipping_days').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('SubSubategories updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
