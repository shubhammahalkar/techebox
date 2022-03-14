<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FrontendUpdate;
use App\Models\FrontendUpdateCategory;
use Illuminate\Http\Request;


class FrontendUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $updates = FrontendUpdate::orderBy('created_at', 'desc');

        if ($request->search != null){
            $updates = $updates->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $updates = $updates->paginate(15);

        return view('backend.frontend_update_system.frontend_update.index', compact('updates','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frontend_update_categories = FrontendUpdateCategory::all();
        return view('backend.frontend_update_system.frontend_update.create', compact('frontend_update_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $update = new FrontendUpdate();

        $update->category_id = $request->category_id;
        $update->title = $request->title;
        $update->banner = $request->banner;
        $update->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $update->short_description = $request->short_description;
        $update->description = $request->description;

        $update->meta_title = $request->meta_title;
        $update->meta_img = $request->meta_img;
        $update->meta_description = $request->meta_description;
        $update->meta_keywords = $request->meta_keywords;

        $update->save();

        flash(translate('Updates post has been created successfully'))->success();
        return redirect()->route('frontend_update.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = FrontendUpdate::find($id);
        $frontend_update_categories = FrontendUpdateCategory::all();

        return view('backend.frontend_update_system.frontend_update.edit', compact('update','frontend_update_categories'));
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
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $update = FrontendUpdate::find($id);

        $update->category_id = $request->category_id;
        $update->title = $request->title;
        $update->banner = $request->banner;
        $update->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $update->short_description = $request->short_description;
        $update->description = $request->description;

        $update->meta_title = $request->meta_title;
        $update->meta_img = $request->meta_img;
        $update->meta_description = $request->meta_description;
        $update->meta_keywords = $request->meta_keywords;

        $update->save();

        flash(translate('Updates post has been updated successfully'))->success();
        return redirect()->route('frontend_update.index');
    }

    public function change_status(Request $request) {
        $update = FrontendUpdate::find($request->id);
        $update->status = $request->status;

        $update->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FrontendUpdate::find($id)->delete();

        return redirect('admin/frontend_update');
    }


    public function all_blog() {
        $updates = FrontendUpdate::where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view("frontend.frontend_update.listing", compact('updates'));
    }

    public function blog_details($slug) {
        $update = FrontendUpdate::where('slug', $slug)->first();
        return view("frontend.frontend_update.details", compact('update'));
    }
}
