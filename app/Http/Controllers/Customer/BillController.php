<?php

namespace App\Http\Controllers\Customer;

use App\Bill;
use App\Bill_Detail;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        $user = Session::get('user');
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value['quantity'] * $value['unit_price'];
        }

        return view('Customer.Bill.index', [
            'user' => $user,
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart');
        $user = Session::get('user');
        $bill = new Bill();
        $bill->id_user = $user['id'];
        $bill->total = $request->get('total');
        $bill->note = $request->get('note');
        $bill->payment = $request->get('payment');
        $bill->save();

        $userBill = Bill::latest('id')->where('id_user', $user['id'])->first();
        foreach ($cart as $key => $value) {
            $billDetail = new Bill_Detail();
            $billDetail->id_product = $value['id'];
            $billDetail->nameSP = $value['name'];
            $billDetail->unit_price = $value['unit_price'];
            $billDetail->image = $value['image'];
            $billDetail->quantity = $value['quantity'];
            $billDetail->id_bill = $userBill['id'];
            $billDetail->save();
        }
        Session::forget('cart');
        return redirect('/')->with('mess', "{{ __('Đặt Hàng Thành Công') }}");
    }
}


