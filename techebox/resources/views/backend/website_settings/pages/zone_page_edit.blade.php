@extends('backend.layouts.app')
@section('content')

<div class="row">
	<div class="col-xl-10 mx-auto">
		<h6 class="fw-600">{{ translate('Home Page Settings') }}</h6>

		{{-- Home Slider --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Slider') }}</h6>
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

		{{-- Section2 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Site Features - Section2') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Features') }}</label>
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="home_features_images">
							<input type="hidden" name="types[]" value="home_features_links">
							<input type="hidden" name="types[]" value="home_features_titles">
							@if (get_setting('home_features_images') != null)
								@foreach (json_decode(get_setting('home_features_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="home_features_images">
					                                <input type="hidden" name="home_features_images[]" class="selected-files" value="{{ json_decode(get_setting('home_features_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_features_links">
												<input type="text" class="form-control" placeholder="http://" name="home_features_links[]" value="{{ json_decode(get_setting('home_features_links'), true)[$key] }}">
											</div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_features_titles">
												<input type="text" class="form-control" placeholder="http://" name="home_features_titles[]" value="{{ json_decode(get_setting('home_features_titles'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="home_features_images">
											<input type="hidden" name="home_features_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_features_links">
										<input type="text" class="form-control" placeholder="Link" name="home_features_links[]">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_features_titles">
										<input type="text" class="form-control" placeholder="Title" name="home_features_titles[]">
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

		{{-- Home Banner 2 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Banner 2 (Max 3)') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Banner & Links') }}</label>
						<div class="home-banner2-target">
							<input type="hidden" name="types[]" value="home_banner2_images">
							<input type="hidden" name="types[]" value="home_banner2_links">
							@if (get_setting('home_banner2_images') != null)
								@foreach (json_decode(get_setting('home_banner2_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="home_banner2_images">
					                                <input type="hidden" name="home_banner2_images[]" class="selected-files" value="{{ json_decode(get_setting('home_banner2_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_banner2_links">
												<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]" value="{{ json_decode(get_setting('home_banner2_links'), true)[$key] }}">
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
											<input type="hidden" name="types[]" value="home_banner2_images">
											<input type="hidden" name="home_banner2_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_banner2_links">
										<input type="text" class="form-control" placeholder="http://" name="home_banner2_links[]">
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
							data-target=".home-banner2-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

        {{-- section 6 --}}
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Color Banner - Section 6') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="color_banners_images">
							<input type="hidden" name="types[]" value="color_banners_links">

							@if (get_setting('color_banners_images') != null)
								@foreach (json_decode(get_setting('color_banners_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="color_banners_images">
					                                <input type="hidden" name="color_banners_images[]" class="selected-files" value="{{ json_decode(get_setting('color_banners_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="color_banners_links">
												<input type="text" class="form-control" placeholder="http://" name="color_banners_links[]" value="{{ json_decode(get_setting('color_banners_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('images') }}</div>
											<input type="hidden" name="types[]" value="color_banners_images">
											<input type="hidden" name="color_banners_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="color_banners_links">
										<input type="text" class="form-control" placeholder="Link" name="color_banners_links[]">
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


        {{-- Section7 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('4 meduim banners - Section7') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="medium_banner_4_images">
							<input type="hidden" name="types[]" value="medium_banner_4_links">

							@if (get_setting('medium_banner_4_images') != null)
								@foreach (json_decode(get_setting('medium_banner_4_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="medium_banner_4_images">
					                                <input type="hidden" name="medium_banner_4_images[]" class="selected-files" value="{{ json_decode(get_setting('medium_banner_4_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="medium_banner_4_links">
												<input type="text" class="form-control" placeholder="http://" name="medium_banner_4_links[]" value="{{ json_decode(get_setting('medium_banner_4_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="medium_banner_4_images">
											<input type="hidden" name="medium_banner_4_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="medium_banner_4_links">
										<input type="text" class="form-control" placeholder="Link" name="medium_banner_4_links[]">
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


        {{-- Section8 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Featured Categories - Section8') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="featured_categories_images">
							<input type="hidden" name="types[]" value="featured_categories_links">

							@if (get_setting('featured_categories_images') != null)
								@foreach (json_decode(get_setting('featured_categories_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="featured_categories_images">
					                                <input type="hidden" name="featured_categories_images[]" class="selected-files" value="{{ json_decode(get_setting('featured_categories_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="featured_categories_links">
												<input type="text" class="form-control" placeholder="http://" name="featured_categories_links[]" value="{{ json_decode(get_setting('featured_categories_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="featured_categories_images">
											<input type="hidden" name="featured_categories_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="featured_categories_links">
										<input type="text" class="form-control" placeholder="Link" name="featured_categories_links[]">
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

         {{-- Section11 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Laptops Accessories - Section11') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section11_products">


							@if (get_setting('section11_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section11_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section11_products">
                                                <input type="hidden" name="section11_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section11_products">
                                            <select class="form-control aiz-selectpicker" name="section11_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Category ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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


         {{-- Section 13 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('2 small banner - Section 13') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="small_banner_images">
							<input type="hidden" name="types[]" value="small_banner_links">

							@if (get_setting('small_banner_images') != null)
								@foreach (json_decode(get_setting('small_banner_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="small_banner_images">
					                                <input type="hidden" name="small_banner_images[]" class="selected-files" value="{{ json_decode(get_setting('small_banner_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="small_banner_links">
												<input type="text" class="form-control" placeholder="http://" name="small_banner_links[]" value="{{ json_decode(get_setting('small_banner_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="small_banner_images">
											<input type="hidden" name="small_banner_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="small_banner_links">
										<input type="text" class="form-control" placeholder="Link" name="small_banner_links[]">
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

        {{-- section 14 --}}
        <div class="card">
			<div class="card-header">

				<h6 class="mb-0">{{  __('4 products Carosual - Section 14') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section14_products">


							@if (get_setting('section14_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section14_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section14_products">
                                                <input type="hidden" name="section14_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section14_products">
                                            <select class="form-control aiz-selectpicker" name="section14_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

         {{-- Section 15--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('2 meduim banners - Section15') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="medium_banner_2_images">
							<input type="hidden" name="types[]" value="medium_banner_2_links">

							@if (get_setting('medium_banner_2_images') != null)
								@foreach (json_decode(get_setting('medium_banner_2_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="medium_banner_2_images">
					                                <input type="hidden" name="medium_banner_2_images[]" class="selected-files" value="{{ json_decode(get_setting('medium_banner_2_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="medium_banner_2_links">
												<input type="text" class="form-control" placeholder="http://" name="medium_banner_2_links[]" value="{{ json_decode(get_setting('medium_banner_2_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="medium_banner_2_images">
											<input type="hidden" name="medium_banner_2_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="medium_banner_2_links">
										<input type="text" class="form-control" placeholder="Link" name="medium_banner_2_links[]">
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



         {{-- Section 16--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('large size banners - Section16') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="large_size_banner_images">
							<input type="hidden" name="types[]" value="large_size_banner_links">

							@if (get_setting('large_size_banner_images') != null)
								@foreach (json_decode(get_setting('large_size_banner_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="large_size_banner_images">
					                                <input type="hidden" name="large_size_banner_images[]" class="selected-files" value="{{ json_decode(get_setting('large_size_banner_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="large_size_banner_links">
												<input type="text" class="form-control" placeholder="http://" name="large_size_banner_links[]" value="{{ json_decode(get_setting('large_size_banner_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="large_size_banner_images">
											<input type="hidden" name="large_size_banner_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="large_size_banner_links">
										<input type="text" class="form-control" placeholder="Link" name="large_size_banner_links[]">
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


        {{-- section 17 --}}
        <div class="card">
			<div class="card-header">

				<h6 class="mb-0">{{  __('Best SmartPhones 1 - Section 17') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section17_products">


							@if (get_setting('section17_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section17_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section17_products">
                                                <input type="hidden" name="section17_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section17_products">
                                            <select class="form-control aiz-selectpicker" name="section17_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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


        {{-- section 18 --}}
        <div class="card">
			<div class="card-header">

				<h6 class="mb-0">{{  __('Best SmartPhones 2 - Section 18') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section17_products">


							@if (get_setting('section18_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section18_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section18_products">
                                                <input type="hidden" name="section18_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section18_products">
                                            <select class="form-control aiz-selectpicker" name="section18_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
        {{-- section 19 --}}
        <div class="card">
			<div class="card-header">

				<h6 class="mb-0">{{  __('Best Samsung  - Section 19') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section19_products">


							@if (get_setting('section19_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section19_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section19_products">
                                                <input type="hidden" name="section19_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section18_products">
                                            <select class="form-control aiz-selectpicker" name="section19_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

        {{-- Section 20 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('wide banners - Section20') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="wide_banners_images">
							<input type="hidden" name="types[]" value="wide_banners_links">

							@if (get_setting('wide_banners_images') != null)
								@foreach (json_decode(get_setting('wide_banners_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="wide_banners_images">
					                                <input type="hidden" name="wide_banners_images[]" class="selected-files" value="{{ json_decode(get_setting('wide_banners_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="wide_banners_links">
												<input type="text" class="form-control" placeholder="http://" name="wide_banners_links[]" value="{{ json_decode(get_setting('wide_banners_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="wide_banners_images">
											<input type="hidden" name="wide_banners_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="wide_banners_links">
										<input type="text" class="form-control" placeholder="Link" name="wide_banners_links[]">
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


        {{-- section 21 --}}
        <div class="card">
			<div class="card-header">

				<h6 class="mb-0">{{  __('Best Deals 1  - Section 21') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="section21_products">


							@if (get_setting('section21_products') != null)
								@foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section21_products'), true))->get() as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
                                                <input type="hidden" name="types[]" value="section21_products">
                                                <input type="hidden" name="section21_products[]" value="{{$value->id}}">
												<input type="text" class="form-control"    value=" {{$value->name}}">

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
									<div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section21_products">
                                            <select class="form-control aiz-selectpicker" name="section21_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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



        {{-- section 22 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Best Deals 2  - Section 22') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section22_products">


                            @if (get_setting('section22_products') != null)
                                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section22_products'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section22_products">
                                                <input type="hidden" name="section22_products[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section22_products">
                                            <select class="form-control aiz-selectpicker" name="section22_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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


        {{-- section 23 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Brand Carosual - Section 23') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section23_brands">


                            @if (get_setting('section23_brands') != null)
                                @foreach (App\Models\Brand::whereIn('id',json_decode(get_setting('section23_brands'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section23_brands">
                                                <input type="hidden" name="section23_brands[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Brand')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section23_brands">
                                            <select class="form-control aiz-selectpicker" name="section23_brands[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Brand::where('published',1)->get() as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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


        {{-- section 24 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Best Selling - Section 24') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section24_products">


                            @if (get_setting('section24_products') != null)
                                @foreach (App\Models\Product::whereIn('id',json_decode(get_setting('section24_products'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section24_products">
                                                <input type="hidden" name="section24_products[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{translate('Select Products')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section24_products">
                                            <select class="form-control aiz-selectpicker" name="section24_products[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Product::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->getTranslation('name') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

        {{-- Section27 --}}
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __(' footer message- Section 27') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">

						<div class="home-banner1-target">

							<input type="hidden" name="types[]" value="footer_message">

							@if (get_setting('footer_message') != null)
								@foreach (json_decode(get_setting('footer_message'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">

										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="footer_message">
												<input type="text" class="form-control" placeholder="http://" name="footer_message[]" value="{{ json_decode(get_setting('footer_message'), true)[$key] }}">
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

								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="footer_message">
										<input type="text" class="form-control" placeholder="Link" name="footer_message[]">
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


        {{-- Section 28 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Main banners - Section28') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="main_banners_images">
							<input type="hidden" name="types[]" value="main_banners_links">

							@if (get_setting('main_banners_images') != null)
								@foreach (json_decode(get_setting('main_banners_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="main_banners_images">
					                                <input type="hidden" name="main_banners_images[]" class="selected-files" value="{{ json_decode(get_setting('main_banners_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="main_banners_links">
												<input type="text" class="form-control" placeholder="http://" name="main_banners_links[]" value="{{ json_decode(get_setting('main_banners_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="main_banners_images">
											<input type="hidden" name="main_banners_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="main_banners_links">
										<input type="text" class="form-control" placeholder="Link" name="main_banners_links[]">
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



        {{-- section 31 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Sub to Sub Category Carosual - Section 31') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section31_categories">


                            @if (get_setting('section31_categories') != null)
                                @foreach (App\Models\SubSubCategory::whereIn('id',json_decode(get_setting('section31_categories'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section31_categories">
                                                <input type="hidden" name="section31_categories[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{__('Select Categories')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section31_categories">
                                            <select class="form-control aiz-selectpicker" name="section31_categories[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\SubSubCategory::where('published',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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



        {{-- Section 32 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Custome Highlights - Section32') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="custome_highlights_images">
							<input type="hidden" name="types[]" value="custome_highlights_links">
							<input type="hidden" name="types[]" value="custome_highlights_heads">

							@if (get_setting('custome_highlights_images') != null)
								@foreach (json_decode(get_setting('custome_highlights_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="custome_highlights_images">
					                                <input type="hidden" name="custome_highlights_images[]" class="selected-files" value="{{ json_decode(get_setting('custome_highlights_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="custome_highlights_links">
												<input type="text" class="form-control" placeholder="http://" name="custome_highlights_links[]" value="{{ json_decode(get_setting('custome_highlights_links'), true)[$key] }}">
											</div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="custome_highlights_heads">
												<input type="text" class="form-control" placeholder="heads" name="custome_highlights_heads[]" value="{{ json_decode(get_setting('custome_highlights_heads'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="custome_highlights_images">
											<input type="hidden" name="custome_highlights_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="custome_highlights_links">
										<input type="text" class="form-control" placeholder="Link" name="custome_highlights_links[]">
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="custome_highlights_heads">
										<input type="text" class="form-control" placeholder="Heads" name="custome_highlights_heads[]">
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


        {{-- Section 35 --}}

        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __(' About Home - Section 35  ') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">

						<div class="home-banner1-target">

							<input type="hidden" name="types[]" value="about_home">

							@if (get_setting('about_home') != null)
								@foreach (json_decode(get_setting('about_home'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">

										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="about_home">

                                                <textarea
                                                    class="aiz-text-editor form-control"
                                                    placeholder=" "
                                                    data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                                                    data-min-height="300"
                                                    name="about_home[]"
                                                    value="{{ json_decode(get_setting('about_home'), true)[$key] }}"
                                                    required
                                                ></textarea>

												{{-- <input type="text" class="form-control" placeholder="http://" name="video_link[]" value="{{ json_decode(get_setting('video_link'), true)[$key] }}"> --}}
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

								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="about_home">

                                        <textarea
                                                    class="aiz-text-editor form-control"
                                                    placeholder="About Home"
                                                    data-buttons=[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]
                                                    data-min-height="300"
                                                    name="about_home[]"

                                                    required
                                                ></textarea>


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


        {{-- section 36 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Featured Category Product Carosual - Section 36') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section36_featured_categories">


                            @if (get_setting('section36_featured_categories') != null)
                                @foreach (App\Models\Category::whereIn('id',json_decode(get_setting('section36_featured_categories'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section36_featured_categories">
                                                <input type="hidden" name="section36_featured_categories[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{__('Select Categories')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section36_featured_categories">
                                            <select class="form-control aiz-selectpicker" name="section36_featured_categories[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\Category::where('published',1)->where('featured',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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


        {{-- Section 37 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('4 Banner Section - Section37') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="banner_4_section_images">
							<input type="hidden" name="types[]" value="banner_4_section_links">


							@if (get_setting('banner_4_section_images') != null)
								@foreach (json_decode(get_setting('banner_4_section_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="banner_4_section_images">
					                                <input type="hidden" name="banner_4_section_images[]" class="selected-files" value="{{ json_decode(get_setting('banner_4_section_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="banner_4_section_links">
												<input type="text" class="form-control" placeholder="http://" name="banner_4_section_links[]" value="{{ json_decode(get_setting('banner_4_section_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="banner_4_section_images">
											<input type="hidden" name="banner_4_section_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="banner_4_section_links">
										<input type="text" class="form-control" placeholder="Link" name="banner_4_section_links[]">
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


        {{-- section 38 --}}
        <div class="card">
            <div class="card-header">

                <h6 class="mb-0">{{  __('Featured Sub to Sub Category Product Carosual - Section 38') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label>{{ translate('Features') }}</label> --}}
                        <div class="home-banner1-target">
                            <input type="hidden" name="types[]" value="section38_featured_subsubcategories">


                            @if (get_setting('section38_featured_subsubcategories') != null)
                                @foreach (App\Models\SubSubCategory::whereIn('id',json_decode(get_setting('section38_featured_subsubcategories'), true))->get() as $key => $value)
                                    <div class="row gutters-5">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="hidden" name="types[]" value="section38_featured_subsubcategories">
                                                <input type="hidden" name="section38_featured_subsubcategories[]" value="{{$value->id}}">
                                                <input type="text" class="form-control"    value=" {{$value->name}}">

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
                                    <div class="form-group row" id="category">
                                        <label class="col-md-3 col-from-label">{{__('Select Categories')}} <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" name="types[]" value="section38_featured_subsubcategories">
                                            <select class="form-control aiz-selectpicker" name="section38_featured_subsubcategories[]" id="category_id" data-live-search="true" required multiple>
                                                <option value="0">---Select Products ---</option>
                                                @foreach (\App\Models\SubSubCategory::where('published',1)->where('featured',1)->get() as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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



        {{-- Section 39 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('50 % Banner Section - Section39') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="banner_50_section_images">
							<input type="hidden" name="types[]" value="banner_50_section_links">


							@if (get_setting('banner_50_section_images') != null)
								@foreach (json_decode(get_setting('banner_50_section_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="banner_50_section_images">
					                                <input type="hidden" name="banner_50_section_images[]" class="selected-files" value="{{ json_decode(get_setting('banner_50_section_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="banner_50_section_links">
												<input type="text" class="form-control" placeholder="http://" name="banner_50_section_links[]" value="{{ json_decode(get_setting('banner_4_section_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="banner_50_section_images">
											<input type="hidden" name="banner_50_section_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="banner_50_section_links">
										<input type="text" class="form-control" placeholder="Link" name="banner_50_section_links[]">
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
        {{-- Section 40 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Big Banner Section - Section40') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="big_banners_images">
							<input type="hidden" name="types[]" value="big_banners_links">


							@if (get_setting('big_banners_images') != null)
								@foreach (json_decode(get_setting('big_banners_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="big_banners_images">
					                                <input type="hidden" name="big_banners_images[]" class="selected-files" value="{{ json_decode(get_setting('big_banners_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="big_banners_links">
												<input type="text" class="form-control" placeholder="http://" name="big_banners_links[]" value="{{ json_decode(get_setting('big_banners_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('image') }}</div>
											<input type="hidden" name="types[]" value="big_banners_images">
											<input type="hidden" name="big_banners_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="big_banners_links">
										<input type="text" class="form-control" placeholder="Link" name="big_banners_links[]">
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

        {{-- Section41 --}}
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('Trending Search Tags - Section41') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">

						<div class="home-banner1-target">

							<input type="hidden" name="types[]" value="trending_search_tags">

							@if (get_setting('trending_search_tags') != null)
								@foreach (json_decode(get_setting('trending_search_tags'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">

										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="trending_search_tags">
												<input type="text" class="form-control" placeholder="http://" name="trending_search_tags[]" value="{{ json_decode(get_setting('trending_search_tags'), true)[$key] }}">
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

								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="trending_search_tags">
										<input type="text" class="form-control" placeholder="Link" name="trending_search_tags[]">
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



        {{-- Video link --}}
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __(' video link  ') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">

						<div class="home-banner1-target">

							<input type="hidden" name="types[]" value="video_link">

							@if (get_setting('video_link') != null)
								@foreach (json_decode(get_setting('video_link'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">

										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="video_link">
												<input type="text" class="form-control" placeholder="http://" name="video_link[]" value="{{ json_decode(get_setting('video_link'), true)[$key] }}">
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

								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="video_link">
										<input type="text" class="form-control" placeholder="Link" name="video_link[]">
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


        {{-- video Related Links --}}
        <div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ __('video Related Links -  ') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						{{-- <label>{{ translate('Features') }}</label> --}}
						<div class="home-banner1-target">
							<input type="hidden" name="types[]" value="video_related_images">
							<input type="hidden" name="types[]" value="video_related_links">


							@if (get_setting('video_related_images') != null)
								@foreach (json_decode(get_setting('video_related_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="video_related_images">
					                                <input type="hidden" name="video_related_images[]" class="selected-files" value="{{ json_decode(get_setting('video_related_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="video_related_links">
												<input type="text" class="form-control" placeholder="http://" name="video_related_links[]" value="{{ json_decode(get_setting('video_related_links'), true)[$key] }}">
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
											<div class="form-control file-amount">{{ translate('Feature') }}</div>
											<input type="hidden" name="types[]" value="video_related_images">
											<input type="hidden" name="video_related_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="video_related_links">
										<input type="text" class="form-control" placeholder="Link" name="video_related_links[]">
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



		{{-- Home categories--}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Categories') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Categories') }}</label>
						<div class="home-categories-target">
							<input type="hidden" name="types[]" value="home_categories">
							@if (get_setting('home_categories') != null)
								@foreach (json_decode(get_setting('home_categories'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col">
											<div class="form-group">
												<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" data-selected={{ $value }} required>
													@foreach (\App\Models\Category::where('parent_id', 0)->with('childrenCategories')->get() as $category)
														<option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
														@foreach ($category->childrenCategories as $childCategory)
															@include('categories.child_category', ['child_category' => $childCategory])
														@endforeach
													@endforeach
					                            </select>
											</div>
										</div>
										<div class="col-auto">
											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
												<i class="las la-times"></i>
											</button>
										</div>
									</div>
								@endforeach
							@endif
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col">
									<div class="form-group">
										<select class="form-control aiz-selectpicker" name="home_categories[]" data-live-search="true" required>
											@foreach (\App\Models\Category::all() as $key => $category)
												<option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-categories-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>


		{{-- Home Banner 3 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Home Banner 3 (Max 3)') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Banner & Links') }}</label>
						<div class="home-banner3-target">
							<input type="hidden" name="types[]" value="home_banner3_images">
							<input type="hidden" name="types[]" value="home_banner3_links">
							@if (get_setting('home_banner3_images') != null)
								@foreach (json_decode(get_setting('home_banner3_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-md-5">
											<div class="form-group">
												<div class="input-group" data-toggle="aizuploader" data-type="image">
					                                <div class="input-group-prepend">
					                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
					                                </div>
					                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
													<input type="hidden" name="types[]" value="home_banner3_images">
					                                <input type="hidden" name="home_banner3_images[]" class="selected-files" value="{{ json_decode(get_setting('home_banner3_images'), true)[$key] }}">
					                            </div>
					                            <div class="file-preview box sm">
					                            </div>
				                            </div>
										</div>
										<div class="col-md">
											<div class="form-group">
												<input type="hidden" name="types[]" value="home_banner3_links">
												<input type="text" class="form-control" placeholder="http://" name="home_banner3_links[]" value="{{ json_decode(get_setting('home_banner3_links'), true)[$key] }}">
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
											<input type="hidden" name="types[]" value="home_banner3_images">
											<input type="hidden" name="home_banner3_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="hidden" name="types[]" value="home_banner3_links">
										<input type="text" class="form-control" placeholder="http://" name="home_banner3_links[]">
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
							data-target=".home-banner3-target">
							{{ translate('Add New') }}
						</button>
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
					</div>
				</form>
			</div>
		</div>

		{{-- Top 10 --}}
		<div class="card">
			<div class="card-header">
				<h6 class="mb-0">{{ translate('Top 10') }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Top Categories (Max 10)')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="top10_categories">
							<select name="top10_categories[]" class="form-control aiz-selectpicker" multiple data-max-options="10" data-live-search="true" data-selected="{{ get_setting('top10_categories') }}">
								@foreach (\App\Models\Category::where('published', 0)->get() as $category)
									<option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>

								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-from-label">{{translate('Top Brands (Max 10)')}}</label>
						<div class="col-md-10">
							<input type="hidden" name="types[]" value="top10_brands">
							<select name="top10_brands[]" class="form-control aiz-selectpicker" multiple data-max-options="10" data-live-search="true" data-selected="{{ get_setting('top10_brands') }}">
								@foreach (\App\Models\Brand::all() as $key => $brand)
									<option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
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
</div>

@endsection

@section('script')
    <script type="text/javascript">
		$(document).ready(function(){
		    AIZ.plugins.bootstrapSelect('refresh');
		});
    </script>
@endsection
