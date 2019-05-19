<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use \App\User as UserEloquent;
use Illuminate\Database\Eloquent\Model;

class Member_restaurant extends Model
{
    protected $tables = 'member_restaurants';
    protected $fillable = [
        'restaurant_id','member_id', 'status',
    ];
    public function member(){
        return $this->belongsTo( UserEloquent::class);
    }
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }

}
