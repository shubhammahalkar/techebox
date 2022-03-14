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
                            value="{{ $brand->name }}" class="form-control" required disabled>

                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Bank Offers') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{ route('brands.submit_offers', $brand->id) }}" method="post">
                            @csrf
                            <div class="col-lg-10">
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 control-label"
                                        for="products">{{ translate('Select Offers') }}</label>
                                    <div class="col-sm-9">
                                        <select name="bank_offers[]" id="bank_offers" class="form-control aiz-selectpicker"
                                            multiple data-placeholder="{{ translate('Choose Products') }}"
                                            data-live-search="true" data-selected-text-format="count"
                                            data-selected="{{ $brand->bank_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 1)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="bank_offers_table">
                                            @if (json_decode($brand->bank_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($brand->bank_offers)]);
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
                    <form action="{{ route('brands.submit_offers', $brand->id) }}" method="post">
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
                                            data-selected="{{ $brand->emi_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 3)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="emi_offers_table">
                                            @if (json_decode($brand->emi_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($brand->emi_offers)]);
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
                    <form action="{{ route('brands.submit_offers', $brand->id) }}" method="post">
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
                                            data-selected="{{ $brand->company_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 2)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="company_offers_table">
                                            @if (json_decode($brand->company_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($brand->company_offers)]);
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
                    <form action="{{ route('brands.submit_offers', $brand->id) }}" method="post">
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
                                            data-selected="{{ $brand->other_offers }}">
                                            @foreach (\App\Models\Offer::where('type_id', 4)->orderBy('created_at', 'desc')->get()
        as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                        <div class=" " id="other_offers_table">
                                            @if (json_decode($brand->other_offers))
                                                @include('backend.product.subsubcategories.offer_table',['offer_ids' =>
                                                json_decode($brand->company_offers)]);
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
                        <h5 class="mb-0 h6">
                            {{ translate('Return & Replacement Policy') }}
                        </h5>
                    </div>

                    <div class="card-body">
                        <textarea class="aiz-text-editor" id="randr_policy" name="randr_policy">{{$brand->return_and_replacement_policy}}</textarea>
                        <input type="button" value="update" onclick="update_RandR_policy({{$brand->id}})" class="btn btn-primary float-right"/>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            {{ translate('Additional Text') }}
                        </h5>
                    </div>

                    <div class="card-body">
                        <textarea class="aiz-text-editor" id="additional_text" name="additional_text">{{$brand->additional_text}}</textarea>
                        <input type="button" value="update" onclick="update_additional_text({{$brand->id}})" class="btn btn-primary float-right"/>
                    </div>
                </div>








                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">{{ translate('Buying Guide') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.buying_guide', $brand->id) }}" method="post">
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
                                                data-selected="{{ $brand->buying_guide }}">
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
                                    <?php if($brand->return_and_replacement) { echo "checked";} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" id="return_and_replacement_type"
                            name="retun_and_replacement_type" data-selected="{{ $brand->return_and_replacement_type }}">
                            <option value="">Choose a Type</option>
                            <option value="replacement">{{ translate('Replacement') }}</option>
                            <option value="return">{{ translate('Return') }}</option>

                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right" onclick="updateRandR({{ $brand->id }})"
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
                                    name="instant_return_and_replacement" <?php if ($brand->instant_return_and_replacement) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" id="instant_return_and_replacement_type"
                            name="instant_return_and_replacement_type" data-selected="{{ $brand->instant_return_and_replacement_type }}">
                            <option value="">Choose a Type</option>

                            <option value="instant_return">{{ translate('Instant Return') }}</option>
                            <option value="instant_replacement">{{ translate('Instant Replacement') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right"
                            onclick="updateInstantRandR({{ $brand->id }})" type="button" value="Save" />
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
                                    value="{{ $brand->id }}" <?php if ($brand->cash_on_delivery) {echo 'checked';} ?>>
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
                                    value="{{ $brand->id }}" <?php if ($brand->brand_approval) {echo 'checked';} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>







            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Category Badge') }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-6 col-from-label">{{ translate('Allow Badge') }}</label>
                        <div class="col-md-6">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="allow_product_badge" id="allow_product_badge" value="free" <?php if($brand->allow_badge){ echo "checked";} ?>>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Fore Color ( e.g #FFFFF)') }}
                        </label>
                        <input type="text"  value="{{$brand->badge_forecolor}}" id="badge_forecolor" name="badge_forecolor" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Back Color ( e.g. #FFFFF)') }}
                        </label>
                        <input type="text"  value="{{$brand->badge_backcolor}}"  id="badge_backcolor" name="badge_backcolor" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Title') }}
                        </label>
                        <input type="text" value="{{$brand->badge_title}}" id="badge_title" name="badge_title" class="form-control">
                    </div>

                    <input class="btn btn-sm btn-primary m-3 float-right"
                    onclick="update_badge({{ $brand->id }})" type="button" value="Save" />
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
                                    name="cancellation" value="{{ $brand->id }}" <?php if ($brand->cancellation) {echo 'checked';} ?>>
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
                        <input type="number" id="discount" name="discount" value="{{ $brand->discount }}" min="0"
                            step="1" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Discount Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker" name="discount_type"
                            data-selected="{{ $brand->discount_type }}" id="discount_type">
                            <option value="">Choose Discount Type</option>
                            <option value="amount">{{ translate('Flat') }}</option>
                            <option value="percent">{{ translate('Percent') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right"
                            onclick="updateDiscount({{ $brand->id }})" type="button" value="Save" />
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
                        <input type="number" id="commission" name="commission" value="{{ $brand->commission }}" min="0" step="1"
                            class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">
                            {{ translate('Commision Type') }}
                        </label>
                        <select class="form-control aiz-selectpicker"   name="commission_type"
                            data-selected="{{ $brand->commission_type }}" id="commission_type">
                            <option value="">Choose Commission Type</option>
                            <option value="amount">{{ translate('Flat') }}</option>
                            <option value="percent">{{ translate('Percent') }}</option>
                        </select>
                        <input class="btn btn-sm btn-primary m-3 float-right" onclick="updatecommission({{ $brand->id }})"
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
                            <input type="number" lang="en" min="0" value="{{$brand->tax}}" step="0.01" placeholder="{{ translate('Tax') }}" id="tax" name="tax" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control aiz-selectpicker" id="tax_type" name="tax_type" data-selected="{{$brand->tax_type}}">
                                <option value="amount">{{translate('Flat')}}</option>
                                <option value="percent">{{translate('Percent')}}</option>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-sm btn-primary m-3 float-right" onclick="updatetax({{ $brand->id }})"
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
                    $.post('{{ route('brands.update_offers') }}', {
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
                    $.post('{{ route('brands.update_offers') }}', {
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
                    $.post('{{ route('brands.update_offers') }}', {
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
                    $.post('{{ route('brands.update_offers') }}', {
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

            $.post('{{ route('brands.cancellation') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
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
            $.post('{{ route('brands.cod') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
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
            $.post('{{ route('brands.brandapproval') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }




        function update_RandR_policy(id) {

            $.post('{{ route('brands.updaterandrpolicy') }}', {
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

            $.post('{{ route('brands.updateadditionaltext') }}', {
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
            $.post('{{ route('brands.updatediscount') }}', {
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







        function updatecommission(id) {
            $.post('{{ route('brands.updatecommission') }}', {
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
            $.post('{{ route('brands.updatetax') }}', {
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
            $.post('{{ route('brands.updaterandr') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                return_and_replacement: status,
                return_and_replacement_type: $('#return_and_replacement_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
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
            $.post('{{ route('brands.updatebadge') }}', {
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
            $.post('{{ route('brands.instantupdaterandr') }}', {
                _token: '{{ csrf_token() }}',
                id: id,
                instant_return_and_replacement: status,
                instant_return_and_replacement_type: $('#instant_return_and_replacement_type :selected').val()
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }


    </script>
@endsection
