@extends('backend.layouts.app')

@section('content')
    <div>
        <h2 class="page-header text-overflow">Add New TryGuide</h2>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form class="form form-horizontal mar-top" action="{{route('try_guide.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <div class="card">
                    <div class="card-heading bord-btm">
                        <h4 class="card-title">{{__('TryGuide Information')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">{{__('Title')}}</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="title" placeholder="{{__('TryGuide Title')}}" id='title' required>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 h6">{{translate('Short Description')}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">{{translate('Short Description')}}</label>
                                        <div class="col-md-8">
                                            <textarea class="aiz-text-editor" name="short_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">{{translate('Category')}} <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
                                    <option value="0">---Select Category ---</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row" id="UserTag">
                            <label class="col-md-3 col-from-label">Select UserTag <span class="text-danger">*</span></label>
                            <div class="col-md-8">

                                <select class="form-control aiz-selectpicker" name="user_tags[]" id="user_tags" data-live-search="true" required multiple>
                                    <option value="0">---Select Products ---</option>
                                    @foreach (\App\Models\UserTag::all() as $key => $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="mar-all text-right">
                    <button type="submit" name="button" class="btn btn-info">{{ __('Add New TryGuide') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

