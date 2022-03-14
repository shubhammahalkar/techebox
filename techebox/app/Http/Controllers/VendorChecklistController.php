<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\AttributeTranslation;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\CustomerCancellationReason;
use App\Models\DeliveryBoyChecklist;
use App\Models\VendorCancellationReason;
use App\Models\VendorChecklist;
use CoreComponentRepository;
use Str;

class VendorChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CoreComponentRepository::instantiateShopRepository();
        // CoreComponentRepository::initializeCache();
        $questions = VendorChecklist::orderBy('created_at', 'desc')->get();
        return view('backend.vendor_checklist.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('published', 1)->get();
        return view('backend.vendor_checklist.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = new VendorChecklist();
        $questions->question = $request->question;
        $questions->type = $request->type;
        $questions->category_id = $request->category_id;
        $questions->subcategory_id = $request->subcategory_id;
        $questions->subsubcategory_id = $request->subsubcategory_id;

        $questions->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('questions has been inserted successfully'))->success();
        return redirect()->route('vendor_checklist.index');
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

        $questions = VendorChecklist::findOrFail($id);
        $categories = Category::where('published', 1)->get();
        return view('backend.vendor_checklist.edit', compact('questions','categories'));
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
        $questions = VendorChecklist::findorfail($id);
        $questions->question = $request->question;
        $questions->type = $request->type;
        $questions->category_id = $request->category_id;
        $questions->subcategory_id = $request->subcategory_id;
        $questions->subsubcategory_id = $request->subsubcategory_id;

        $questions->save();

        flash(translate('questions has been updated successfully'))->success();
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
        // $attribute = VendorCancellationReason::findOrFail($id);

        // foreach ($attribute->attribute_translations as $key => $attribute_translation) {
        //     $attribute_translation->delete();
        // }

        VendorChecklist::destroy($id);
        flash(translate('Attribute has been deleted successfully'))->success();
        return redirect()->route('vendor_checklist.index');

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

}
