@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Factor Information')}}</h5>
</div>



<div class="row">

	<div class="offset-lg-2 col-md-6">
		<div class="card">
			<div class="card-header">

			</div>
			<div class="card-body">
				<form action="{{ route('review_factors.update', $factor->id) }}" method="POST" enctype="multipart/form-data" >

					@csrf
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">{{translate('Category')}} <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
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
                            <select name="subcategory_id" id="sub_category_id"   class="form-control demo-select2-placeholder" required>
                              <option>-- select sub category ---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label " for="name">{{__('SubSubcategory')}}</label>
                        <div class=" col-md-8">
                            <select   id="sub_sub_category_id" name="subsubcategory_id" class="form-control demo-select2-placeholder" required>
                              <option>-- select sub sub category ---</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required>
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
<script>

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


    function get_subsubcategories_by_subcategory(){
        var category_id = $('#sub_category_id').val();
        $.post('{{ route('subsubcategories.get_subcategories_by_subcategory') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
            console.log(data);
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

    $('#sub_category_id').on('change', function() {
            get_subsubcategories_by_subcategory();


        });
      $(document).ready(function(){


        $('#category_id').on('change', function() {
        get_subcategories_by_category();
        get_subsubcategories_by_subcategory();

        });


        // $(document).on('change','#sub_category_id', function() {
        //     console.log("function triggered")
        //     get_subsubcategories_by_subcategory();
        // });
    });
</script>
@endsection
