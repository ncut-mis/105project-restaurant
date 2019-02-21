<?php

namespace App;
use \App\Staff as StaffEloquent;
use \App\Post as PostEloquent;
use \App\Coupon as CouponEloquent;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use \App\Table as TableEloquent;
use \App\Customer as CustomerEloquent;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function staff(){
        return $this->hasMany(StaffEloquent::class);
    }
    public function post(){
        return $this->hasMany(PostEloquent::class);
    }
    public function coupon(){
        return $this->hasMany(CouponEloquent::class);
    }
    public function meal(){
        return $this->hasMany(MealEloquent::class);
    }
    public function order(){
        return $this->hasMany(OrderEloquent::class);
    }
    public function table(){
        return $this->hasMany(TableEloquent::class);
    }
    public function customer(){
        return $this->hasMany(CustomerEloquent::class);
    }
}
