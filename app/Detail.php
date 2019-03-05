<?php

namespace App;
use \App\Meal as MealEloquent;
use \App\Order as OrderEloquent;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'order_id','meal_id', 'quantity', 'status','EndTime',
    ];
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function meal(){
        return $this->hasOne(MealEloquent::class);
    }
}
