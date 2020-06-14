<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    protected $table = "bill_detail";
    public function bill()
    {
        return $this->belongsTo(Bill::class, 'id_bill');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

