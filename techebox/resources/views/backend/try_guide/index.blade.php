 @extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('try_guide.create')}}" class="btn btn-rounded btn-info pull-right">{{__('Add New Try Guide')}}</a>
    </div>
</div>

<br>

<!-- Basic Data Tables -->
<!--===================================================-->
<div class="card">
    <div class="card-heading bord-btm clearfix pad-all h-100">
        <h3 class="card-title pull-left pad-no">{{__('Try Guides')}}</h3>
        <div class="pull-right clearfix">
            <form class="" id="sort_categories" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 200px;">
                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder=" Type name & Enter">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table table aiz-table mb-0 res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Category')}}</th>
                    <th>{{__('User Tags')}}</th>
                    <th width="10%">{{__('Options')}}</th>


                </tr>
            </thead>
            <tbody>
                @foreach($try_guide as $key => $guide)
                    <tr>
                        <td>{{ ($key+1)}}</td>
                        <td> {{$guide->title}}</td>
                        <td> {{$guide->name}}</td>

                            @php
                                $user_tags = DB::table('try_guide_tags')
                                ->join('user_tags','user_tags.id','=','try_guide_tags.user_tag_id')
                                ->where('try_guide_tags.title_id','=',$guide->title_id)
                                ->get();
                             @endphp
                                <td>
                                @foreach ($user_tags as $tag)
                                    <span class="inline">{{$tag->name}}</span>
                                @endforeach
                                </td>


                        {{-- <td><label class="switch">
                            <input onchange="update_featured(this)" value="{{ $guide->id }}" type="checkbox">
                            <span class="slider round"></span></label></td> --}}
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{route('try_guide.edit', encrypt($guide->id))}}">{{__('Edit')}}</a></li>

                                    <li><a onclick="confirm_modal('{{route('try_guide.destroy', $guide->id)}}');">{{__('Delete')}}</a></li>
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

@section('script')
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('zones.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Featured zone updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection
