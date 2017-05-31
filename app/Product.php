<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category', 'amount', 'description', 'user_id'];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
