<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Staff extends Authenticatable
{
    use Notifiable;
    protected $table = 'staff';
    protected $fillable = [
        'id',
        'restaurant_id',
        'name',
        'position',
        'phone',
        'address',
        'email',
        'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
