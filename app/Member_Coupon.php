<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member_Coupon extends Model
{
    protected $table='member_coupons';
    protected $fillable = [
        'coupon_id','order_id','member_id', 'UseTime', 'status'
    ];
}
