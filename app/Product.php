<?php

namespace App;






use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    //

    public function deleteImage(){
        foreach(explode(",",$this->images) as $image){
            if($image !== '')
             File::delete($image);
        }
        return true;

    }
    public function stores(){
       // return $this->belongsToMany(Store::class);
      return  $this->belongsTo('App\Store',"store_id","id");

    }

    public function order(){
        return $this->hasMany(Order::class);
    }





//    public function storeData(){
//        return DB::table("stores")->where("id","=",$this->store_id);
//    }
}
