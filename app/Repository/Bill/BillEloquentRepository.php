<?php

namespace App\Repository\Bill;

use App\Bill;
use App\Bill_Detail;
use App\Repository\EloquentRepository;

class BillEloquentRepository extends EloquentRepository implements BillRepositoryInterface
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Bill::class;
    }

    public function detail($id)
    {
        // TODO: Implement detail() method.
        $result = Bill_Detail::where('id_bill', $id)->with('product')->get();

        return $result;
    }
}


