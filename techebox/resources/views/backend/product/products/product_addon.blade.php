@if(count($product_ids) > 0)
<table class="table table-bordered aiz-table">
  <thead>
  	<tr>
  		<td width="50%">
          <span>{{translate('Product')}}</span>
  		</td>




  	</tr>
  </thead>
  <tbody>
      @foreach ($product_ids as $key => $id)
      	@php
      		$product = \App\Models\Product::findOrFail($id);
      	@endphp
          <tr>
            <td>
              <div class="from-group row">
                <div class="col-auto">
                  <img class="size-60px img-fit" src="{{ uploaded_asset($product->thumbnail_img)}}">
                </div>
                <div class="col">
                  <span>{{  $product->getTranslation('name')  }}</span>
                </div>
              </div>
            </td>



          </tr>
      @endforeach
  </tbody>
</table>
@endif
