@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Add New Product')}}</h5>
</div>
<div class="">
    <form class="form form-horizontal mar-top" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Information')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Product Name')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="{{ translate('Product Name') }}" onchange="update_sku()" required>
                            </div>
                        </div>

                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">{{translate('Category')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" data-selected="{{$product->category_id}}" required>
                                    <option value="0">---Select Category ---</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                    {{-- @foreach ($category->childrenCategories as $childCategory)
                                    @include('categories.child_category', ['child_category' => $childCategory])
                                    @endforeach --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class=" col-md-3 col-from-label" for="name">{{__('Subcategory')}}</label>
                            <div class="col-md-8 ">
                                <select name="subcategory_id" id="sub_category_id"   class="form-control demo-select2-placeholder" data-selected="{{$product->subcategory_id}}" required>
                                  <option>-- select sub category ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label " for="name">{{__('SubSubcategory')}}</label>
                            <div class=" col-md-8">
                                <select   id="sub_sub_category_id" name="subsubcategory_id" class="form-control demo-select2-placeholder" data-selected="{{$product->subsubcategory_id}}" required>
                                  <option>-- select sub sub category ---</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">{{translate('Brand')}}</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id" data-live-search="true" data-selected="{{$product->brand_id}}" required>
                                    <option value="">{{ translate('Select Brand') }}</option>
                                    @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Unit')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="unit" value={{$product->unit}} placeholder="{{ translate('Unit (e.g. KG, Pc etc)') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Unit Price')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="unit_price" value="{{$product->unit_price}}" placeholder="{{ translate('Unit Price') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Minimum Purchase Qty')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="number" lang="en" class="form-control" name="min_qty" value="{{$product->min_qty}}" min="1" required>
                            </div>
                        </div>


                        {{-- @if (addon_is_activated('pos_system'))
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Barcode')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="barcode" placeholder="{{ translate('Barcode') }}">
                            </div>
                        </div>
                        @endif --}}

                        @if (addon_is_activated('refund_request'))
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Refundable')}}</label>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="refundable" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Details')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Barcode')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control " value="{{$product->barcode}}" name="barcode" placeholder="{{ translate('Barcode') }}" >

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Product Model/Number')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{$product->product_model_name_number}}" name="product_model_name_number" placeholder="{{ translate('Model Number/Name') }}" >

                            </div>
                        </div>
                        <div class="form-group row"  >
                            <label class="col-md-3 col-from-label">{{translate('EAN / UPC Code')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control " value="{{$product->ean_upc_code}}" name="ean_upc_code" placeholder="{{ translate('EAN/UPC Code') }}">

                            </div>
                        </div>
                        <div class="form-group row"  >
                            <label class="col-md-3 col-from-label">{{translate('HSN Code')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control " value="{{$product->hsn_code}}" name="hsn_code" placeholder="{{ translate('HSN Code') }}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Search Params')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Search Tags')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control aiz-tag-input" data-selected="{{$product->tags}}" name="search_tags[]" placeholder="{{ translate('Type and hit enter to add a tag') }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Zones')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" data-selected="{{$product->zones}}" name="zones[]" id="zones" data-live-search="true" multiple  >
                                    <option value="0">---Select Zones ---</option>
                                    @foreach (App\Models\Zone::all() as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"  >
                            <label class="col-md-3 col-from-label">{{translate('User Tags')}}</label>
                            <div class="col-md-8">
                                <div class="col-md-8">
                                    <select   id="user_tags" data-selected="{{$product->user_tags}}" name="user_tags[]" class="form-control demo-select2-placeholder" multiple>
                                        <option>-- User Tags ---</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Specifications')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">

                            <div class="choice_category_attributes_options" id="choice_category_attributes_options"></div>
                        </div>


                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Key Features')}}</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-light w-100 mb-2" data-toggle="collapse" href="#key_feature_div_1" role="button" aria-expanded="false" aria-controls="collapseExample">
                           Key Feature 1
                          </a>




                        <div class="collapse p-4" id="key_feature_div_1">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Label')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_labels[]" value="{{json_decode($product->key_feature_labels)[0]}}" placeholder="{{ translate('Label') }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Value')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_values[]" value="{{json_decode($product->key_feature_values)[0]}}" placeholder="{{ translate('Value') }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="key_feature_img[]" class="selected-files" value={{json_decode($product->key_feature_img)[0]}}>
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                                </div>
                            </div>
                            <div class="form-group row" id="brand">
                                <label class="col-md-3 col-from-label">{{translate('Fa Fa Icon')}}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_fa_fa_icons[]" value="{{json_decode($product->key_feature_fa_fa_icons)[0]}}" placeholder="{{ translate('Fa Fa Icon') }}">
                                </div>
                                <div class="col-md-2"> <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="fa_fa_icon_enabled[]" value="0" checked>
                                    <span></span>
                                </label></div>
                            </div>
                        </div>
                        <a class="btn btn-light w-100 mb-2" data-toggle="collapse" href="#key_feature_div_2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Key Feature 2
                           </a>
                        <div class="collapse p-4" id="key_feature_div_2">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Label')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_labels[]" value="{{json_decode($product->key_feature_labels)[1]}}" placeholder="{{ translate('Label') }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Value')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_values[]" value="{{json_decode($product->key_feature_values)[1]}}" placeholder="{{ translate('Value') }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="key_feature_img[]" class="selected-files" value="{{json_decode($product->key_feature_img)[1]}}">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                                </div>
                            </div>
                            <div class="form-group row" id="brand">
                                <label class="col-md-3 col-from-label">{{translate('Fa Fa Icon')}}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_fa_fa_icons[]" value="{{json_decode($product->key_feature_fa_fa_icons)[1]}}"  placeholder="{{ translate('Fa Fa Icon') }}">
                                </div>
                                <div class="col-md-2"> <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="fa_fa_icon_enabled" value="0" checked>
                                    <span></span>
                                </label></div>
                            </div>
                        </div>
                        <a class="btn btn-light w-100 mb-2" data-toggle="collapse" href="#key_feature_div_3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Key Feature 3
                           </a>
                        <div class="collapse p-4" id="key_feature_div_3">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Label')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_labels[]" value="{{json_decode($product->key_feature_labels)[2]}}"  placeholder="{{ translate('Label') }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Value')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_values[]" value="{{json_decode($product->key_feature_values)[2]}}"   placeholder="{{ translate('Value') }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="key_feature_img[]" class="selected-files" value="{{json_decode($product->key_feature_img)[2]}}" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                                </div>
                            </div>
                            <div class="form-group row" id="brand">
                                <label class="col-md-3 col-from-label">{{translate('Fa Fa Icon')}}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_fa_fa_icons[]" value="{{json_decode($product->key_feature_fa_fa_icons)[2]}}"  placeholder="{{ translate('Fa Fa Icon') }}">
                                </div>
                                <div class="col-md-2"> <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="fa_fa_icon_enabled[]" value="0" checked>
                                    <span></span>
                                </label></div>
                            </div>
                        </div>
                        <a class="btn btn-light w-100 mb-2" data-toggle="collapse" href="#key_feature_div_4" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Key Feature 4
                           </a>
                        <div class="collapse p-4" id="key_feature_div_4">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Label')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_labels[]" value="{{json_decode($product->key_feature_labels)[3]}}" placeholder="{{ translate('Label') }}">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Value')}} <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_values[]" value="{{json_decode($product->key_feature_values)[3]}}" placeholder="{{ translate('Value') }}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="key_feature_img[]" class="selected-files" value="{{json_decode($product->key_feature_img)[3]}}">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                    <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                                </div>
                            </div>
                            <div class="form-group row" id="brand">
                                <label class="col-md-3 col-from-label">{{translate('Fa Fa Icon')}}</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control aiz-tag-input" name="key_feature_fa_fa_icons[]" value="{{json_decode($product->key_feature_fa_fa_icons)[3]}}" placeholder="{{ translate('Fa Fa Icon') }}">
                                </div>
                                <div class="col-md-2"> <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="fa_fa_icon_enabled[]" value="0" checked>
                                    <span></span>
                                </label></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Images')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Gallery Images')}} <small>(600x600)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="photos" class="selected-files" value="{{$product->photos}}" >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">{{translate('These images are visible in product details page gallery. Use 600x600 sizes images.')}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Thumbnail Image')}} <small>(300x300)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="thumbnail_img" class="selected-files" value="{{json_decode($product->thumbnail_img)}}"  >
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Videos')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Video Provider')}}</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider" data-selected="{{$product->video_provider}}">
                                    <option value="youtube">{{translate('Youtube')}}</option>
                                    <option value="dailymotion">{{translate('Dailymotion')}}</option>
                                    <option value="vimeo">{{translate('Vimeo')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Video Link')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="video_link" placeholder="{{ translate('Video Link') }}" value="{{$product->video_provider}}">
                                <small class="text-muted">{{translate("Use proper link without extra parameter. Don't use short share link/embeded iframe code.")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Variation')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row gutters-5">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="{{translate('Colors')}}" disabled>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple disabled>
                                    @foreach (\App\Models\Color::orderBy('name', 'asc')->get() as $key => $color)
                                    <option  value="{{ $color->code }}" data-content="<span><span class='size-15px d-inline-block mr-2 rounded border' style='background:{{ $color->code }}'></span><span>{{ $color->name }}</span></span>"></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" type="checkbox" name="colors_active">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row gutters-5">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="{{translate('Attributes')}}" disabled>
                            </div>
                            <div class="col-md-8">
                                <select name="choice_attributes[]" id="choice_attributes" class="form-control aiz-selectpicker" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="{{ translate('Choose Attributes') }}">
                                    @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <p>{{ translate('Choose the attributes of this product and then input values of each attribute') }}</p>
                            <br>
                        </div>

                        <div class="customer_choice_options" id="customer_choice_options">

                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Addons')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">

                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label" for="products">{{translate('Products')}}</label>
                                    <div class="col-sm-9">
                                        <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count" data-selected="{{$product->product_addons}}">
                                            @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                                <option value="{{$product->id}}">{{ $product->getTranslation('name') }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group" id="product_table">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product price + stock')}}</h5>
                    </div>
                    <div class="card-body">
                        {{-- <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Unit price')}} <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Unit price') }}" name="unit_price" class="form-control" required>
                            </div>
                        </div> --}}

                        <div class="form-group row">
	                        <label class="col-sm-3 control-label" for="start_date">{{translate('Discount Date Range')}}</label>
	                        <div class="col-sm-9">
	                          <input type="text" class="form-control aiz-date-range" name="discount_date_range" placeholder="{{translate('Select Date')}}" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
	                        </div>
	                    </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Discount')}} <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Discount') }}" name="discount" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control aiz-selectpicker" name="discount_type">
                                    <option value="amount">{{translate('Flat')}}</option>
                                    <option value="percent">{{translate('Percent')}}</option>
                                </select>
                            </div>
                        </div>

                        @if(addon_is_activated('club_point'))
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{translate('Set Point')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="1" placeholder="{{ translate('1') }}" name="earn_point" class="form-control">
                                </div>
                            </div>
                        @endif

                        <div id="show-hide-div">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Quantity')}} <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="1" placeholder="{{ translate('Quantity') }}" name="current_stock" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">
                                    {{translate('SKU')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="{{ translate('SKU') }}" name="sku" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{translate('External link')}}
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('External link') }}" name="external_link" class="form-control">
                                <small class="text-muted">{{translate('Leave it blank if you do not use external site link')}}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{translate('External link button text')}}
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('External link button text') }}" name="external_link_btn" class="form-control">
                                <small class="text-muted">{{translate('Leave it blank if you do not use external site link')}}</small>
                            </div>
                        </div>
                        <br>
                        <div class="sku_combination" id="sku_combination">

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Short Description')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Product Short Description')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" name="short_description">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Description')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Description')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" name="description">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Additional Features')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Additional Features')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" name="additional_features">{{$product->additional_features}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Company Features')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Company Features')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" name="company_features">{{$product->company_features}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Support')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Product Support')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" name="product_support">{{$product->product_support}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Warranty Details')}}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Warranty Type')}}
                            </label>
                            <input type="text" name="warranty_type" value="{{$product->warranty_type}}" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Warranty Detail,Covered in warranty,Not Covered in warranty')}}</label>
                            <div class="col-md-8">
                                <textarea class="aiz-text-editor" value="{{$product->warranty_details}}" name="warranty_details"></textarea>
                            </div>
                        </div>



                    </div>
                </div>

