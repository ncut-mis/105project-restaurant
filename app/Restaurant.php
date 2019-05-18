<?php

namespace App;
use \App\Staff as StaffEloquent;
use \App\Post as PostEloquent;
use \App\Coupon as CouponEloquent;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use \App\Table as TableEloquent;
use \App\Customer as CustomerEloquent;
use \App\Member_restaurant as Member_restaurantsEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Model
{
    use Notifiable;
    protected $table = 'restaurants';
    protected $fillable = [
        'id',
        'name',
        'logo',
        'phone',
        'address',
        'opening_hours',
        'end_hours',
    ];

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
    public function member_restaurants(){
        return $this->hasMany(Member_restaurantsEloquent::class);
    }

}
