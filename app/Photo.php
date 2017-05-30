<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='phptos';

    public function product(){

        return $this->belongsTo('App\Product');

    }
}
