<?php

namespace App;
use \App\Customer as CustomerEloquent;
use \App\CouponsStatus as CouponsStatusEloquent;
use \App\Member_restaurant as Member_restaurantsEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;
    protected $table = 'members';
    protected $fillable = [
        'name', 'email', 'password','member_id','birthday','phone','address','verification_code','token'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    public function customer(){
        return $this->hasMany(CustomerEloquent::class);
    }
    public function CouponsStatus(){
        return $this->hasMany(CouponsStatusEloquent::class);
    }
    public function member_restaurants(){
        return $this->hasMany(Member_restaurantsEloquent::class);
    }
}

