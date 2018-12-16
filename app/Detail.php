<?php

namespace App;
use \App\Meal as MealEloquent;
use \App\History as HistoryEloquent;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function history(){
        return $this->belongsTo(HistoryEloquent::class);
    }
    public function meal(){
        return $this->hasOne(MealEloquent::class);
    }
}
