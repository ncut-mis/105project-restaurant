<?php

namespace App;
use \App\User as UserEloquent;
use \App\Record as RecordEloquent;
use \App\Coupon as CouponEloquent;
use Illuminate\Database\Eloquent\Model;

class CouponsStatus extends Model
{
    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }
    public function record(){
        return $this->belongsTo(RecordEloquent::class);
    }
    public function coupon(){
        return $this->hasOne(CouponEloquent::class);
    }
}
