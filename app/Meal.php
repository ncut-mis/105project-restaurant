<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use \App\Detail as DetailEloquent;
use \App\MealKeyword as MealKeywordEloquent;
use \App\MealType as MealTypeEloquent;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'restaurant_id','name', 'photo', 'ingredients','price',
    ];
    public function detail(){
        return $this->belongsTo(DetailEloquent::class);
    }
    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function MealKeyword(){
        return $this->hasMany(MealKeywordEloquent::class);
    }
    public function MealType(){
        return $this->hasone(MealTypeEloquent::class);
    }
}
