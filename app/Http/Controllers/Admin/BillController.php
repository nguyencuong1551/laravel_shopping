<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Bill_Detail;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();

        return view('Admin.Bill.home', [
            'bills' => $bills
        ]);
    }
    public function detail($id, $idUser)
    {
        $user = User::find($idUser);
        $billDetail = Bill_Detail::where('id_bill', $id)->get();
        $total = 0;
        foreach ($billDetail as $key)
        {
            $total += $key['quantity']*$key['unit_price'];
        }

        return view('Admin.Bill.detail',[
            'user' => $user,
            'billDetail' => $billDetail,
            'total' => $total
        ]);
    }
}

