<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['product_id', 'photo_name', 'photo_type'];

    public function product(){

        return $this->belongsTo('App\Product');

    }
}
