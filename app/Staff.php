<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
