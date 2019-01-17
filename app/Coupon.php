<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use Illuminate\Database\Eloquent\Model;



class Coupon extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function CouponsStatus(){
        return $this->belongsTo(CouponsStatusEloquent::class);
    }
}
