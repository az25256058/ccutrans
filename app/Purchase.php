<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['user_id', 'product_id', 'amount'];

    protected $primaryKey = ['user_id', 'product_id'];

    public $incrementing = false;
}
