<?php



namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CategoryAttributeLabel;
use App\Product;
use App\Seller;

use App\Shop;
use App\SubCategory;
use App\SubSubCategory;
use Illuminate\Http\Request;
use App\CategoryAttribute;
use App\Models\Brand as ModelsBrand;
use App\Models\ServiceCenter;

use CoreComponentRepository;

class ServiceCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        CoreComponentRepository::instantiateShopRepository();
        $service_centers = ServiceCenter::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.service_centers.index', compact('service_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = ModelsBrand::all();
         return view('backend.service_centers.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_center = new ServiceCenter();
        $service_center->name = $request->name;
        $service_center->brand_id = $request->brand_id;
        $service_center->address = $request->address;
        $service_center->contact_no = $request->contact_no;
        $service_center->email_id = $request->email_id;
        $service_center->map_link = $request->map_link;

        if ($request->has('pincode') && count($request->pincode) > 0) {
            $service_center->pincode = json_encode($request->pincode);
        } else {
            $pincode = array();
            $service_center->pincode = json_encode($pincode);
        }

        if($service_center->save()){
            flash(__('Service Center has been inserted successfully'))->success();
            return redirect()->route('service_centers.index');
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
        $service_centers = ServiceCenter::findOrFail(decrypt($id));
        $brands = ModelsBrand::all();
        return view('backend.service_centers.edit', compact('brands','service_centers'));
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
        $service_center = ServiceCenter::findOrFail($id);
        $service_center->name = $request->name;
        $service_center->brand_id = $request->brand_id;
        $service_center->address = $request->address;
        $service_center->contact_no = $request->contact_no;
        $service_center->email_id = $request->email_id;
        $service_center->map_link = $request->map_link;

        if ($request->has('pincode') && count($request->pincode) > 0) {
            $service_center->pincode = json_encode($request->pincode);
        } else {
            $pincode = array();
            $service_center->pincode = json_encode($pincode);
        }

        if($service_center->save()){
            flash(__('Service Center has been updated successfully'))->success();
            return redirect()->route('service_centers.index');
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
        $service_center = ServiceCenter::findOrFail($id);
        if(ServiceCenter::destroy($id)){
            flash(__('Service Centers has been deleted successfully'))->success();
            return redirect()->route('service_centers.index');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }


    public function search(Request $request)
    {
        $query = $request->qsc;
        $brand_id = $request->brand_id;

        $conditions = array();

        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }

        $service_center = ServiceCenter::where($conditions);

        if($query != null){
            $service_center = $service_center->where('pincode', 'like', '%'.$query.'%');
            $service_center->orderBy('created_at', 'desc');
        }

        $service_center = $service_center->paginate(12)->appends(request()->query());

        return view('frontend.product_listing', compact('service_center', 'query', 'category_id', 'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes', 'all_colors', 'selected_color'));
    }


    public function ajax_search(Request $request)
    {
        $query = $request->search;
        $brand_id = $request->brand_id;

        $service_centers = ServiceCenter::where('brand_id', $brand_id)->where('pincode', 'like', '%'.$query.'%')->get();

        if(sizeof($service_centers)>0){
            return view('frontend.partials.search_content_sc', compact('service_centers'));
        }
        return '0';
    }
}
