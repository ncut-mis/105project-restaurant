<?php

namespace App;
use \App\Meal as MealEloquent;
use \App\Record as RecordEloquent;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function record(){
        return $this->belongsTo(RecordEloquent::class);
    }
    public function meal(){
        return $this->hasOne(MealEloquent::class);
    }
}
