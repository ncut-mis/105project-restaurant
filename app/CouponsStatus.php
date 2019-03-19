<?php

namespace App;
use \App\User as UserEloquent;
use \App\Order as OrderEloquent;
use \App\Coupon as CouponEloquent;
use Illuminate\Database\Eloquent\Model;

class CouponsStatus extends Model
{
    protected $table='couponsstatuses';
    protected $fillable=[
        'id',
        'coupon_id',
        'member_id',
        'order_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function coupon(){
        return $this->hasOne(CouponEloquent::class);
    }
}
