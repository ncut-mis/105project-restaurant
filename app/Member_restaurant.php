<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use \App\Member as MemberEloquent;
use Illuminate\Database\Eloquent\Model;

class Member_restaurant extends Model
{
    public function member(){
        return $this->belongsTo( MemberEloquent::class);
    }
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }

}
