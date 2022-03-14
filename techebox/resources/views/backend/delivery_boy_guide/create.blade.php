@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{translate('All Attributes')}}</h1>
	</div>

</div>

<div class="row">

	<div class="offset-lg-2 col-md-6">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate(' New Delivery Boy Guide') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('delivery_boy_guide.store') }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control">
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Description')}}</label>
						<textarea     id="description" name="description" class="form-control aiz-text-editor" ></textarea>
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
