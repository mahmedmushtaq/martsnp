<?php

namespace App;





use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function deleteImage(){
        foreach(explode(",",$this->images) as $image){
            if($image !== '')
             File::delete($image);
        }
        return true;

    }
    public function store(){
       // return $this->belongsToMany(Store::class);
      return  $this->belongsTo('App\Store',"store_id","id");

    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }





//    public function storeData(){
//        return DB::table("stores")->where("id","=",$this->store_id);
//    }
}
