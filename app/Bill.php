<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = ['id'];

    public function bill_detail()
    {
        return $this->hasMany(Bill_Detail::class, 'id_bill');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

