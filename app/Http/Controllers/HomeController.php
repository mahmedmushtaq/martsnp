<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use App\StoreType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ShoppingCart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
      //  $this->middleware('auth')->only(['edit']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        front page

      $products = Product::orderBy("id","DESC")->simplePaginate(8);



        return view('index',[
          "cartData"=>ShoppingCart::all(),
          "store_types"=>StoreType::all(),
        ]);
    }



    public function productsOverview(){

//        products page
        $products = Product::orderBy("id","DESC")->simplePaginate(30);


       return view('products-overview',[

            'products'=>$products,
            "cartData"=>ShoppingCart::all(),
        ]);
    }



    public function productDetails($slug){
        $product = Product::where("slug",$slug)->firstOrFail();


        return view("product-detail",[
            "product"=>$product,
            "cartData"=>ShoppingCart::all(),
        ]);
    }


    public function search(Request $request){
        $search_store = str_replace(" ",'',$request->get("search_store"));

        $search_products = str_replace(" ","",$request->get("search_product"));




        if(!empty($search_products)){


//            $products = DB::table("products")
//                ->where("product_name",'LIKE','%'.$search_products.'%')
//                ->orWhere("price",'LIKE','%'.$search_products.'%')
//                ->orWhere("product_size",'LIKE','%'.$search_products.'%')
//                ->simplePaginate(12);

            $products = Product::where("product_name",'LIKE','%'.$search_products.'%')
                ->orWhere("price",'LIKE','%'.$search_products.'%')
                ->orWhere("product_size",'LIKE','%'.$search_products.'%')
                ->orderBy("id","DESC")
                ->simplePaginate(8);


            return view("search",[
                'products'=>$products,
                'count'=>$products->count(),
                "cartData"=>ShoppingCart::all(),
            ]);
        }else if(!empty($search_store)){
           $stores = Store::where("name",'LIKE','%'.$search_store.'%')->orderBy("id","DESC")->simplePaginate(8);

           return view("search",[
               'stores'=>$stores,
               'count'=>$stores->count(),
               "cartData"=>ShoppingCart::all(),
           ]);

        }else{
            return view("search",[
                'msg'=>"Please search something",

                "cartData"=>ShoppingCart::all(),
            ]);
        }


    }

}
