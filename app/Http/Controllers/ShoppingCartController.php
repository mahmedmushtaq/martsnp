<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Support\Facades\DB;
use ShoppingCart;
use App\Product;
use Illuminate\Http\Request;


class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // ShoppingCart::clean();
       // ShoppingCart::destroy();
       // dd(ShoppingCart::destroy(2));
       // return redirect(route("stores.index"));
     //   dd(ShoppingCart::all());


        return view("shoping-cart",[
            'cartData'=>ShoppingCart::all()

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

        $product = Product::find($request->product_id);
        $store = DB::table("stores")->where("id","=",$product->store_id)->first();

        $str = $product->price;
        $price = preg_replace('/\D/', '', $str);


      //  ShoppingCart::clean();


        ShoppingCart::add(
                 $product->id,
                    $product->product_name,

                   $request->cart_quantity,
                    $price,
                    ['store_name'=>$store->name,
                        "single_image"=>$product->single_image,
                        'images'=>$product->images,
                        'store_id'=>$product->store_id]);


//


        return redirect()->back();
       // dd($cart);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
      $cartItem = ShoppingCart::get($id);

      if($request->remove_item !== null){
          ShoppingCart::remove($id);
      }
      else if($request->increase !== null){
          $cartItem->qty += 1;
          ShoppingCart::update($id,$cartItem->qty);
      }else{
        if($cartItem->qty > 0){
            $cartItem->qty -= 1;
           ShoppingCart::update($id,$cartItem->qty);
       }else{
           ShoppingCart::remove($id);
       }
      }




        return redirect()->back();
    }
}
