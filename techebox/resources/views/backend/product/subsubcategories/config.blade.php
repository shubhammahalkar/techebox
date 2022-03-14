@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">{{translate('All Category')}}</h1>
	</div>
</div>

<div class="row">



        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Category Slider') }}</h6>
			</div>
			<div class="card-body">
				<div class="alert alert-info">
					{{ translate('We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.') }}
				</div>
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Photos & Links') }}</label>
						<div class="home-slider-target">
							<input type="hidden" name="types[]" value="home_slider_images">
							<input type="hidden" name="types[]" value="home_slider_links">
							@if (get_setting('home_slider_images') != null)
								@foreach (json_decode(get_setting('home_slider_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="home_slider_images">
					                                <input type="hidden" name="home_slider_images[]" class="selected-files" value="{{ json_decode(get_setting('home_slider_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_slider_links">
												<input type="text" class="form-control" placeholder="http://" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
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
								<div class="col-md-5">
									<div class="form-group">
										<div class="input-group" data-toggle="aizuploader" data-type="image">
											<div class="input-group-prepend">
												<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
											</div>
											<div class="form-control file-amount">{{ translate('Choose File') }}</div>
											<input type="hidden" name="types[]" value="home_slider_images">
											<input type="hidden" name="home_slider_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_slider_links">
										<input type="text" class="form-control" placeholder="http://" name="home_slider_links[]">
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
							data-target=".home-slider-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>


        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Custom Product Carousel -1') }}</h6>
			</div>
			<div class="card-body ">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Sub Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Sub Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Select Products :')}}</label>
                        <div class="col-sm-9">
                            <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                    <option value="{{$product->id}}">{{ $product->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Custom Product Carousel -2') }}</h6>
			</div>
			<div class="card-body ">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Sub Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Sub Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Select Products :')}}</label>
                        <div class="col-sm-9">
                            <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                    <option value="{{$product->id}}">{{ $product->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Custom Product Carousel -3') }}</h6>
			</div>
			<div class="card-body ">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Sub Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Sub Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Select Products :')}}</label>
                        <div class="col-sm-9">
                            <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                    <option value="{{$product->id}}">{{ $product->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Custom Product Carousel -4') }}</h6>
			</div>
			<div class="card-body ">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="products">{{translate('Sub Title :')}}</label>
                        <div class="col-sm-9">
                        <input type="hidden" name="types[]" value="home_slider_links">
                        <input type="text" class="form-control" placeholder="Sub Title" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Select Products :')}}</label>
                        <div class="col-sm-9">
                            <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                    <option value="{{$product->id}}">{{ $product->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>


        <div class="card col-md-11 m-4">
            <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Shop by price') }}</h6>
                <div class="form-group">
                    <input type="hidden" name="types" value="max_price">
                    <input type="text" class="form-control" placeholder="title" name="title" value="{{'title'}}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="types" value="tag_line">
                    <input type="text" class="form-control" placeholder="tag_line" name="tag_line" value="{{'tag_line'}}">
                </div>
			</div>
			<div class="card-body">


					<div class="form-group">
						<label>{{ translate('Min price & Max price') }}</label>
						<div class="home-slider-target1">
							<input type="hidden" name="types[]" value="min_price">
							<input type="hidden" name="types[]" value="max_price">
							<input type="hidden" name="types[]" value="color">
							@if (get_setting('min_price ') != null)
								@foreach (json_decode(get_setting('min_price'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="col-md">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="min_price">
                                                        <input type="text" class="form-control" placeholder="min_price" name="min_price" value="{{ json_decode(get_setting('min_price'), true)[$key] }}">
                                                    </div>
                                                </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="max_price">
												<input type="text" class="form-control" placeholder="max_price" name="max_price[]" value="{{ json_decode(get_setting('max_price'), true)[$key] }}">
											</div>
										</div>
                                        <div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="color">
												<input type="color" class="form-control" placeholder="color" name="color[]" value="{{ json_decode(get_setting('color'), true)[$key] }}">
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
								<div class="col-md-5">
									<div class="form-group">
                                        <div class="form-group">
                                            <input type="hidden" name="types[]" value="min_price">
                                            <input type="text" class="form-control" placeholder="min_price" name="min_price" >
                                        </div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
                                        <input type="hidden" name="types[]" value="max_price">
                                        <input type="text" class="form-control" placeholder="max_price" name="max_price[]" >
                                    </div>
								</div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <input type="hidden" name="types[]" value="color">
                                        <input type="color" class="form-control" placeholder="color" name="color[]" >
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
							data-target=".home-slider-target1">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

         {{-- custom Highlights --}}

        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Custom Highlights') }}</h6>
			</div>
			<div class="card-body">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Photos & Links') }}</label>
						<div class="home-slider-targets">
							<input type="hidden" name="types[]" value="highlight_images">
							<input type="hidden" name="types[]" value="highlight_title">
							<input type="hidden" name="types[]" value="highlight_links">
							@if (get_setting('highlight_images') != null)
								@foreach (json_decode(get_setting('highlight_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="highlight_images">
					                                <input type="hidden" name="highlight_images[]" class="selected-files" value="{{ json_decode(get_setting('highlight_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="highlight_title">
												<input type="text" class="form-control" placeholder="Title" name="highlight_title[]" value="{{ json_decode(get_setting('highlight_title'), true)[$key] }}">
											</div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_slider_links">
												<input type="text" class="form-control" placeholder="http://" name="home_slider_links[]" value="{{ json_decode(get_setting('home_slider_links'), true)[$key] }}">
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
								<div class="col-md-5">
									<div class="form-group">
										<div class="input-group" data-toggle="aizuploader" data-type="image">
											<div class="input-group-prepend">
												<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
											</div>
											<div class="form-control file-amount">{{ translate('Choose File') }}</div>
											<input type="hidden" name="types[]" value="highlight_images">
											<input type="hidden" name="highlight_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="highlight_title">
										<input type="text" class="form-control" placeholder="Title" name="highlight_title[]">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="highlight_links">
										<input type="text" class="form-control" placeholder="http://" name="highlight_links[]">
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
							data-target=".home-slider-targets">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

        <div class="card col-md-11 m-4">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('sub-sub Category carosual') }}</h6>
			</div>
			<div class="card-body ">

				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf


                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label" for="products">{{translate('Select Brands :')}}</label>
                        <div class="col-sm-9">
                            <select name="product_addon[]" id="product_addon" class="form-control aiz-selectpicker" multiple data-placeholder="{{ translate('Choose Products') }}" data-live-search="true" data-selected-text-format="count">
                                @foreach(\App\Models\Subsubcategory:: all() as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>









</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }

    $('#section1').on('change', function(){
                var product_ids = $('#section1').val();
                if(product_ids.length > 0){
                    $.post('{{ route('categories.add_products') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#product_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                }
                else{
                    $('#product_table').html(null);
                }
            });
</script>
@endsection