<!--                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Shipping Cost')}}</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>-->

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('PDF Specification')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('PDF Specification')}}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="document">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="pdf" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('SEO Meta Tags')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Meta Title')}}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="meta_title" placeholder="{{ translate('Meta Title') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Description')}}</label>
                            <div class="col-md-8">
                                <textarea name="meta_description" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{ translate('Meta Image') }}</label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="meta_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Dimensions')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Width')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control  " name="width" placeholder="{{ translate('Width') }}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">{{translate('Height')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control  " name="height" placeholder="{{ translate('Height') }}">

                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">{{translate('depth')}}</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control  " name="depth" placeholder="{{ translate('depth') }}">

                            </div>
                        </div>
                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">{{translate('Weight')}}</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control  " name="weight" placeholder="{{ translate('Weight') }}">

                            </div>
                        </div>
                    </div>
                </div>

               <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{translate('Product Quantity Mulitiply')}}
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Is Product Quantity Mulitiply')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="is_quantity_multiplied" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                       {{--   @if (get_setting('shipping_type') == 'product_wise_shipping')
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Free Shipping')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="shipping_type" value="free" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Flat Rate')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="shipping_type" value="flat_rate">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="flat_rate_shipping_div" style="display: none">
                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{translate('Shipping cost')}}</label>
                                <div class="col-md-6">
                                    <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Shipping cost') }}" name="flat_shipping_cost" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        @else
                        <p>
                            {{ translate('Product wise shipping cost is disable. Shipping cost is configured from here') }}
                            <a href="{{route('shipping_configuration.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                <span class="aiz-side-nav-text">{{translate('Shipping Configuration')}}</span>
                            </a>
                        </p>
                        @endif--}}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Low Stock Quantity Warning')}}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Quantity')}}
                            </label>
                            <input type="number" name="low_stock_quantity" value="1" min="0" step="1" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Max Order Quantity')}}</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Max Order Quantity')}}
                            </label>
                            <input type="number" name="max_order_qty" value="1" min="0" step="1" class="form-control">
                        </div>
                    </div>
                </div>



                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Product Badge')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Allow Badge')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="allow_product_badge" value="free" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Fore Color ( e.g #FFFFF)')}}
                            </label>
                            <input type="text" name="badge_forecolor"     class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Back Color ( e.g. #FFFFF)')}}
                            </label>
                            <input type="text" name="badge_backcolor"     class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Title')}}
                            </label>
                            <input type="text" name="badge_title"  class="form-control">
                        </div>
                    </div>
                </div> --}}

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{translate('Stock Visibility State')}}
                        </h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Show Stock Quantity')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="quantity" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Show Stock With Text Only')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="text">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Hide Stock')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="radio" name="stock_visibility_state" value="hide">
                                    <span></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Cash On Delivery')}}</h5>
                    </div>
                    <div class="card-body">
                        @if (get_setting('cash_payment') == '1')
                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" name="cash_on_delivery" value="1" checked="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        @else
                            <p>
                                {{ translate('Cash On Delivery option is disabled. Activate this feature from here') }}
                                <a href="{{route('activation.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                    <span class="aiz-side-nav-text">{{translate('Cash Payment Activation')}}</span>
                                </a>
                            </p>
                        @endif
                    </div>
                </div> --}}

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Pre Order')}}</h5>
                    </div>
                    <div class="card-body">

                            <div class="form-group row">
                                <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                                <div class="col-md-6">
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input type="checkbox" name="preorder_enabled" value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="start_date">{{translate('Date')}}</label>
                                <div class="col-sm-9">
                                  <input type="datetime-local" class="form-control date-picker" name="preorder_date" placeholder="Select Date" data-time-picker="true" data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                                </div>
                            </div>


                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Featured')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="featured" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Todays Deal')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-6 col-from-label">{{translate('Status')}}</label>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="checkbox" name="todays_deal" value="1">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Flash Deal')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Add To Flash')}}
                            </label>
                            <select class="form-control aiz-selectpicker" name="flash_deal_id" id="flash_deal">
                                <option value="">Choose Flash Title</option>
                                @foreach(\App\Models\FlashDeal::where("status", 1)->get() as $flash_deal)
                                    <option value="{{ $flash_deal->id}}">
                                        {{ $flash_deal->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Discount')}}
                            </label>
                            <input type="number" name="flash_discount" value="0" min="0" step="1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Discount Type')}}
                            </label>
                            <select class="form-control aiz-selectpicker" name="flash_discount_type" id="flash_discount_type">
                                <option value="">Choose Discount Type</option>
                                <option value="amount">{{translate('Flat')}}</option>
                                <option value="percent">{{translate('Percent')}}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('Estimate Shipping Time')}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">
                                {{translate('Shipping Days')}}
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="est_shipping_days" min="1" step="1" placeholder="{{translate('Shipping Days')}}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">{{translate('Days')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{translate('VAT & Tax')}}</h5>
                    </div>
                    <div class="card-body">
                        @foreach(\App\Models\Tax::where('tax_status', 1)->get() as $tax)
                        <label for="name">
                            {{$tax->name}}
                            <input type="hidden" value="{{$tax->id}}" name="tax_id[]">
                        </label>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="{{ translate('Tax') }}" name="tax[]" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control aiz-selectpicker" name="tax_type[]">
                                    <option value="amount">{{translate('Flat')}}</option>
                                    <option value="percent">{{translate('Percent')}}</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">

                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Update Product') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $('form').bind('submit', function (e) {
        // Disable the submit button while evaluating if the form should be submitted
        $("button[type='submit']").prop('disabled', true);

        var valid = true;

        if (!valid) {
            e.preventDefault();

            // Reactivate the button if the form was not submitted
            $("button[type='submit']").button.prop('disabled', false);
        }
    });

    $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });

    function add_more_customer_choice_option(i, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:'{{ route('products.add-more-choice-option') }}',
            data:{
               attribute_id: i
            },
            success: function(data) {
                var obj = JSON.parse(data);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                            '+obj+'\
                        </select>\
                    </div>\
                </div>');
                AIZ.plugins.bootstrapSelect('refresh');
           }
       });


    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'{{ route('products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data) {
                $('#sku_combination').html(data);
                AIZ.uploader.previewGenerate();
                AIZ.plugins.fooTable();
                if (data.length > 1) {
                   $('#show-hide-div').hide();
                }
                else {
                    $('#show-hide-div').show();
                }
           }
       });
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });

        update_sku();
    });

    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){

            $('#sub_category_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#sub_category_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                // $('.demo-select2').select2();
            }
        });
    }

    function get_subsubcategories_by_subcategory(){
        var category_id = $('#sub_category_id').val();
        $.post('{{ route('subsubcategories.get_subcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){

            $('#sub_sub_category_id').html(null);
            for (var i = 0; i < data.length; i++) {
                $('#sub_sub_category_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                // $('.demo-select2').select2();
            }
        });
    }


    function add_more_category_attribute_choice_option(i, name) {
            $('#choice_category_attributes_options').append('<div class="form-group"><div class="col-lg-2"><input type="hidden" name="attribute_choice_no[]" value="' + i + '"><input type="text" class="form-control" name="attribute_choice[]" value="' + name + '" placeholder="Specification Title" readonly></div><div class="col-lg-7"><input type="text" class="form-control" name="attribute_choice_options_' + i + '[]" placeholder="Enter Specification values" data-role="tagsinput" ></div></div>');

            $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        }


    function get_category_attributes_by_category() {

            var category_id = $('#sub_category_id').val();
            $.post('{{ route('category_attributes.get_category_attributes_by_category') }}', {
                    _token: '{{ csrf_token() }}',
                    category_id: category_id
                },
                function (data) {
                    $('#choice_category_attributes_options').html(null);
                    // $('#choice_category_attributes_options').append('<input type="text" name="head_count" value="'+Object.keys(data).length+'"/>')
                    Object.keys(data).forEach((head,index) => {
                        $('#choice_category_attributes_options').append('<div class="form-group row"> <input class="" type="hidden" name="category_attribute_heads[]" value="'+JSON.parse(head).id+'"> <input type="text" class="form-control" name=" " value="'+JSON.parse(head).name+'" disabled>    </div>');

                        for (var i = 0; i < data[head].length; i++) {
                            console.log(data[head][i].name)
                        $('#choice_category_attributes_options').append('<div class="form-group row"><div class="col-md-3 "><input class="" type="hidden" name="category_attribute_label_'+i+'[]" value="'+data[head][i].id+'"><input type="text" class="border-0"   value="' + data[head][i].name + '" placeholder="Specification Title" readonly></div><div class="col-md-8"><input type="text" class="form-control" name="category_attribute_values_' + i + '[]" placeholder="Enter Specification values" data-role="tagsinput" ></div></div>');
                    }
                    });

                });
        }


    function get_user_tags_by_category() {

            var category_id = $('#sub_sub_category_id').val();
            $.post('{{ route('user_tags.get_user_tags_by_category') }}', {
                    _token: '{{ csrf_token() }}',
                    category_id: category_id
                },
                function (data) {


                     for(var i=0; i<data.length; i++)
                     {
                        // console.log(data);
                        $('#user_tags').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                            }));
                        // $('#user_tags').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');

                     }


                });
        }





        $(document).ready(function(){

           $('#product_addon').on('change', function(){
                var product_ids = $('#product_addon').val();
                if(product_ids.length > 0){
                    $.post('{{ route('products.product_addon') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#product_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                }
                else{
                    $('#product_table').html(null);
                }
            });
        });

    $(document).ready(function(){
        get_subcategories_by_category();
        get_subsubcategories_by_subcategory();
        get_category_attributes_by_category();

$('#category_id').on('change', function() {
get_subcategories_by_category();
});
$('#sub_sub_category_id').on('change', function() {
    get_user_tags_by_category();
});
$('#sub_category_id').on('change', function() {
    get_subsubcategories_by_subcategory();
    get_category_attributes_by_category();
});
});

</script>

@endsection
