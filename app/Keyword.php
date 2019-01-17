<?php

namespace App;

use \App\MealKeyword as MealKeywordEloquent;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

    public function MealKeyword(){
        return $this->belongsTo(MealKeywordEloquent::class);
    }

}
