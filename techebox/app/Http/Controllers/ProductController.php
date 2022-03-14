<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\ProductStock;
use App\Models\Category;
use App\Models\FlashDealProduct;
use App\Models\ProductTax;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Offer;
use App\Models\ProductSpecification;
use App\Models\User;
use App\Models\UserTag;
use Auth;
use Carbon\Carbon;
use Combinations;
use CoreComponentRepository;
use Artisan;
use Cache;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_products(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $type = 'In House';
        $col_name = null;
        $query = null;
        $sort_search = null;

        $products = Product::where('added_by', 'admin')->where('wholesale_product',0);

        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }
        if ($request->search != null){
            $products = $products
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        if($request->category_id != null)
        {
            $product = $products->where('category_id', $request->category_id);
        }
        if($request->brand_id != null)
        {
            $product = $products->where('brand_id', $request->brand_id);
        }

        if($request->todays_deal_list != null)
        {
            if($request->todays_deal_list == "YES")
            $product = $products->where('todays_deal', 1);
            if($request->todays_deal_list == "NO")
            $product = $products->where('todays_deal', 0);
        }
        if($request->todays_deal_list != null)
        {
            if($request->todays_deal_list == "YES")
            $product = $products->where('todays_deal', 1);
            if($request->todays_deal_list == "NO")
            $product = $products->where('todays_deal', 0);
        }
        if($request->published != null)
        {
            if($request->published == "YES")
            $product = $products->where('published', 1);
            if($request->published == "NO")
            $product = $products->where('published', 0);
        }


        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);

        return view('backend.product.products.index', compact('products','type', 'col_name', 'query', 'sort_search'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $products = Product::where('added_by', 'seller')->where('wholesale_product',0);
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null){
            $products = $products
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->where('digital', 0)->orderBy('created_at', 'desc')->paginate(15);
        $type = 'Seller';

        return view('backend.product.products.index', compact('products','type', 'col_name', 'query', 'seller_id', 'sort_search'));
    }

    public function all_products(Request $request)
    {
        $col_name = null;
        $query = null;
        $seller_id = null;
        $sort_search = null;
        $products = Product::orderBy('created_at', 'desc')->where('wholesale_product',0);
        if ($request->has('user_id') && $request->user_id != null) {
            $products = $products->where('user_id', $request->user_id);
            $seller_id = $request->user_id;
        }
        if ($request->search != null){
            $products = $products
                        ->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        if ($request->type != null){
            $var = explode(",", $request->type);
            $col_name = $var[0];
            $query = $var[1];
            $products = $products->orderBy($col_name, $query);
            $sort_type = $request->type;
        }

        $products = $products->paginate(15);
        $type = 'All';

        return view('backend.product.products.index', compact('products','type', 'col_name', 'query', 'seller_id', 'sort_search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        CoreComponentRepository::initializeCache();

        $categories = Category::
            where('digital', 0)
            // ->with('childrenCategories')
            ->get();
        $user_tags = UserTag::all();

        return view('backend.product.products.create', compact('categories','user_tags'));
    }

    public function add_more_choice_option(Request $request) {
        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();

        $html = '';

        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }

        echo json_encode($html);
    }


    public function config($id)
    {
        $product = Product::findOrFail($id);
        $offer = new Offer();
        $bank_offers = $offer->bank_offers();
        $company_offers = $offer->company_offers();
        return view('backend.product.products.config',compact('product','bank_offers','company_offers') );
    }








    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;
        $product->name = $request->name;
        $product->added_by = $request->added_by;
        if(Auth::user()->user_type == 'seller'){
            $product->user_id = Auth::user()->id;
            if(get_setting('product_approve_by_admin') == 1) {
                $product->approved = 0;
            }
        }
        else{
            $product->user_id = User::where('user_type', 'admin')->first()->id;
        }
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->barcode = $request->barcode;
        $product->digital =  0;

        if (addon_is_activated('refund_request')) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            }
            else {
                $product->refundable = 0;
            }
        }
         $product->photos =  json_encode(explode(",",$request->photos));
         $product->thumbnail_img = $request->thumbnail_img;
        $product->unit = $request->unit;
        $product->min_qty = $request->min_qty;
        $product->max_order_qty = $request->max_order_qty;
        $product->low_stock_quantity = $request->low_stock_quantity;
        $product->current_stock = $request->current_stock;
        $product->stock_visibility_state = $request->stock_visibility_state;


        $tags = array();
        if($request->search_tags[0] != null){
            foreach (json_decode($request->search_tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags = implode(',', $tags);


        if(!empty($request->zones) ){
            $product->zones =  json_encode($request->zones);
        }

        if(!empty($request->product_addon) ){
            $product->product_addon =  json_encode($request->product_addon);
        }
        if(!empty($request->user_tags) ){
            $product->user_tags =  json_encode($request->user_tags);
        }

        if(!empty($request->key_feature_labels) ){
            $product->key_feature_labels =  $request->key_feature_labels;
            $product->key_feature_values =  $request->key_feature_values;
            $product->key_feature_img =  $request->key_feature_img;
            $product->key_feature_fa_fa_icons =  $request->key_feature_fa_fa_icons;
            $product->fa_fa_icon_enabled =  $request->fa_fa_icon_enabled;
        }

        // $product->category_attribute_heads = json_encode($request->category_attribute_heads);
        $product->category_attribute_heads = json_encode(Array($request->category_attribute_heads[0]=>json_encode($request->category_attribute_labels_0)));
            //  foreach($request->category_attribute_heads as$key=> $head)
            //  {
            //         Array($head=>json_encode($request->category_attribute_labels_0));
            //  }




        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->product_support = $request->product_support;
        $product->product_model_name_number = $request->product_model_name_number;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->unit_price = $request->unit_price;
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->depth = $request->depth;
        $product->weight = $request->weight;
        $product->ean_upc_code = $request->ean_upc_code;
        $product->hsn_code = $request->hsn_code;

        // $product->product_addon = $request->product_addon;
        // $product->key_features = $request->key_features;
        $product->additional_features = $request->additional_features;
        $product->company_features = $request->company_features;
        $product->warranty_type = $request->warranty_type;
        $product->warranty_details = $request->warranty_details;
        // $product->allow_product_badge = $request->allow_product_badge;
        $product->badge_forecolor = $request->badge_forecolor;
        $product->badge_backcolor = $request->badge_backcolor;
        $product->badge_title = $request->badge_title;

        // $product->preorder_date = $request->preorder_date;
        // $product->product_available_date = $request->product_available_date;



        // if ($request->date_range != null) {
        //     $date_var               = explode(" to ", $request->date_range);
        //     $product->discount_start_date = strtotime($date_var[0]);
        //     $product->discount_end_date   = strtotime( $date_var[1]);
        // }


        $product->est_shipping_days  = $request->est_shipping_days;

        // if (addon_is_activated('club_point')) {
        //     if($request->earn_point) {
        //         $product->earn_point = $request->earn_point;
        //     }
        // }

        // if ($request->has('shipping_type')) {
        //     if($request->shipping_type == 'free'){
        //         $product->shipping_cost = 0;
        //     }
        //     elseif ($request->shipping_type == 'flat_rate') {
        //         $product->shipping_cost = $request->flat_shipping_cost;
        //     }
        //     elseif ($request->shipping_type == 'product_wise') {
        //         $product->shipping_cost = json_encode($request->shipping_cost);
        //     }
        // }
        if ($request->has('is_quantity_multiplied')) {
            $product->is_quantity_multiplied = 1;
        }

        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        if($request->has('meta_img')){
            $product->meta_img = $request->meta_img;
        } else {
            $product->meta_img = $product->thumbnail_img;
        }

        if($product->meta_title == null) {
            $product->meta_title = $product->name;
        }

        if($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description);
        }

        if($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img;
        }

        if($request->hasFile('pdf')){
            $product->pdf = $request->pdf;
        }

        $slug = $request->slug? Str::slug($request->slug, '-') : Str::slug($request->name, '-');
        $same_slug_count = Product::where('slug','LIKE',$slug.'%')->count();
        $slug_suffix = $same_slug_count ? '-'.$same_slug_count+1 : '';
        $slug .= $slug_suffix;

        $product->slug = $slug;

        // if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
        //     $product->colors = json_encode($request->colors);
        // }
        // else {
        //     $colors = array();
        //     $product->colors = json_encode($colors);
        // }

        // $choice_options = array();



        // if (!empty($request->choice_no)) {
        //     $product->attributes = json_encode($request->choice_no);
        // }
        // else {
        //     $product->attributes = json_encode(array());
        // }

        // $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        // $product->published = 1;

        if($request->button == 'unpublish' || $request->button == 'draft') {
            $product->published = 0;
        }

        if ($request->has('cash_on_delivery')) {
            $product->cash_on_delivery = 1;
        }
        if ($request->has('preorder_enabled')) {
            $product->preorder_enabled = 1;
        }
        if ($request->has('featured')) {
            $product->featured = 1;
        }
        if ($request->has('todays_deal')) {
            $product->todays_deal = 1;
        }
        // $product->cash_on_delivery = 0;
        // if ($request->cash_on_delivery) {
        //     $product->cash_on_delivery = 1;
        // }
        // //$variations = array();

        // $product->save();

        //VAT & Tax

        // //Flash Deal
        // if($request->flash_deal_id) {
        //     $flash_deal_product = new FlashDealProduct;
        //     $flash_deal_product->flash_deal_id = $request->flash_deal_id;
        //     $flash_deal_product->product_id = $product->id;
        //     $flash_deal_product->save();
        // }

        // //combinations start
        // $options = array();
        // if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
        //     $colors_active = 1;
        //     array_push($options, $request->colors);
        // }

        // if($request->has('choice_no')){
        //     foreach ($request->choice_no as $key => $no) {
        //         $name = 'choice_options_'.$no;
        //         $data = array();
        //         foreach ($request[$name] as $key => $eachValue) {
        //             array_push($data, $eachValue);
        //         }
        //         array_push($options, $data);
        //     }
        // }

        // //Generates the combinations of customer choice options
        // $combinations = Combinations::makeCombinations($options);
        // if(count($combinations[0]) > 0){
        //     $product->variant_product = 1;
        //     foreach ($combinations as $key => $combination){
        //         $str = '';
        //         foreach ($combination as $key => $item){
        //             if($key > 0 ){
        //                 $str .= '-'.str_replace(' ', '', $item);
        //             }
        //             else{
        //                 if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
        //                     $color_name = Color::where('code', $item)->first()->name;
        //                     $str .= $color_name;
        //                 }
        //                 else{
        //                     $str .= str_replace(' ', '', $item);
        //                 }
        //             }
        //         }
        //         $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
        //         if($product_stock == null){
        //             $product_stock = new ProductStock;
        //             $product_stock->product_id = $product->id;
        //         }

        //         $product_stock->variant = $str;
        //         $product_stock->price = $request['price_'.str_replace('.', '_', $str)];
        //         $product_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
        //         $product_stock->qty = $request['qty_'.str_replace('.', '_', $str)];
        //         $product_stock->image = $request['img_'.str_replace('.', '_', $str)];
        //         $product_stock->save();
        //     }
        // }
        // else{
        //     $product_stock              = new ProductStock;
        //     $product_stock->product_id  = $product->id;
        //     $product_stock->variant     = '';
        //     $product_stock->price       = $request->unit_price;
        //     $product_stock->sku         = $request->sku;
        //     $product_stock->qty         = $request->current_stock;
        //     $product_stock->save();
        // }
        // //combinations end

	    $product->save();


        if($request->has('category_attribute_heads')){
            foreach ($request->category_attribute_heads as $key => $head) {

                $labels = "category_attribute_label_".$key ;
                $values = "category_attribute_values_".$key ;
                foreach($request->$values  as $i=> $value)
                {

                     if($value != null )
                     {


                        $product_specification = new ProductSpecification();
                        $product_specification->product_id = $product->id;
                        $product_specification->category_attribute_head_id =$head;
                        $product_specification->category_attribute_label_id = $request->$labels[$i];
                        $product_specification->category_attribute_value = $value;

                        $product_specification->save();
                    }

                }
                // $str = 'choice_options_'.$no;

                // $item['attribute_id'] = $no;

                // $data = array();
                // // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                // foreach ($request[$str] as $key => $eachValue) {
                //     // array_push($data, $eachValue->value);
                //     array_push($data, $eachValue);
                // }

                // $item['values'] = $data;
                // array_push($choice_options, $item);
            }
        }

        // // Product Translations
        // $product_translation = ProductTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'product_id' => $product->id]);
        // $product_translation->name = $request->name;
        // $product_translation->unit = $request->unit;
        // $product_translation->description = $request->description;
        // $product_translation->save();

        // flash(translate('Product has been inserted successfully'))->success();

        // Artisan::call('view:clear');
        // Artisan::call('cache:clear');

        if($request->tax_id) {
            foreach ($request->tax_id as $key => $val) {
                $product_tax = new ProductTax;
                $product_tax->tax_id = $val;
                $product_tax->product_id = $product->id;
                $product_tax->tax = $request->tax[$key];
                $product_tax->tax_type = $request->tax_type[$key];
                $product_tax->save();
            }
        }

        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
            return redirect()->route('products.admin');
        }
        else{
            if(addon_is_activated('seller_subscription')){
                $seller = Auth::user()->seller;
                $seller->remaining_uploads -= 1;
                $seller->save();
            }
            return redirect()->route('seller.products');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function admin_product_edit(Request $request, $id)
     {
        CoreComponentRepository::initializeCache();

        $product = Product::findOrFail($id);
        if($product->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }

        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category:: where('digital', 0)->get();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags','lang'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function seller_product_edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if($product->digital == 1) {
            return redirect('digitalproducts/' . $id . '/edit');
        }
        $lang = $request->lang;
        $tags = json_decode($product->tags);
        $categories = Category::all();
        return view('backend.product.products.edit', compact('product', 'categories', 'tags','lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product                    = Product::findOrFail($id);
        $product->category_id       = $request->category_id;
        $product->brand_id          = $request->brand_id;
        $product->barcode           = $request->barcode;
        $product->cash_on_delivery = 0;
        $product->featured = 0;
        $product->todays_deal = 0;
        $product->is_quantity_multiplied = 0;

        if (addon_is_activated('refund_request')) {
            if ($request->refundable != null) {
                $product->refundable = 1;
            }
            else {
                $product->refundable = 0;
            }
        }

        if($request->lang == env("DEFAULT_LANGUAGE")){
            $product->name          = $request->name;
            $product->unit          = $request->unit;
            $product->description   = $request->description;
        }

        $slug = $request->slug? Str::slug($request->slug, '-') : Str::slug($request->name, '-');
        $same_slug_count = Product::where('slug','LIKE',$slug.'%')->count();
        $slug_suffix = $same_slug_count > 1 ? '-'.$same_slug_count+1 : '';
        $slug .= $slug_suffix;

        $product->slug = $slug;

        $product->photos                 = $request->photos;
        $product->thumbnail_img          = $request->thumbnail_img;
        $product->min_qty                = $request->min_qty;
        $product->low_stock_quantity     = $request->low_stock_quantity;
        $product->stock_visibility_state = $request->stock_visibility_state;
        // $product->external_link = $request->external_link;
        // $product->external_link_btn = $request->external_link_btn;

        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }
        $product->tags           = implode(',', $tags);

        $product->video_provider = $request->video_provider;
        $product->video_link     = $request->video_link;
        $product->unit_price     = $request->unit_price;
        $product->discount       = $request->discount;
        $product->discount_type     = $request->discount_type;

        if ($request->date_range != null) {
            $date_var               = explode(" to ", $request->date_range);
            $product->discount_start_date = strtotime($date_var[0]);
            $product->discount_end_date   = strtotime( $date_var[1]);
        }

        // $product->shipping_type  = $request->shipping_type;
        $product->est_shipping_days  = $request->est_shipping_days;

        if (addon_is_activated('club_point')) {
            if($request->earn_point) {
                $product->earn_point = $request->earn_point;
            }
        }

        if ($request->has('shipping_type')) {
            if($request->shipping_type == 'free'){
                $product->shipping_cost = 0;
            }
            elseif ($request->shipping_type == 'flat_rate') {
                $product->shipping_cost = $request->flat_shipping_cost;
            }
            elseif ($request->shipping_type == 'product_wise') {
                $product->shipping_cost = json_encode($request->shipping_cost);
            }
        }

        if ($request->has('is_quantity_multiplied')) {
            $product->is_quantity_multiplied = 1;
        }
        if ($request->has('cash_on_delivery')) {
            $product->cash_on_delivery = 1;
        }

        if ($request->has('featured')) {
            $product->featured = 1;
        }

        if ($request->has('todays_deal')) {
            $product->todays_deal = 1;
        }

        $product->meta_title        = $request->meta_title;
        $product->meta_description  = $request->meta_description;
        $product->meta_img          = $request->meta_img;

        if($product->meta_title == null) {
            $product->meta_title = $product->name;
        }

        if($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description);
        }

        if($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img;
        }

        $product->pdf = $request->pdf;

        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $product->colors = json_encode($request->colors);
        }
        else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;

                $data = array();
                foreach ($request[$str] as $key => $eachValue) {
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        foreach ($product->stocks as $key => $stock) {
            $stock->delete();
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        }
        else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);


        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                foreach ($request[$name] as $key => $item) {
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        if(count($combinations[0]) > 0){
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }

                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if($product_stock == null){
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }
                if(isset($request['price_'.str_replace('.', '_', $str)])) {

                    $product_stock->variant = $str;
                    $product_stock->price = $request['price_'.str_replace('.', '_', $str)];
                    $product_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                    $product_stock->qty = $request['qty_'.str_replace('.', '_', $str)];
                    $product_stock->image = $request['img_'.str_replace('.', '_', $str)];

                    $product_stock->save();
                }
            }
        }
        else{
            $product_stock              = new ProductStock;
            $product_stock->product_id  = $product->id;
            $product_stock->variant     = '';
            $product_stock->price       = $request->unit_price;
            $product_stock->sku         = $request->sku;
            $product_stock->qty         = $request->current_stock;
            $product_stock->save();
        }

        $product->save();

        //Flash Deal
        if($request->flash_deal_id) {
            if($product->flash_deal_product){
                $flash_deal_product = FlashDealProduct::findOrFail($product->flash_deal_product->id);
                if(!$flash_deal_product) {
                    $flash_deal_product = new FlashDealProduct;
                }
            } else {
                $flash_deal_product = new FlashDealProduct;
            }

            $flash_deal_product->flash_deal_id = $request->flash_deal_id;
            $flash_deal_product->product_id = $product->id;
            $flash_deal_product->discount = $request->flash_discount;
            $flash_deal_product->discount_type = $request->flash_discount_type;
            $flash_deal_product->save();
        }

        //VAT & Tax
        if($request->tax_id) {
            ProductTax::where('product_id', $product->id)->delete();
            foreach ($request->tax_id as $key => $val) {
                $product_tax = new ProductTax;
                $product_tax->tax_id = $val;
                $product_tax->product_id = $product->id;
                $product_tax->tax = $request->tax[$key];
                $product_tax->tax_type = $request->tax_type[$key];
                $product_tax->save();
            }
        }

        // Product Translations
         $product_translation                = ProductTranslation::firstOrNew(['lang' => $request->lang, 'product_id' => $product->id]);
        $product_translation->name          = $request->name;
        $product_translation->unit          = $request->unit;
        $product_translation->description   = $request->description;
        $product_translation->save();

        flash(translate('Product has been updated successfully'))->success();

        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        foreach ($product->product_translations as $key => $product_translations) {
            $product_translations->delete();
        }

        foreach ($product->stocks as $key => $stock) {
            $stock->delete();
        }

        if(Product::destroy($id)){
            Cart::where('product_id', $id)->delete();

            flash(translate('Product has been deleted successfully'))->success();

            Artisan::call('view:clear');
            Artisan::call('cache:clear');

            return back();
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function bulk_product_delete(Request $request) {
        if($request->id) {
            foreach ($request->id as $product_id) {
                $this->destroy($product_id);
            }
        }

        return 1;
    }

    /**
     * Duplicates the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Request $request, $id)
    {
        $product = Product::find($id);

        if(Auth::user()->id == $product->user_id || Auth::user()->user_type == 'staff'){
            $product_new = $product->replicate();
            $product_new->slug = $product_new->slug.'-'.Str::random(5);
            $product_new->save();

            foreach ($product->stocks as $key => $stock) {
                $product_stock              = new ProductStock;
                $product_stock->product_id  = $product_new->id;
                $product_stock->variant     = $stock->variant;
                $product_stock->price       = $stock->price;
                $product_stock->sku         = $stock->sku;
                $product_stock->qty         = $stock->qty;
                $product_stock->save();

            }

            flash(translate('Product has been duplicated successfully'))->success();
            if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff'){
              if($request->type == 'In House')
                return redirect()->route('products.admin');
              elseif($request->type == 'Seller')
                return redirect()->route('products.seller');
              elseif($request->type == 'All')
                return redirect()->route('products.all');
            }
            else{
                if (addon_is_activated('seller_subscription')) {
                    $seller = Auth::user()->seller;
                    $seller->remaining_uploads -= 1;
                    $seller->save();
                }
                return redirect()->route('seller.products');
            }
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_products_by_brand(Request $request)
    {
        $products = Product::where('brand_id', $request->brand_id)->get();
        return view('partials.product_select', compact('products'));
    }

    public function updateTodaysDeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->todays_deal = $request->status;
        $product->save();
        Cache::forget('todays_deal_products');
        return 1;
    }

    public function updatePublished(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->published = $request->status;

        if($product->added_by == 'seller' && addon_is_activated('seller_subscription')){
            $seller = $product->user->seller;
            if($seller->invalid_at != null && $seller->invalid_at != '0000-00-00' && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0){
                return 0;
            }
        }

        $product->save();
        return 1;
    }

    public function updateProductApproval(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->approved = $request->approved;

        if($product->added_by == 'seller' && addon_is_activated('seller_subscription')){
            $seller = $product->user->seller;
            if($seller->invalid_at != null && Carbon::now()->diffInDays(Carbon::parse($seller->invalid_at), false) <= 0){
                return 0;
            }
        }

        $product->save();
        return 1;
    }

    public function updateFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->featured = $request->status;
        if($product->save()){
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            return 1;
        }
        return 0;
    }

    public function updateSellerFeatured(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->seller_featured = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function sku_combination(Request $request)
    {
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->name;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $product_name = $request->name;
        $unit_price = $request->unit_price;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);
        return view('backend.product.products.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }

    public function product_addon(Request $request){
        $product_ids = $request->product_ids;
        return view('backend.product.products.product_addon', compact('product_ids'));
    }


    public function update_offers (Request $request)
    {
        $offer_ids = $request->offer_ids;
        return view('backend.product.subsubcategories.offer_table', compact('offer_ids'));
    }

    public function submit_offers(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $offer_ids = array();
        if($request->bank_offers)
        {
             $offer_ids = array_merge($offer_ids,$request->bank_offers);
             $product->bank_offers = json_encode($offer_ids);
        }
        if($request->emi_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->emi_offers);
            $product->emi_offers = json_encode($offer_ids);
        }
        if($request->company_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->company_offers);
            $product->company_offers = json_encode($offer_ids);
        }
        if($request->other_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->other_offers);
            $product->other_offers = json_encode($offer_ids);
        }



        $product->save();

        flash(translate('offers has been updated successfully'))->success();

        return back() ;

    }


    public function updatePackageMethod(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->package_method = $request->method;
        $product->save();

        return 1;
    }


    public function updateCancellation(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->cancellation = $request->status;
        $product->save();
        return 1;
    }
    public function update_priority(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->search_priority = $request->value;
        $product->save();
        return 1;
    }
    public function update_badge(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->allow_badge = $request->status;
        $product->badge_title = $request->title;
        $product->badge_forecolor = $request->forecolor;
        $product->badge_backcolor = $request->backcolor;
        $product->save();

        return 1;
    }


    public function updateCOD(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->cash_on_delivery = $request->status;
        $product->save();

        return 1;
    }
    public function update_commission(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->commission = $request->commission;
        $product->commission_type = $request->commission_type;
        $product->save();

        return 1;
    }

    public function update_tax(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->tax = $request->tax;
        $product->tax_type = $request->tax_type;
        $product->save();

        return 1;
    }
    public function updateOnDayDelivery(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->on_day_delivery = $request->status;
        $product->save();

        return 1;
    }
    public function updateBrandApproval(Request $request)
    {
        $products = Product::findOrFail($request->id);
        $products->brand_approval = $request->status;
        $products->save();

        return 1;
    }
    public function updateInstallation(Request $request)
    {
        $products = Product::findOrFail($request->id);
        $products->installation = $request->status;
        $products->installation_description = $request->description;
        $products->save();

        return 1;
    }
    public function updateRandRPolicy(Request $request)
    {
        $products = Product::findOrFail($request->id);

        $products->return_and_replacement_policy = $request->description;
        $products->save();

        return 1;
    }
    public function updateAdditionalText(Request $request)
    {
        $product = Product::findOrFail($request->id);

        $product->additional_text = $request->description;
        $product->save();

        return 1;
    }
    public function updateDiscount(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->save();

        return 1;
    }
    public function updateTax(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->tax = $request->tax;
        $product->tax_type = $request->tax_type;
        $product->save();

        return 1;
    }
    public function updateRandR(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->return_and_replacement = $request->return_and_replacement;
        $product->return_and_replacement_type = $request->return_and_replacement_type;
        $product->save();

        return 1;
    }
    public function updateInstantRandR(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->instant_return_and_replacement = $request->instant_return_and_replacement;
        $product->instant_return_and_replacement_type = $request->instant_return_and_replacement_type;
        $product->save();

        return 1;
    }
    public function updateShippingDays(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->est_shipping_days = $request->est_shipping_days;

        $product->save();
        return 1;
    }

    public function update_vendor_package_guide(Request $request)
    {
        $product =Product::findOrFail($request->id);
        $product->vendor_packaging_guide = $request->vendor_package_guide;

        $product->save();

        return back();
    }

    public function update_delivery_boy_guide(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delivery_boy_guide = $request->delivery_boy_guide;

        $product->save();

        return back();
    }

    public function update_buying_guide(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->buying_guide = $request->buying_guide;

        $product->save();

        return back();
    }

    public function update_delivery_boy_type(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delivery_boy_type = $request->delivery_boy_type;

        $product->save();

        return back();
    }

    public function update_FAQ(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->faq_questions = json_encode($request->questions);
        $product->faq_answers = json_encode($request->answers);

        $product->save();

        return back();
    }




}
