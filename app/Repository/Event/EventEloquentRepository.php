<?php

namespace App\Repository\Event;

use App\Event;
use App\Repository\EloquentRepository;

class EventEloquentRepository extends EloquentRepository
{
    public function getModel()
    {
        return Event::class;
    }
}


