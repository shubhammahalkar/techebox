@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Category Information')}}</h5>
</div>

<div class="row">

	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add New Sub Sub Category') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('subsubcategories.update',$category->id) }}" method="POST">
					@csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                            <label for="name">{{translate('Name')}}</label>
                            <input type="text" placeholder="{{translate('Name')}}" value="{{$category->name}}" name="name" class="form-control" required>

                        </div>

                        <div class="form-group mb-3 ">
                            <label for="name">{{translate('Type')}}</label>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox"   value="{{ $category->id }}" <?php if($category->digital == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </div>
                        <div class="form-group  mb-3" id="category">
                            <label class="">{{translate('Category')}} <span class="text-danger">*</span></label>
                            <div class=" ">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" data-selected="{{ $category->category_id }}" required>
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
                        <div class="form-group">
                            <label class=" " for="name">{{__('Subcategory')}}</label>
                            <div class=" ">
                                <select name="subcategory_id" id="sub_category_id" class="form-control demo-select2-placeholder" data-selected="{{ $category->subcategory_id }}" required>
                                  <option>-- select sub category ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Logo')}} <small>({{ translate('120x80') }})</small></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="logo" class="selected-files" value="{{ $category->logo }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">{{translate('Description')}}</label>
                            <textarea name="description" rows="5" class="form-control" value="{{ $category->description }}"></textarea>
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
                                    <input type="hidden" name="main_banner" class="selected-files" value="{{ $category->main_banner }}" >
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
                                    <input type="hidden" name="section_1_banner_1" class="selected-files" value="{{ $category->section_1_banner_1 }}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_3_url" class="form-control" required>
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
                                    <input type="hidden" name="section_1_banner_2" class="selected-files" value="{{$category->section_1_banner_2}}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_3_url" class="form-control" required>
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
                                    <input type="hidden" name="section_1_banner_3" class="selected-files" value="{{$category->section_1_banner_3}}">
                                </div>
                                <input type="text" placeholder="{{translate('URL')}}" name="section_1_banner_3_url" class="form-control" required>
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
                                    <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title" placeholder="{{ translate('Meta Title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label">{{translate('Description')}}</label>
                                <div class="col-md-8">
                                    <textarea  name="meta_description" rows="8" class="form-control"></textarea>
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
                                        <input type="hidden" value="{{ $category->meta_img }}" name="meta_img" class="selected-files">
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

@section('script')
<script type="text/javascript">


    function get_subcategories_by_category(){
        var category_id = $('#category_id').val();
        $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            console.log(data);
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

    $(document).ready(function(){

        get_subcategories_by_category();
        $('#category_id').on('change', function() {
        get_subcategories_by_category();
    });
    });
</script>
@endsection
