<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryTranslation;
use App\Utility\CategoryUtility;
use Illuminate\Support\Str;
use Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $categories = Category::orderBy('name', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
        }
        $categories = $categories->paginate(15);
        return view('backend.product.categories.index', compact('categories', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('backend.product.categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
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

        $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);
        $category_translation->name = $request->name;
        $category_translation->save();

        flash(translate('Category has been inserted successfully'))->success();
        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);
        return view('backend.product.categories.config',compact('category') );
    }

    public function update_config(Request $request,$id)
    {
         if($request->section1_products)
         {

         }
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
        $category = Category::findOrFail($id);
        $categories = Category::
            // ->with('childrenCategories')
            // ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=' , $category->id)
            orderBy('name','asc')
            ->get();

        return view('backend.product.categories.edit', compact('category', 'categories', 'lang'));
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
        $category = Category::findOrFail($id);
        // if($request->lang == env("DEFAULT_LANGUAGE")){
        //     $category->name = $request->name;
        // }
        $category->name = $request->name;
        $category->digital = $request->digital;
        $category->main_banner = $request->main_banner;
        $category->logo = $request->logo;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_img = $request->meta_img;







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
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        // Product::where('brand_id', $brand->id)->delete();
        foreach ($categories->category_translations as $key => $category_translation) {
            $category_translation->delete();
        }
        Category::destroy($id);

        flash(translate('Brand has been deleted successfully'))->success();
        return redirect()->route('categories.index');
    }

    public function updateFeatured(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->featured = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }


    public function updatePublished(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->published = $request->status;
        $category->save();
        Cache::forget('featured_categories');
        return 1;
    }

    public function add_products(Request $request){
        $product_ids = $request->product_ids;
        return view('backend.product.products.product_addon', compact('product_ids'));
    }
}
