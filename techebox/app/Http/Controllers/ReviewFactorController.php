<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\AttributeTranslation;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\CategoryAttributeHead;
use App\Models\ReviewFactor;
use CoreComponentRepository;
use Str;

class ReviewFactorController extends Controller
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
        $attributes = ReviewFactor::orderBy('created_at', 'desc')->get();
        return view('backend.product.review_factor.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('published', 1)->get();
        // $heads = CategoryAttributeHead::all();
        return view('backend.product.review_factor.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new CategoryAttribute;
        $attribute->name = $request->name;
        $attribute->category_attribute_head_id = $request->head_id;
        $attribute->category_id = $request->category_id;
        $attribute->subcategory_id = $request->subcategory_id;
        $attribute->subsubcategory_id = $request->subsubcategory_id;
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('Attribute has been inserted successfully'))->success();
        return redirect()->route('review_factors.index');
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
        $factor = ReviewFactor::findOrFail($id);
        return view('backend.product.review_factor.edit', compact('factor','lang'));
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
        $factor = ReviewFactor::findOrFail($id);

        $factor->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate(' updated successfully'))->success();
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
        $factor = ReviewFactor::findOrFail($id);

        // foreach ($attribute->attribute_translations as $key => $attribute_translation) {
        //     $attribute_translation->delete();
        // }

        ReviewFactor::destroy($id);
        flash(translate('  deleted successfully'))->success();
        return redirect()->route('review_factors.index');

    }

    

}
