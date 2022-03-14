@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Attribute Information')}}</h5>
</div>



<div class="row">

	<div class="offset-lg-2 col-md-6">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('update') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('delivery_boy_guide.update', $guide->id) }}" method="POST" enctype="multipart/form-data" >

					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Name')}}</label>
						<input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" value="{{$guide->name}}" required>
					</div>
                    <div class="form-group mb-3">
						<label for="name">{{translate('Description')}}</label>
						<textarea     id="description" name="description" class="form-control aiz-text-editor" >{{$guide->description}}</textarea>
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
