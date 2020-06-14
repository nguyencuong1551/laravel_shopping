<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany(Product::class, 'id_event');
    }
}

