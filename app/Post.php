<?php

namespace App;
use \App\Restaurant as RestaurantEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'restaurant_id',
        'pic',
        'title',
        'content',
        'DateTime',
    ];

    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
}
