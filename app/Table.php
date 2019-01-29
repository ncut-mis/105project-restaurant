<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\Order as OrderEloquent;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
}
