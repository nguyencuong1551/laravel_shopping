<?php

namespace App\Http\Controllers\Customer;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index($id)
    {
        $category0 = Category::where('id_parent', 0)->get();
        $category1 = Category::where('id_parent', 1)->get();
        $category2 = Category::where('id_parent', 2)->get();
        $category3 = Category::where('id_parent', 3)->get();
        $user = Session::get('user');
        $cart = Session::get('cart');
        $products = Product::where('id_event', $id)->get();
        $event = Event::find($id);

        return view('Customer.Event.show', [
            'products' => $products,
            'event' => $event,
            'user' => $user,
            'category0' => $category0,
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'cart' => $cart
        ]);
    }
}


