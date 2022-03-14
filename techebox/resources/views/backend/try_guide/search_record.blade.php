
    <div class="panel-body">
        <table class="table table-striped res-table mar-no" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="20%">{{__('Name')}}</th>
                    @if($type == 'Seller')
                        <th>{{__('Seller Name')}}</th>
                    @endif
                    <th>{{__('Num of Sale')}}</th>
                    <th>{{__('Total Stock')}}</th>
                    <th>{{__('Base Price')}}</th>
                    <th>{{__('Todays Deal')}}</th>
                    <th>{{__('Rating')}}</th>
                    <th>{{__('Published')}}</th>
                    <th>{{__('Featured')}}</th>
                    <th>{{__('Search Priority')}}</th>
                    <th>{{__('Options')}}</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($products as $key => $product)
                    <tr id="{{ $product->id }}"  >
                        <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                        <td>
                            <a href="{{ route('product', $product->slug) }}" target="_blank" class="media-block">
                                <div class="media-left">
                                    <img loading="lazy"  class="img-md" src="{{ asset($product->thumbnail_img)}}" alt="Image">
                                </div>
                                <div class="media-body">{{ __($product->name) }}</div>
                            </a>
                        </td>
                        @if($type == 'Seller')
                            <td>{{ $product->user->name }}</td>
                        @endif
                        <td>{{ $product->num_of_sale }} {{__('times')}}</td>
                        <td>
                            @php
                                $qty = 0;
                                if($product->variant_product){
                                    foreach ($product->stocks as $key => $stock) {
                                        $qty += $stock->qty;
                                    }
                                }
                                else{
                                    $qty = $product->current_stock;
                                }
                                echo $qty;
                            @endphp
                        </td>
                        <td>{{ number_format($product->unit_price,2) }}</td>
                        <td><label class="switch">
                                <input onchange="update_todays_deal(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->todays_deal == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td>{{ $product->rating }}</td>
                        <td><label class="switch">
                                <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td><label class="switch">
                                <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                <span class="slider round"></span></label></td>
                        <td><!-- <label class="switch">
                                <input onchange="update_search_priority(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->search_priority == 1) echo "checked";?> id="2">
                                <span class="slider round"></span></label> -->
                                 <input value="{{ $product->id }}" id="id" type="hidden" style="width: 50px;"> 
                                <input  value="{{ $product->search_priority }}" id="prority" type="text" style="width: 50px;" onkeyup="update_search_priority(this)">  
                                </td>
                        <td>
                            <div class="btn-group dropdown">
                                <button class="btn btn-primary dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                    {{__('Actions')}} <i class="dropdown-caret"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if ($type == 'Seller')
                                        <li><a href="{{route('products.seller.edit', encrypt($product->id))}}">{{__('Edit')}}</a></li>
                                    @else
                                        <li><a href="{{route('products.admin.edit', encrypt($product->id))}}">{{__('Edit')}}</a></li>
                                    @endif
                                    <li><a onclick="confirm_modal('{{route('products.destroy', $product->id)}}');">{{__('Delete')}}</a></li>
                                    <li><a href="{{route('products.duplicate', $product->id)}}">{{__('Duplicate')}}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
           
        </table>
        <div class="clearfix">
            <div class="pull-right">
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
    </div>