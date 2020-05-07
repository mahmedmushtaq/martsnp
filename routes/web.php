<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', "HomeController@index")->name("home");
Route::get('store/{store}', "HomeController@storeProduct")->name("storeProduct");
Route::get("products-overview","HomeController@productsOverview")->name("productsoverview");
Route::get("stores-overview","HomeController@storesOverview")->name("storesoverview");
Route::get("product/{product}/details","HomeController@productDetails")->name("productdetails");
Route::get("search","HomeController@search");





//Route::get('/home', 'HomeController@index')->name("dashboardhome");

Route::get("/dashboard",function (){

    return view("dashboard.home");

})->name('dashboardhome');

Route::get("/icon",function (){
    return view("dashboard.icon-material");
});

Route::resource("cart","ShoppingCartController");
Route::resource("orders",'OrderController');



Route::group(['prefix'=>'dashboard','middleware'=>['auth']],function(){



    Route::middleware(['seller'])->group(function(){
        Route::resource("stores","StoreController");
        Route::resource("products","ProductController");
        Route::get("my-orders","OrderController@myorders")->name("orders.myorders");
        Route::put("confirmed-orders/{order}","OrderController@confirmedOrder")->name("orders.confirmed");
    });
    Route::resource("seller","SellerController");

});



//Route::get("","");
//Route::get("","");
//Route::get("","");
//Route::get("","");
