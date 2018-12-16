<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\Restaurant as RestaurantEloquent;
use \App\Detail as DetailEloquent;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function customer(){
        return $this->belongsTo(CustomerEloquent::class);
    }
    public function restaurant(){
        return $this->hasOne(RestaurantEloquent::class);
    }
    public function detail(){
        return $this->hasMany(DetailEloquent::class);
    }
}
