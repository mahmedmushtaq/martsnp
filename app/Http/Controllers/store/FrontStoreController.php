<?php

namespace App\Http\Controllers\Store;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use ShoppingCart;
class FrontStoreController extends Controller
{
    //

    public function storeProduct($slug){

        //   dd($slug);
        $store = Store::where("slug","=",$slug)->firstOrFail();

        $products = $store->products()->orderBy("id","DESC")->simplePaginate(8);

        return view ('front.store.product',[
            'store_name'=>$store->name,
            'products'=>$products,
            "cartData"=>ShoppingCart::all(),
        ]);
    }

    public function storesOverview(){



        return view('front.store.stores-overview',[

            'stores'=>DB::table("stores")->orderBy("id","DESC")->simplePaginate(30),
            "cartData"=>ShoppingCart::all(),
        ]);
    }

    public function showSpecificStore($type){
        // mean show store on the basis of category

        return view("front.store.particular_store",[
           "type"=>str_replace("-"," ",$type),
           "stores"=>Store::where("store_type",$type)->simplePaginate(12),
           "cartData"=>ShoppingCart::all(),
        ]);
    }

}
