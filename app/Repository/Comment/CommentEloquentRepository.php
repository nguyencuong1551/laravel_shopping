<?php

namespace App\Repository\Comment;

use App\Comment;
use App\Repository\EloquentRepository;

class CommentEloquentRepository extends EloquentRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.

        return Comment::class;
    }
}


