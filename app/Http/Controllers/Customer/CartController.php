<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $user = Session::get('user');
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value['unit_price'] * $value['quantity'];
        }

        return view('Customer.Cart.index', [
            'cart' => $cart,
            'user' => $user,
            'total' => $total
        ]);
    }

    public function create(Request $request, $id)
    {
        $cart = array();
        $product = Product::find($id);
        $ssCart = Session::get('cart');
        if ($ssCart) {
            foreach ($ssCart as $item => $value) {
                if ($value['id'] == $id) {

                    return redirect('/')->with('warning', "{{ __('Đã có sản phẩm trong giỏ hàng') }}");
                }
            }
        }
        if ($request->session()->has('cart')) {
            $cart = array(
                'id' => $product->id,
                'name' => $product->name,
                'unit_price' => $product->unit_price,
                'image' => $product->image,
                'quantity' => 1
            );
            Session::push('cart', $cart);

            return redirect('/')->with('mess', "{{ __('Đã thêm sản phẩm vào giỏ hàng') }}");
        } else {
            $cart[] = array(
                'id' => $product->id,
                'name' => $product->name,
                'unit_price' => $product->unit_price,
                'image' => $product->image,
                'quantity' => 1
            );
            Session::put('cart', $cart);

            return redirect('/')->with('mess', "{{ __('Đã thêm sản phẩm vào giỏ hàng') }}");
        }
    }

    public function destroy($key)
    {
        $cart = Session::get('cart');
        unset($cart[$key]);
        Session::forget('cart');
        Session::put('cart', $cart);

        return redirect('customer/cart/index')->with('mess', "{{ __('DELETE SUCCESS') }}");
    }

    public function update(Request $request)
    {
        $qty = $request->qty;
        $cart = Session::get('cart');
        foreach ($qty as $key => $value) {
            $cart[$key]['quantity'] = $value;
        }
        Session::forget('cart');
        Session::put('cart', $cart);

        return redirect('customer/cart/index')->with('mess', "{{ __('UPDATE SUCCESS') }}");
    }
}


