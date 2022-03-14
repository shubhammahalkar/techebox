@extends('frontend.layouts.app')

@section('content')

    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-3 d-none d-lg-block">

                   
                </div>

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        {{__('Sugestion Criteria')}}
                                    </h2>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                                            <li><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                            <li class="active"><a href="{{ route('profile') }}">{{__('Manage Profile')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($customer as $cust)

                        <form class="form form-horizontal mar-top" action="{{ route('customer.tag.update',$cust->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    {{__('Basic info')}}
                                </div>

                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label >{{__('User Tags')}}  </label>
                                        </div>

                                            <div class="col-md-10">
                                                <select name="user_tags[]" id="user_tags" class="form-control demo-select2" multiple data-placeholder="Choose User Tags">
                                                    @foreach (\App\UserTag::all() as $key => $tag)
                                                        <option value="{{ $tag->id }}"  @if($cust->user_tags != null && in_array($tag->id, json_decode($cust->user_tags, true))) selected @endif>{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1">{{__('Update Profile')}}</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }
</script>
@endsection
