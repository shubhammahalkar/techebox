@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Brand Information')}}</h5>
</div>

<div class="row">

	<div class="col-md-12">
		<div class="card">

			<div class="card-body">
				<form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                            <label for="name">{{translate('Name')}}</label>
                            <input type="text" placeholder="{{translate('Name')}}" value="{{$brand->name}}" name="name" class="form-control" required>

                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Digital :')}}</label>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_featured(this)" value="0"  >
                                <span></span>
                            </label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Logo')}} <small>({{ translate('120x80') }})</small></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="logo" class="selected-files" value="{{$brand->logo}}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Description')}}</label>
                            <textarea name="description" rows="5" class="form-control" >{{$brand->description}}</textarea>
                        </div>
                         </div>
                        <div class="col">

                            <div class="form-group mb-3">
                                <label for="name">{{translate('Main Banner')}} <small>({{ translate('1200x800') }})</small></label>
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="main_banner" class="selected-files" value="{{$brand->main_banner}}">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{translate('Section 1 Settings')}}  </label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{translate('Banner 1')}} <small>({{ translate('410x220') }})</small></label>
                                <div class="input-group mb-2" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="section_1_banner_1" class="selected-files" value="{{$brand->section_1_banner_1}}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_1_url" value="{{$brand->section_1_banner_3_url}}"  class="form-control" required>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{translate('Banner 2')}} <small>({{ translate('410x220') }})</small></label>
                                <div class="input-group mb-2" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="section_1_banner_2" class="selected-files" value="{{$brand->section_1_banner_2}}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_2_url" value="{{$brand->section_1_banner_3_url}}" class="form-control" required>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">{{translate('Banner 3')}} <small>({{ translate('410x220') }})</small></label>
                                <div class="input-group mb-2" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="section_1_banner_3" class="selected-files" value="{{$brand->section_1_banner_3}}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_3_url" value="{{$brand->section_1_banner_3_url}}" class="form-control" required>
                                <div class="file-preview box sm">
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
                                    <input type="text" class="form-control"value="{{$brand->meta_title}}" name="meta_title" placeholder="{{ translate('Meta Title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Description')}}</label>
                                <div class="col-md-8">
                                    <textarea name="meta_description" {{$brand->meta_description}}  rows="8" class="form-control"></textarea>
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
                                        <input type="hidden" {{$brand->meta_img}} name="meta_img" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection
