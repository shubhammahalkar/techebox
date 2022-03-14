@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{translate('All Reasons')}}</h1>
	</div>
    <div class="col text-right">
        <a href="{{ route('vendor_cancellation.create') }}" class="btn btn-circle btn-primary">
            <span>{{translate('Add New Reason')}}</span>
        </a>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Reasons')}}</h5>
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
						@foreach($reasons as $key => $reason)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$reason->title}}</td>

								<td class="text-right">
									<a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('vendor_cancellation.show', $reason->id)}}" title="{{ translate('Attribute values') }}">
										<i class="las la-cog"></i>
									</a>
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('vendor_cancellation.edit', $reason->id )}}" title="{{ translate('Edit') }}">
										<i class="las la-edit"></i>
									</a>
									<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('vendor_cancellation.destroy', $reason->id)}}" title="{{ translate('Delete') }}">
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
