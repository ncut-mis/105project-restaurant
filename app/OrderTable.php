<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Table as TableEloquent;
use \App\Order as OrderEloquent;

class OrderTable extends Model
{
    protected $fillable = [
        'order_id',
        'table_id'
    ];
    public function order(){
        return $this->belongsTo(OrderEloquent::class);
    }
    public function table(){
        return $this->hasOne(TableEloquent::class);
    }
}
