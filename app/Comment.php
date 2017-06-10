<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'product_id', 'comment', 'response', 'response_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $dates = ['created_at', 'updated_at', 'response_at'];
}
