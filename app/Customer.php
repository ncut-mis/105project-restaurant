<?php

namespace App;
use \App\User as UserEloquent;
use \App\Order as OrderEloquent;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{

    protected $fillable = [
        'restaurant_id',
        'status',
        'verification_code'
    ];

    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }
    public function order(){
        return $this->hasMany(OrderEloquent::class);
    }
    public function Restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}