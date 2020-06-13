<?php

namespace App\Repository\Product;

use App\Product;
use App\Repository\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
    //ghi đè lên phương thức getModel trong EloquentRepository
    public function getModel()
    {
        return Product::class;
    }

    public function search($key)
    {
        $result = Product::where('name', 'like', '%' . $key . '%')->get();
        return $result;
    }
}


