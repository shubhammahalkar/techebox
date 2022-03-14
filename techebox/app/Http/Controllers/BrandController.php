<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Product;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $brands = Brand::orderBy('name', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $brands = $brands->where('name', 'like', '%'.$sort_search.'%');
        }
        $brands = $brands->paginate(15);
        return view('backend.product.brands.index', compact('brands', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.brands.create');
    }

    public function config($id)
    {
        $brand  = Brand::findOrFail($id);
        return view('backend.product.brands.config',compact('brand'));
    }
    public function setting($id)
    {
        $brand  = Brand::findOrFail($id);
        return view('backend.product.brands.setting',compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_img = $request->meta_img;
        // $brand->description = $request->description;
        if ($request->slug != null) {
            $brand->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }

        $brand->logo = $request->logo;
        $brand->main_banner = $request->main_banner;
        $brand->section_1_banner_1 = $request->section_1_banner_1;
        $brand->section_1_banner_1_url = $request->section_1_banner_1_url;
        $brand->section_1_banner_2 = $request->section_1_banner_2;
        $brand->section_1_banner_2_url = $request->section_1_banner_2_url;
        $brand->section_1_banner_3 = $request->section_1_banner_3;
        $brand->section_1_banner_3_url = $request->section_1_banner_3_url;
        $brand->save();

        // $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);
        // $category_translation->name = $request->name;
        // $category_translation->save();

        flash(translate('Brand has been inserted successfully'))->success();
        return redirect()->route('brands.index');

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
    public function edit(Request $request, $id)
    {
        $lang   = $request->lang;
        $brand  = Brand::findOrFail($id);
        return view('backend.product.brands.edit', compact('brand','lang'));
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
        $brand = Brand::findorfail($id);
        $brand->name = $request->name;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->meta_img = $request->meta_img;
        // $brand->description = $request->description;
        if ($request->slug != null) {
            $brand->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }

        $brand->logo = $request->logo;
        $brand->main_banner = $request->main_banner;
        $brand->section_1_banner_1 = $request->section_1_banner_1;
        $brand->section_1_banner_1_url = $request->section_1_banner_1_url;
        $brand->section_1_banner_2 = $request->section_1_banner_2;
        $brand->section_1_banner_2_url = $request->section_1_banner_2_url;
        $brand->section_1_banner_3 = $request->section_1_banner_3;
        $brand->section_1_banner_3_url = $request->section_1_banner_3_url;
        $brand->save();

        // $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);
        // $category_translation->name = $request->name;
        // $category_translation->save();

        flash(translate('Brand has been Updated successfully'))->success();
        return redirect()->route('brands.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        Product::where('brand_id', $brand->id)->delete();
        foreach ($brand->brand_translations as $key => $brand_translation) {
            $brand_translation->delete();
        }
        Brand::destroy($id);

        flash(translate('Brand has been deleted successfully'))->success();
        return redirect()->route('brands.index');

    }

    public function update_offers (Request $request)
    {
        $offer_ids = $request->offer_ids;
        return view('backend.product.subsubcategories.offer_table', compact('offer_ids'));
    }

    public function submit_offers(Request $request,$id)
    {
        $brand = Brand::findOrFail($id);
        $offer_ids = array();
        if($request->bank_offers)
        {
             $offer_ids = array_merge($offer_ids,$request->bank_offers);
             $brand->bank_offers = json_encode($offer_ids);
        }
        if($request->emi_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->emi_offers);
            $brand->emi_offers = json_encode($offer_ids);
        }
        if($request->company_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->company_offers);
            $brand->company_offers = json_encode($offer_ids);
        }
        if($request->other_offers)
        {
            $offer_ids = array_merge($offer_ids,$request->other_offers);
            $brand->other_offers = json_encode($offer_ids);
        }



        $brand->save();

        flash(translate('offers has been updated successfully'))->success();

        return back() ;
    }


    public function updateRandR(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->return_and_replacement = $request->return_and_replacement;
        $brand->return_and_replacement_type = $request->return_and_replacement_type;
        $brand->save();

        return 1;
    }

    public function updateInstantRandR(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->instant_return_and_replacement = $request->instant_return_and_replacement;
        $brand->instant_return_and_replacement_type = $request->instant_return_and_replacement_type;
        $brand->save();

        return 1;
    }

    public function update_badge(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->allow_badge = $request->status;
        $brand->badge_title = $request->title;
        $brand->badge_forecolor = $request->forecolor;
        $brand->badge_backcolor = $request->backcolor;
        $brand->save();

        return 1;
    }

    public function updateCOD(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->cash_on_delivery = $request->status;
        $brand->save();

        return 1;
    }

    public function updateBrandApproval(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->brand_approval = $request->status;
        $brand->save();

        return 1;
    }

    public function update_commission(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->commission = $request->commission;
        $brand->commission_type = $request->commission_type;
        $brand->save();

        return 1;
    }

    public function update_tax(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->tax = $request->tax;
        $brand->tax_type = $request->tax_type;
        $brand->save();

        return 1;
    }

    public function updateDiscount(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->discount = $request->discount;
        $brand->discount_type = $request->discount_type;
        $brand->save();

        return 1;
    }

    public function updateCancellation(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->cancellation = $request->status;
        $brand->save();

        return 1;
    }

    public function update_buying_guide(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->buying_guide = $request->buying_guide;

        $brand->save();

        return back();
    }

    public function updateRandRPolicy(Request $request)
    {
        $brand = Brand::findOrFail($request->id);

        $brand->return_and_replacement_policy = $request->description;
        $brand->save();

        return 1;
    }

    public function updateAdditionalText(Request $request)
    {
        $brand = Brand::findOrFail($request->id);

        $brand->additional_text = $request->description;
        $brand->save();

        return 1;



    }
    public function updatePublished(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->published = $request->status;
        $brand->save();

        return 1;
    }
}
