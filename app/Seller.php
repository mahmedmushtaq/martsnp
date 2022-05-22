<?php

namespace App;



class Seller extends Model
{
    //

    public function user(){
        return $this->belongsTo(User::class);
    }
}
