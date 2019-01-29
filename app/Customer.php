<?php

namespace App;
use \App\User as UserEloquent;
use \App\Order as OrderEloquent;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    public function user(){
        return $this->hasOne(UserEloquent::class);
    }
    public function order(){
        return $this->hasMany(OrderEloquent::class);
    }
}