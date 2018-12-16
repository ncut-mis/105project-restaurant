<?php

namespace App;
use \App\User as UserEloquent;
use \App\History as HistoryEloquent;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    public function user(){
        return $this->hasOne(UserEloquent::class);
    }
    public function history(){
        return $this->hasMany(HistoryEloquent::class);
    }
}
