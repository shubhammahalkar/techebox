<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\AttributeTranslation;
use App\Models\AttributeValue;
use App\Models\BuyingGuide;
use App\Models\VendorPackagingGuide;
use CoreComponentRepository;
use Str;

class VendorPackageGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        CoreComponentRepository::instantiateShopRepository();
        CoreComponentRepository::initializeCache();
        $vendor_package_guides = VendorPackagingGuide::orderBy('created_at', 'desc')->get();
        return view('backend.vendor_package_guide.index', compact('vendor_package_guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.vendor_package_guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new VendorPackagingGuide();
        $attribute->name = $request->name;
        $attribute->description = $request->description;
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('inserted successfully'))->success();
        return redirect()->route('vendor_package_guide.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['attribute'] = Attribute::findOrFail($id);
        $data['all_attribute_values'] = AttributeValue::with('attribute')->where('attribute_id', $id)->get();

        // echo '<pre>';print_r($data['all_attribute_values']);die;

        return view("backend.product.attribute.attribute_value.index", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lang      = $request->lang;
        $guide = VendorPackagingGuide::findOrFail($id);
        return view('backend.vendor_package_guide.edit', compact('guide','lang'));
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
        $guide = VendorPackagingGuide::findOrFail($id);

        $guide->name = $request->name;
        $guide->description = $request->description;
        $guide->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('updated successfully'))->success();
        return redirect()->route('vendor_package_guide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = VendorPackagingGuide::findOrFail($id);



        VendorPackagingGuide::destroy($id);
        flash(translate('Deleted successfully'))->success();
        return redirect()->route('vendor_package_guide.index');

    }















}
