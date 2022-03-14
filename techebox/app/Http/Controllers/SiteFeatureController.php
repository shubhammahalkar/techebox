<?php

namespace App\Http\Controllers;

use App\Models\SiteFeature;
use Illuminate\Http\Request;

class SiteFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site_features = SiteFeature::all();
        return view('backend.site_features.index', compact('site_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($position)
    {
        return view('site_features.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $site_feature = new SiteFeature();
            $site_feature->photo = $request->photo;
            $site_feature->url = $request->url;
            $site_feature->title = $request->title;
            $site_feature->position = $request->position;
            $site_feature->save();
            flash(__('Site Feature has been inserted successfully'))->success();
        }
        return redirect()->route('home_settings.index');
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
    public function edit($id)
    {
        $site_feature = SiteFeature::findOrFail($id);
        return view('site_features.edit', compact('site_feature'));
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
        $site_feature = SiteFeature::find($id);
        $site_feature->photo = $request->previous_photo;
        if($request->hasFile('photo')){
            $site_feature->photo = $request->photo->store('uploads/site_features');
        }
        $site_feature->url = $request->url;
        $site_feature->title = $request->title;
        $site_feature->save();
        flash(__('Site Features has been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }


    public function update_status(Request $request)
    {
        $site_feature = SiteFeature::find($request->id);
        $site_feature->published = $request->status;
        if($request->status == 1){
            if(count(SiteFeature::where('published', 1)->where('position', $site_feature->position)->get()) < 4)
            {
                if($site_feature->save()){
                    return '1';
                }
                else {
                    return '0';
                }
            }
        }
        else{
            if($site_feature->save()){
                return '1';
            }
            else {
                return '0';
            }
        }

        return '0';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site_feature = SiteFeature::findOrFail($id);
        if(SiteFeature::destroy($id)){
            //unlink($banner->photo);
            flash(__('Site Features has been deleted successfully'))->success();
        }
        else{
            flash(__('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }
}
