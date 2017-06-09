<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['user_id', 'product_id', 'amount'];

    protected $primaryKey = ['user_id', 'product_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public $incrementing = false;
}
