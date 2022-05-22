<?php

namespace App;



use App\Notifications\SubscriptionEndedNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Store extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
   public function products(){
       return $this->hasMany(Product::class);
   }

   public function deleteStoreImage(){
       return File::delete($this->store_image);
   }

    public function order(){
        return $this->hasMany(Order::class);
    }
    public function user(){
       return $this->belongsTo(User::class);
    }

    public function seller(){
       return $this->user->seller;
    }

    public function  remainingSubscription(){
            $currentDate = Carbon::parse(Carbon::now());
            $serverDate = Carbon::parse(($this->seller()->subscription));

            $diff = $serverDate->diffInDays($currentDate);

            $msgLinesArray  =array(
                "Subscription Ended. Please update your subscription otherwise your products will hide",
                "Owner Name    : M Ahmed Mushtaq",
                "Owner Email   : ahmedmushtaq296@gmail.com",
                "Owner Contact : 03316062251"
            );

        $msgLinesArrayForOwner  =array(
            "User Subscription Ended. Contact Him",
            "Name    : ".$this->user->name,
            "Email   : ".$this->user->email,
            "Contact : ".$this->user->phone
        );

            $owner = User::find(1);
            $remaining = $this->seller()->end_limit - $diff ;
            if($remaining === 0){
                return "Last Day";
            }else if($remaining === 1){
                return $remaining. " day remaining";
            }else if($remaining === -1){
            //    $owner->notify(new SubscriptionEndedNotification($this,$msgLinesArrayForOwner));
             //   $this->user->notify(new SubscriptionEndedNotification($owner,$msgLinesArray));

               return ($remaining * -1). " day exceed";
            }else if($remaining < -1){
            //    $owner->notify(new SubscriptionEndedNotification($this,$msgLinesArrayForOwner));
             //   $this->user->notify(new SubscriptionEndedNotification($owner,$msgLinesArray));
                return ($remaining * -1). " days exceed";

            }else{
                return $remaining. " days remaining";
            }
    }
}
