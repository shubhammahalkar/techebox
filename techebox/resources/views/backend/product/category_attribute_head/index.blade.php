@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">{{translate('All Attributes')}}</h1>
	</div>
    <div class="form-group mb-3 text-right">
        <a type="submit" href="{{route('category_attribute_heads.create')}}" class="btn btn-primary">{{translate('Add New Head')}}</a>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Attributes')}}</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ translate('Name')}}</th>
							{{-- <th>{{ translate('Values')}}</th> --}}
							<th class="text-right">{{ translate('Options')}}</th>
						</tr>
					</thead>
					<tbody>

						@foreach($attributes as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->name}}</td>

								<td class="text-right">
									{{-- <a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('attributes.show', $attribute->id)}}" title="{{ translate('Attribute values') }}">
										<i class="las la-cog"></i>
									</a> --}}
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('category_attribute_heads.edit', $attribute->id)}}" title="{{ translate('Edit') }}">
										<i class="las la-edit"></i>
									</a>
									<a  class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" href="{{route('category_attribute_heads.destroy', $attribute->id)}}" title="{{ translate('Delete') }}">
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
	{{-- <div class="col-md-5">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Add New Attribute') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('attributes.store') }}" method="POST">
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
	</div> --}}
</div>


@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
