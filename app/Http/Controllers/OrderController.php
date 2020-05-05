<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ShoppingCart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $history = Order::where("ordered_by","=",Auth::user()->id)->simplePaginate(12);


        return view("dashboard.history",[
            'histories'=>$history
        ]);
      //  return view("submit-ordered");
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


        $cartArray = ShoppingCart::all();

        foreach ($cartArray as $cart){
            Order::create([
                 'price'=>$cart->price,
                 'quantity'=>$cart->qty,
                 'store_id'=>$cart->store_id,
                 'product_id'=>$cart->id,
                 'ordered_by'=>Auth::user()->id,
                  'confirmed'=>'no'
            ]);
        }

        ShoppingCart::clean();
        session()->flash("success","Ordered Placed Successfully");
        return view("submit-ordered");

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
    public function destroy($id)
    {
        //
    }


    public function myorders(){


        $storesIdArray = Store::select('id')->where("user_id","=",Auth::user()->id)->get();



//        $ordersArray = array();
//       foreach ($storesIdArray as $store_id){
//
//           //$orderId = Order::where("store_id","=",$store_id->id)->simplePaginate(12);
//           $orderId = DB::table("orders")->where("store_id","=",$store_id->id)->simplePaginate(12);
//
//          if(sizeof($orderId) > 0)
//             array_push($ordersArray,$orderId);
//       }
        $ordersArray = Order::whereIn("store_id",$storesIdArray)->simplePaginate(12);
//        $ordersArray =  \App\Order::whereHas("stores",function($q) use ($storesIdArray){
//            $q->whereIn('store_id',$storesIdArray);
//        });



       return view("dashboard.my_orders",[
           'orders'=>$ordersArray
       ]);

    }

    public function confirmedOrder(Order $order){
        $order->confirmed = 'yes';
        $order->save();
        session()->flash("success","Order Confirmed Successfully");
        return redirect()->back();
    }
}
