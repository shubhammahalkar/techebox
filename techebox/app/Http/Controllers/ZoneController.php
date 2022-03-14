<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageTranslation;
use App\Models\Zone;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $zone = Zone::where('slug',$slug)->first();
        $business_settings = new BusinessSetting();
        return view('frontend.zone ',compact('zone','business_settings')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website_settings.zones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = new Zone();
        $zone->title = $request->title;
        if (Zone::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $zone->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $zone->type             = "custom_zone";
            $zone->content          = $request->content;
            $zone->meta_title       = $request->meta_title;
            $zone->meta_description = $request->meta_description;
            $zone->keywords         = $request->keywords;
            $zone->meta_image       = $request->meta_image;
            $zone->save();

            $page_translation           = PageTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'zone_id' => $zone->id]);
            $page_translation->title    = $request->title;
            $page_translation->content  = $request->content;
            $page_translation->save();

            flash(translate('New page has been created successfully'))->success();
            return redirect()->route('website.zones');
        }

        flash(translate('Slug has been used already'))->warning();
        return back();
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
        $lang = $request->lang;
        $zone_name = $request->zone;
        $zone = Zone::where('slug', $id)->first();
        // if($zone != null){
        //   if ($page_name == 'home') {
        //     return view('backend.website_settings.pages.home_page_edit', compact('page','lang'));
        //   }
        //   if ($page_name == 'mobile_home') {
        //     return view('backend.website_settings.pages.mobile_home_page_edit', compact('page','lang'));
        //   }
        //   if ($page_name == 'zone_page') {
        //     return view('backend.website_settings.pages.zone_page_edit', compact('page','lang'));
        //   }
        //   else{
            return view('backend.website_settings.zones.edit', compact('zone','lang'));
          }
        // }
        // abort(404);


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zone = Zone::findOrFail($id);
        if (Page::where('id','!=', $id)->where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            if($zone->type == 'custom_page'){
              $zone->slug           = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            }
            if($request->lang == env("DEFAULT_LANGUAGE")){
              $zone->title          = $request->title;
              $zone->content        = $request->content;
            }
            $zone->meta_title       = $request->meta_title;
            $zone->meta_description = $request->meta_description;
            $zone->keywords         = $request->keywords;
            $zone->meta_image       = $request->meta_image;
            $zone->save();

            $page_translation           = PageTranslation::firstOrNew(['lang' => $request->lang, 'page_id' => $zone->id]);
            $page_translation->title    = $request->title;
            $page_translation->content  = $request->content;
            $page_translation->save();

            flash(translate('Page has been updated successfully'))->success();
            return redirect()->route('website.zones');
        }

      flash(translate('Slug has been used already'))->warning();
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
        $zone = Zone::findOrFail($id);
        foreach ($zone->page_translations as $key => $page_translation) {
            $page_translation->delete();
        }
        if(Zone::destroy($id)){
            flash(translate('Page has been deleted successfully'))->success();
            return redirect()->back();
        }
        return back();
    }

    public function show_custom_zone($slug){
        $zone = Zone::where('slug', $slug)->first();
        if($zone != null){
            return view('frontend.custom_zone', compact('zone'));
        }
        abort(404);
    }

}
