@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('service_centers.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Service Center')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{__('Service Centers')}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered demo-dt-basic" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Brand')}}</th>
                    <th>{{__('Email ID')}}</th>
                    <th>{{__('Contact No')}}</th>
                    <th width="10%">{{__('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($service_centers as $key => $service_center)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$service_center->name}}</td>
                        <td>{{$service_center->brand->name}}</td>
                        <td>{{$service_center->email_id}}</td>
                        <td>{{$service_center->contact_no}}</td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('service_centers.edit', encrypt($service_center->id))}}">{{__('Edit')}}</a></li>
                                    <li><a onclick="confirm_modal('{{route('service_centers.destroy', $service_center->id)}}');">{{__('Delete')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
