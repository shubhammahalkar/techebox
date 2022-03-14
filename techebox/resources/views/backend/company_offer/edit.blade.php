@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Attribute Information')}}</h5>
</div>



<div class="row">

	<div class="offset-lg-2 col-md-6">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Add New offer') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('company_offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data" >

					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{ translate('Title')}}" value="{{$offer->title}}" id="name" name="title" class="form-control" required>
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('Terms and Conditions')}}</label>
						<input type="text" placeholder="{{ translate('Terms and Conditions')}}" value="{{$offer->t_and_c}}" id="name" name="t_and_c" class="form-control" required>
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
