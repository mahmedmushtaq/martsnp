<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
   // use SoftDeletes;

    //protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function seller(){
        return $this->hasOne(Seller::class);
    }

    public function  remainingSubscription(){
        $currentDate = Carbon::parse(Carbon::now());

        if($this->seller) {

            $serverDate = Carbon::parse(($this->seller->subscription));

            $diff = $serverDate->diffInDays($currentDate);

            $msgLinesArray = array(
                "Subscription Ended. Please update your subscription otherwise your products will hide",
                "Owner Name    : M Ahmed Mushtaq",
                "Owner Email   : ahmedmushtaq296@gmail.com",
                "Owner Contact : 03316062251"
            );

            $msgLinesArrayForOwner = array(
                "User Subscription Ended. Contact Him",
                "Name    : " . $this->name,
                "Email   : " . $this->email,
                "Contact : " . $this->phone
            );

            $owner = User::find(1);
            $remaining = $this->seller->end_limit - $diff;
            if ($remaining === 0) {
                return "Last Day";
            } else if ($remaining === 1) {
                return $remaining . " day remaining";
            } else if ($remaining === -1) {
                //    $owner->notify(new SubscriptionEndedNotification($this,$msgLinesArrayForOwner));
                //   $this->user->notify(new SubscriptionEndedNotification($owner,$msgLinesArray));

                return ($remaining * -1) . " day exceed";
            } else if ($remaining < -1) {
                //    $owner->notify(new SubscriptionEndedNotification($this,$msgLinesArrayForOwner));
                //   $this->user->notify(new SubscriptionEndedNotification($owner,$msgLinesArray));
                return ($remaining * -1) . " days exceed";

            } else {
                return $remaining . " days remaining";
            }
        }else{
            return "You are registered as buyer";
        }
    }
}
