<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\CategoryTranslation;
use App\Models\Offer;
use App\Models\SubCategory;
use App\Utility\CategoryUtility;
use Illuminate\Support\Str;
use Cache;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $categories = SubSubCategory::orderBy('name', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
        }
        $categories = $categories->paginate(15);
        return view('backend.product.subsubcategories.index', compact('categories', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('backend.product.subsubcategories.create',compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new SubSubCategory;
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->subcategory_id = $request->subcategory_id;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_img = $request->meta_img;
        // $brand->description = $request->description;
        if ($request->slug != null) {
            $category->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }

        $category->logo = $request->logo;
        $category->main_banner = $request->main_banner;
        $category->section_1_banner_1 = $request->section_1_banner_1;
        $category->section_1_banner_1_url = $request->section_1_banner_1_url;
        $category->section_1_banner_2 = $request->section_1_banner_2;
        $category->section_1_banner_2_url = $request->section_1_banner_2_url;
        $category->section_1_banner_3 = $request->section_1_banner_3;
        $category->section_1_banner_3_url = $request->section_1_banner_3_url;
        $category->save();

        // $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);
        // $category_translation->name = $request->name;
        // $category_translation->save();

        flash(translate('Sub Category has been inserted successfully'))->success();
        return redirect()->route('subsubcategories.index');
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


    public function config($id)
    {
        $category = SubSubCategory::findOrFail($id);
        $offer = new Offer();
        $bank_offers = $offer->bank_offers();
        $company_offers = $offer->company_offers();
        return view('backend.product.subsubcategories.config',compact('category','bank_offers','company_offers') );
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lang = $request->lang;
        $category = SubSubCategory::findOrFail($id);
        $categories = Category::
            orderBy('name','asc')
            ->get();

        return view('backend.product.subsubcategories.edit', compact('category', 'categories', 'lang'));
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
        $category = SubSubCategory::findOrFail($id);
        $category->category_id = $request->category_id;
        $category->subcategory_id = $request->subcategory_id;
        $category->digital = $request->digital;
        $category->main_banner = $request->main_banner;
        $category->logo = $request->logo;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_img = $request->meta_img;
        $category->category_id = $request->category_id;

        if ($request->slug != null) {
            $category->slug = strtolower($request->slug);
        }
        else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }


        if ($request->commision_rate != null) {
            $category->commision_rate = $request->commision_rate;
        }

        $category->save();

        // $category->attributes()->sync($request->filtering_attributes);

        // $category_translation = CategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        // $category_translation->name = $request->name;
        // $category_translation->save();

        Cache::forget('featured_categories');
        flash(translate('Category has been updated successfully'))->success();
        return back();
    }


    public function update_offers (Request $request)
    {
        $offer_ids = $request->offer_ids;
        return view('backend.product.subsubcategories.offer_table', compact('offer_ids'));
    }

    public function submit_offers(Request $request,$id)
    {
        $category = SubSubCategory::findOrFail($id);
        $offer_ids = array();
        if($request->bank_offers)
        {
             $offer_ids = array_merge($offer_ids,$request->bank_offers);
             $category->bank_offers = json_encode($offer_ids);
        }
        if($request->emi_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->emi_offers);
            $category->emi_offers = json_encode($offer_ids);
        }
        if($request->company_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->company_offers);
            $category->company_offers = json_encode($offer_ids);
        }
        if($request->other_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->other_offers);
            $category->other_offers = json_encode($offer_ids);
        }



        $category->save();

        flash(translate('offers has been updated successfully'))->success();

        return back() ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = SubSubCategory::findOrFail($id);
        // Product::where('brand_id', $brand->id)->delete();
        // foreach ($categories->category_translations as $key => $category_translation) {
        //     $category_translation->delete();
        // }
        SubSubCategory::destroy($id);

        flash(translate('Brand has been deleted successfully'))->success();
        return redirect()->route('subsubcategories.index');
    }

    public function updateFeatured(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->featured = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function updatePackageMethod(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->package_method = $request->method;
        $category->save();

        return 1;
    }

    public function updatePublished(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->published = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateCancellation(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->cancellation = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function update_badge(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->allow_badge = $request->status;
        $category->badge_title = $request->title;
        $category->badge_forecolor = $request->forecolor;
        $category->badge_backcolor = $request->backcolor;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }


    public function updateCOD(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->cash_on_delivery = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function update_commission(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->commission = $request->commission;
        $category->commission_type = $request->commission_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function update_tax(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->tax = $request->tax;
        $category->tax_type = $request->tax_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateOnDayDelivery(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->on_day_delivery = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateBrandApproval(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->brand_approval = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateInstallation(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->installation = $request->status;
        $category->installation_description = $request->description;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateRandRPolicy(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);

        $category->return_and_replacement_policy = $request->description;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateAdditionalText(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);

        $category->additional_text = $request->description;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateDiscount(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->discount = $request->discount;
        $category->discount_type = $request->discount_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateTax(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->tax = $request->tax;
        $category->tax_type = $request->tax_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateRandR(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->return_and_replacement = $request->return_and_replacement;
        $category->return_and_replacement_type = $request->return_and_replacement_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateInstantRandR(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->instant_return_and_replacement = $request->instant_return_and_replacement;
        $category->instant_return_and_replacement_type = $request->instant_return_and_replacement_type;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }
    public function updateShippingDays(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->est_shipping_days = $request->est_shipping_days;

        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function update_vendor_package_guide(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->vendor_packaging_guide = $request->vendor_package_guide;

        $category->save();
        Cache::forget('featured_categories');
        return back();
    }

    public function update_delivery_boy_guide(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->delivery_boy_guide = $request->delivery_boy_guide;

        $category->save();
        Cache::forget('featured_categories');
        return back();
    }

    public function update_buying_guide(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->buying_guide = $request->buying_guide;

        $category->save();
        Cache::forget('featured_categories');
        return back();
    }

    public function update_delivery_boy_type(Request $request)
    {
        $category = SubSubCategory::findOrFail($request->id);
        $category->delivery_boy_type = $request->delivery_boy_type;

        $category->save();
        Cache::forget('featured_categories');
        return back();
    }


    public function get_subcategories_by_subcategory(Request $request)
    {
        $subcategories = SubSubCategory::where('subcategory_id', $request->category_id)->get();
        return $subcategories;
    }
}
