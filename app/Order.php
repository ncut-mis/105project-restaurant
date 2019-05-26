<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\Restaurant as RestaurantEloquent;
use \App\Detail as DetailEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use \App\DiningTable as OrderTableEloquent;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'customer_id',
        'number',
        'StartTime',
        'EndTime',
        'total',
        'PayType'
    ];

    public function customer(){
        return $this->belongsTo(CustomerEloquent::class);
    }
    public function restaurant(){
        return $this->hasOne(RestaurantEloquent::class);
    }
    public function detail(){
        return $this->hasMany(DetailEloquent::class);
    }
    public function CouponsStatus(){
        return $this->hasone(CouponsStatusEloquent::class);
    }
    public function OrderTable(){
        return $this->hasmany(OrderTableEloquent::class);
    }
}
