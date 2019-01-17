<?php

namespace App;
use \App\User as UserEloquent;
use \App\Record as RecordEloquent;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    public function user(){
        return $this->hasOne(UserEloquent::class);
    }
    public function record(){
        return $this->hasMany(RecordEloquent::class);
    }
}