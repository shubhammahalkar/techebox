@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{translate('All Delivery Boy Guides')}}</h1>
	</div>
    <div class="form-group mb-3 text-right">
        <a type="submit" href="{{route('delivery_boy_guide.create')}}" class="btn btn-primary">{{translate('Add New Delivery Boy Guide')}}</a>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Guides')}}</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ translate('Name')}}</th>

							<th class="text-right">{{ translate('Options')}}</th>
						</tr>
					</thead>
					<tbody>

						@foreach($delivery_boy_guides as $key => $guide)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$guide->name}}</td>


								<td class="text-right">
									{{-- <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('attributes.show', $attribute->id)}}" title="{{ translate('Attribute values') }}">
										<i class="las la-cog"></i>
									</a> --}}
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('delivery_boy_guide.edit', $guide->id)}}" title="{{ translate('Edit') }}">
										<i class="las la-edit"></i>
									</a>
									<a  class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" href="{{route('delivery_boy_guide.destroy', $guide->id)}}" title="{{ translate('Delete') }}">
										<i class="las la-trash"></i>
									</a>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>


@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
