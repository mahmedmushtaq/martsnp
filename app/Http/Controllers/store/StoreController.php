<?php

namespace App\Http\Controllers\Store;

use App\Seller;
use App\Store;
use App\StoreType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::where("user_id","=",Auth::user()->id)->orderBy("id","DESC")->orderBy("id","DESC")->get();

//        foreach ($stores as $store){

//           dd("Now date ".$currentDate. " server date ".$serverDate." diff ".$diff. " remaining ".$remaining);
//        }




        return view('dashboard.store.index',[
             'stores'=>$stores,
            'current_time'=>Carbon::parse(Carbon::now()),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("dashboard.store.create",[
            'store_types'=>StoreType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'store_type'=>'required',
            'store_image'=>'required|image',
        ]);

        $store_image  = $request->file("store_image");
        $new_name = time().$store_image->getClientOriginalName();
        $store_image->move('uploads/stores/', $new_name);
        $store_image_path =  "uploads/stores/".$new_name;

        $no = rand(1,999);
        $slug = $request->name.'-'.$no;

        Store::create([
            'name'=>$request->name,
            'slug'=>Str::slug($slug),
            'store_image'=>$store_image_path,
            'user_id'=>Auth::user()->id,
            'store_type'=>$request->store_type
        ]);

        session()->flash("success","Store created successfully");
        return redirect(route('stores.index'));


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
    public function edit(Store $store)
    {
        //
        return view("dashboard.store.create",[
            'store'=>$store,
            'store_types'=>StoreType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
        $data = $request->only(['name','store_type']);
        if($request->hasFile("store_image")){
            $store->deleteStoreImage();
            $store_image  = $request->file("store_image");
            $new_name = time().$store_image->getClientOriginalName();
            $store_image->move('uploads/stores/', $new_name);
            $store_image_path =  "uploads/stores/".$new_name;
            $data['store_image'] = $store_image_path;
        }
        $store->update($data);
//        $this->validate($request,[
//            'name'=>'required'
//        ]);
//
//        $store->update([
//            'name'=>$request->name
//        ]);

        session()->flash("success","Store updated successfully");
        return redirect(route("stores.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //

        $store->deleteStoreImage();
        $store->delete();

        session()->flash("success","Store deleted successfully");
        return redirect()->back();
    }
}
