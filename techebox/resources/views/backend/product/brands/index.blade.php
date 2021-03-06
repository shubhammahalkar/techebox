@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('All Brand')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('brands.create') }}" class="btn btn-primary">
                <span>{{translate('Add New Brand')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ translate('Brand') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{translate('Banner')}}</th>
                    <th data-breakpoints="lg">{{translate('Icon')}}</th>

                    <th  >{{translate('Published')}}</th>

                    <th width="15%" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $key => $brand)
                    <tr>
                        <td>{{ ($key+1) + ($brands->currentPage() - 1)*$brands->perPage() }}</td>
                        <td>{{ $brand->getTranslation('name') }}</td>



                        <td>
                            @if($brand->logo != null)
                                <img src="{{ uploaded_asset($brand->logo) }}" alt="{{translate('Banner')}}" class="h-50px">
                            @else
                                ???
                            @endif
                        </td>
                        <td>
                            @if($brand->logo != null)
                                <span class="avatar avatar-square avatar-xs">
                                    <img src="{{ uploaded_asset($brand->logo) }}" alt="{{translate('icon')}}">
                                </span>
                            @else
                                ???
                            @endif
                        </td>

                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_published(this)" value="{{ $brand->id }}" <?php if($brand->published == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>

                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('brands.edit', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('brands.destroy', $brand->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('brands.config', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-cog"></i>
                            </a>
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('brands.setting', ['id'=>$brand->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-desktop"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $brands->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('brands.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Brands updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
