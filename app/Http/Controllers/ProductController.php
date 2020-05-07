<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 'stores'=>Store::where("user_id",Auth::user()->id),
    public function index()
    {
        //
        return view("dashboard.product.index",[
           'products'=>Product::where("user_id","=",Auth::user()->id)->orderBy("id","DESC")->simplePaginate(12)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  if()


      if(Store::where("user_id",Auth::user()->id)->count() === 0){
          session()->flash("info","Please create a store before adding a new product");
          return redirect()->back();
      }


        return view("dashboard.product.create",[
            'stores'=>Store::where("user_id","=",Auth::user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //

        $product_images = $request->file('product_images');
        $images_path = "";
        $single_image="";

        $i = 0;

        foreach ($product_images as $image) {
            $new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/posts/', $new_name);
            $images_path .= "uploads/posts/".$new_name.",";
            if($i === 0){
                $single_image = "uploads/posts/".$new_name;;
            }

            $i++;

        }

        Product::create([
              'product_name'=>$request->product_name,
            'user_id'=>Auth::user()->id,
            'store_id'=>$request->store_id,
            'category_name'=>$request->category_name,
            'description'=>$request->product_description,
            'price'=>$request->product_price,
            'product_size'=>$request->product_size,
            'images'=>$images_path,
            'single_image'=>$single_image


        ]);
        session()->flash("success","Product added successfully");
        return redirect()->back();


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
    public function edit(Product $product)
    {
        //

           return view("dashboard.product.create",[
             'stores'=>Store::where("user_id","=",Auth::user()->id)->get(),
             "product"=>$product
       ]);
       // 'stores'=>Store::where("user_id","=",Auth::user()->id)->get()
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

      //  dd($request);


        $data= $request->only(['product_name', 'user_id','store_id','category_name','description','price']);

        if($request->hasFile("product_images")){

            $product->deleteImage();
           // dd($request);
            $product_images = $request->file('product_images');
            $images_path = "";
            $i = 0;
            $singleImage = "";

            foreach ($product_images as $image) {
                $new_name = time() . $image->getClientOriginalName();
                $image->move('uploads/posts/', $new_name);
                $images_path .= "uploads/posts/".$new_name.",";
                if($i === 0){
                    $singleImage = "uploads/posts/".$new_name;
                }
                $i ++;

            }


            $data['images'] = $images_path;
            $data['single_image'] = $singleImage;

        }

        $product->update($data);

        session()->flash('success', 'Product updated successfully.');

        // redirect user
        return redirect(route('products.index'));





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product = Product::withTrashed()->where("id",$id)->firstOrFail();

       // $product->tras

        if(!$product->trashed())
              $product->delete();
        else{

            $product->forceDelete();
            $product->deleteImage();
        }



        session()->flash('success', 'Product deleted successfully.');

        return redirect(route('products.index'));

    }
}
