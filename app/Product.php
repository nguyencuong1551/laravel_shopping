<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->hasMany('app\Comment', 'id_product');
    }

    public function bill()
    {
        return $this->belongsToMany('app\Bill');
    }

    public function category()
    {
        return $this->belongsTo('app\Category');
    }

    public function event()
    {
        return $this->belongsTo('app\Event');
    }
}

