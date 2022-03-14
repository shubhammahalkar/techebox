@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{translate('Add New Vendor Cancellation Reason')}}</h1>
	</div>

</div>

<div class="row">

	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Add New Reason') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('vendor_cancellation.store') }}" method="POST">
					@csrf
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

@section('modal')
    @include('modals.delete_modal')
@endsection
