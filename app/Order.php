<?php

namespace App;



class Order extends Model
{
    //
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class,"ordered_by","id");
    }
}
