<?php
namespace App\Repository\User;

use App\Repository\EloquentRepository;
use App\User;

class UserEloquentRepository extends EloquentRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return User::class;
    }
}
