<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
