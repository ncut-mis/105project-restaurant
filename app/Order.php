<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\Restaurant as RestaurantEloquent;
use \App\Detail as DetailEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use \App\Table as TableEloquent;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
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
    public function CouponsStatus(){
        return $this->hasone(CouponsStatusEloquent::class);
    }
    public function table(){
        return $this->hasone(TableEloquent::class);
    }
}
