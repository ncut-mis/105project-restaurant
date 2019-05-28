<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coupon extends Model
{
    use Notifiable;
    protected $table = 'coupons';
    protected $fillable = [
        'id',
        'restaurant_id',
        'photo',
        'title',
        'content',
        'discount',
        'lowestprice',
        'status',
        'StartTime',
        'EndTime',
    ];
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function CouponsStatus(){
        return $this->belongsTo(CouponsStatusEloquent::class);
    }
}
