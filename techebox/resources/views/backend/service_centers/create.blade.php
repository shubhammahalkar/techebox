@extends('backend.layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{__('Service Center Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('service_centers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="brand_id">{{__('Brand')}}</label>
                    <div class="col-sm-10">
                        <select name="brand_id" id="brand_id" required class="form-control demo-select2-placeholder">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{__($brand->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Name')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Name')}}" id="name" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-from-label">{{translate('Pincode')}} <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control aiz-tag-input" name="pincode[]" placeholder=" ">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">{{__('Contact No')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Contact No')}}" id="contact_no" name="contact_no" class="form-control" required >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email_id">{{__('Email Id')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Email Id')}}" id="email_id" name="email_id" class="form-control" required >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="map_link">{{__('Map Link')}}</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{__('Map Link')}}" id="map_link" name="map_link" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email_id">{{__('Address')}}</label>
                    <div class="col-sm-10">
                        <textarea name="address" rows="4" class="form-control" required></textarea>

                    </div>
                </div>

            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">

        function get_subcategories_by_category(){
            var category_id = $('#category_id').val();
            $.post('{{ route('subcategories.get_subcategories_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#sub_category_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#sub_category_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    $('.demo-select2').select2();
                }
            });
        }

        $(document).ready(function(){
            get_subcategories_by_category();
        });

        $('#category_id').on('change', function() {
            get_subcategories_by_category();
        });

    </script>

@endsection
