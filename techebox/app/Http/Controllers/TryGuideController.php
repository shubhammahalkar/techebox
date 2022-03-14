<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TryGuideTag;
use App\Models\TryGuideTitle;
use App\Models\UserTag;
use DB;
use Illuminate\Http\Request;

class TryGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $try_guide = DB::table('try_guide_tags')
        ->join('try_guide_title','try_guide_tags.title_id','=','try_guide_title.id')
        ->join('categories','categories.id','=','try_guide_title.category_id')
        ->groupBy('title_id')
        ->get();


       return view('backend.try_guide.index', compact('try_guide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.try_guide.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $try_guide_title = new TryGuideTitle();
        $try_guide_title->title = $request->title;
        $try_guide_title->description_short = $request->description_short;
        $try_guide_title->category_id = $request->category_id;

        if($try_guide_title->save()){
            foreach($request->user_tags as $user_tag_id)
            {
                $try_guide_tag = new TryGuideTag();
                $try_guide_tag->title_id = $try_guide_title->id;
                $try_guide_tag->user_tag_id = $user_tag_id;
                $try_guide_tag ->save();
            }
             flash(__('Title Created Successfully')) ;
             return view('backend.try_guide.index');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::All();
        $try_guide = DB::table('user_tags')
        ->join('try_guide_tags','user_tags.id', '=','try_guide_tags.user_tag_id')
        ->join('try_guide_title','try_guide_tags.title_id', '=','try_guide_title.id')
        ->orderBy('try_guide_tags.title_id')
        ->get();
        $try_guide_title = DB::table('try_guide_title')->get();
        return view('frontend.try_guide',compact('try_guide','categories','try_guide_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = new Category();
        $try_guide = TryGuideTitle::findOrFail(decrypt($id));

        return view('backend.try_guide.edit', compact('try_guide','categories','id'));
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
        $try_guide = TryGuideTag::findOrFail($id);
        $try_guide->name = $request->name;
        if($try_guide->save()){
            flash(__('User Tag has been updated successfully'))->success();
            return redirect()->route('user_tag.index');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $try_guide = TryGuideTag::findOrFail($id);
        if(UserTag::destroy($id)){
            flash(__('User Tag has been deleted successfully'))->success();
            return redirect()->route('user_tag.index');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }

    public function get_tyguide_by_category(Request $request)
    {
        $result = [];
        $try_guide = DB::table('try_guide_tags')
         ->join('try_guide_title','try_guide_tags.title_id','=','try_guide_title.id')
         ->join('categories','categories.id','=','try_guide_title.category_id')
         ->select('try_guide_tags.title_id','try_guide_tags.user_tag_id','title','description_short')
         ->where('category_id',$request->id)
         ->groupBy('title_id')
         ->get();

         foreach($try_guide as $guide)
         {

            $users_tags = DB::table('try_guide_tags')
            ->join('user_tags','user_tags.id','=','try_guide_tags.user_tag_id')
            ->where('try_guide_tags.title_id',$guide->title_id)
            ->select('user_tags.id','name')
            ->get();

            array_push($result,array("title"=>$guide->title,"user_tags"=>$users_tags));

         }

        return json_encode(array("try_guide"=>$result));
    }
}
