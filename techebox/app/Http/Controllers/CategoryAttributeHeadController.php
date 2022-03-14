<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\AttributeTranslation;
use App\Models\AttributeValue;
use App\Models\CategoryAttributeHead;
use CoreComponentRepository;
use Str;

class CategoryAttributeHeadController extends Controller
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
        $attributes = CategoryAttributeHead::orderBy('created_at', 'desc')->get();
        return view('backend.product.category_attribute_head.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.product.category_attribute_head.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new CategoryAttributeHead();
        $attribute->name = $request->name;
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('Attribute has been inserted successfully'))->success();
        return redirect()->route('category_attribute_heads.index');
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
        $head = CategoryAttributeHead::findOrFail($id);
        return view('backend.product.category_attribute_head.edit', compact('head','lang'));
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
        $head = CategoryAttributeHead::findOrFail($id);

        $head->name = $request->name;
        $head->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('  updated successfully'))->success();
        return redirect()->route('category_attribute_heads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $head = CategoryAttributeHead::findOrFail($id);

        // foreach ($attribute->attribute_translations as $key => $attribute_translation) {
        //     $attribute_translation->delete();
        // }

        CategoryAttributeHead::destroy($id);
        flash(translate('  deleted successfully'))->success();
        return redirect()->route('category_attribute_heads.index');

    }



}
