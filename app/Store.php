<?php

namespace App;



use Illuminate\Support\Facades\File;

class Store extends Model
{
    //
   public function products(){
       return $this->hasMany(Product::class);
   }

   public function deleteStoreImage(){
       return File::delete($this->store_image);
   }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
