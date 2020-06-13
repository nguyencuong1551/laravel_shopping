<?php

namespace App\Repository\Category;

use App\Category;
use App\Repository\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.

        return Category::class;
    }
}


