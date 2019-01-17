<?php

namespace App;
use App\Meal as MealEloquent;
use App\Keyword as KeywordEloquent;
use Illuminate\Database\Eloquent\Model;

class MealKeyword extends Model
{
    public function meal(){
        return $this->belongsTo(MealEloquent::class);
    }
    public function keyword(){
        return $this->hasMany(KeywordEloquent::class);
    }
}
