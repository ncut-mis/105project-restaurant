<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;



class Coupon extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
