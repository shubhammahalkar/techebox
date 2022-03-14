<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\AttributeTranslation;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\CategoryAttributeHead;
use App\Models\UserTag;
use CoreComponentRepository;
use Str;

class UserTagController extends Controller
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
        $attributes = UserTag::orderBy('created_at', 'desc')->get();
        return view('backend.product.user_tag.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('published', 1)->get();

        return view('backend.product.user_tag.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new UserTag();
        $attribute->name = $request->name;

        $attribute->category_id = $request->category_id;
        $attribute->subcategory_id = $request->subcategory_id;
        $attribute->subsubcategory_id = $request->subsubcategory_id;
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('Attribute has been inserted successfully'))->success();
        return redirect()->route('user_tags.index');
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
        $attribute = CategoryAttribute::findOrFail($id);
        return view('backend.product.category_attribute.edit', compact('attribute','lang'));
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
        $attribute = CategoryAttributeHead::findOrFail($id);
        if($request->lang == env("DEFAULT_LANGUAGE")){
          $attribute->name = $request->name;
        }
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('Attribute has been updated successfully'))->success();
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
        $attribute = CategoryAttribute::findOrFail($id);

        // foreach ($attribute->attribute_translations as $key => $attribute_translation) {
        //     $attribute_translation->delete();
        // }

        CategoryAttribute::destroy($id);
        flash(translate('Attribute has been deleted successfully'))->success();
        return redirect()->route('category_attributes.index');

    }

    public function store_attribute_value(Request $request)
    {
        $attribute_value = new AttributeValue;
        $attribute_value->attribute_id = $request->attribute_id;
        $attribute_value->value = ucfirst($request->value);
        $attribute_value->save();

        flash(translate('Attribute value has been inserted successfully'))->success();
        return redirect()->route('attributes.show', $request->attribute_id);
    }

    public function edit_attribute_value(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        return view("backend.product.attribute.attribute_value.edit", compact('attribute_value'));
    }

    public function update_attribute_value(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);

        $attribute_value->attribute_id = $request->attribute_id;
        $attribute_value->value = ucfirst($request->value);

        $attribute_value->save();

        flash(translate('Attribute value has been updated successfully'))->success();
        return back();
    }

    public function destroy_attribute_value($id)
    {
        $attribute_values = AttributeValue::findOrFail($id);
        AttributeValue::destroy($id);

        flash(translate('Attribute value has been deleted successfully'))->success();
        return redirect()->route('attributes.show', $attribute_values->attribute_id);

    }

    public function colors(Request $request) {
        $sort_search = null;
        $colors = Color::orderBy('created_at', 'desc');

        if ($request->search != null){
            $colors = $colors->where('name', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        $colors = $colors->paginate(10);

        return view('backend.product.color.index', compact('colors', 'sort_search'));
    }

    public function store_color(Request $request) {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:colors|max:255',
        ]);
        $color = new Color;
        $color->name = Str::replace(' ', '', $request->name);
        $color->code = $request->code;

        $color->save();

        flash(translate('Color has been inserted successfully'))->success();
        return redirect()->route('colors');
    }

    public function edit_color(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        return view('backend.product.color.edit', compact('color'));
    }

    /**
     * Update the color.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_color(Request $request, $id)
    {
        $color = Color::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:colors,code,'.$color->id,
        ]);

        $color->name = Str::replace(' ', '', $request->name);
        $color->code = $request->code;

        $color->save();

        flash(translate('Color has been updated successfully'))->success();
        return back();
    }

    public function destroy_color($id)
    {
        Color::destroy($id);

        flash(translate('Color has been deleted successfully'))->success();
        return redirect()->route('colors');

    }

    public function get_user_tags_by_category(Request $request)
    {
        $user_tags = UserTag::where('subsubcategory_id',$request->category_id)->get();
        return $user_tags;
    }

}
