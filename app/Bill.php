<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsToMany('app\Product');
    }
}

