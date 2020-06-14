<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_product');
    }

    public function bill_detail()
    {
        return $this->hasMany(Bill_Detail::class, 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function event()
    {
        return $this->belongsTo(Event::class,'id_event');
    }
}

