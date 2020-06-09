<?php

namespace App\Http\Controllers\Customer;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $products = Product::paginate(12);
        $category0 = Category::where('id_parent', 0)->get();
        $category1 = Category::where('id_parent', 1)->get();
        $category2 = Category::where('id_parent', 2)->get();
        $category3 = Category::where('id_parent', 3)->get();
        $user = Session::get('user');
        $cart = Session::get('cart');

        return view('welcome', [
            'user' => $user,
            'category0' => $category0,
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'products' => $products,
            'events' => $events,
            'cart' => $cart
        ]);
    }

    public function master()
    {
        $category0 = Category::where('id_parent', 0)->get();
        $category1 = Category::where('id_parent', 1)->get();
        $category2 = Category::where('id_parent', 2)->get();
        $category3 = Category::where('id_parent', 3)->get();
        $user = Session::get('user');
        $cart = Session::get('cart');

        return view('Customer.master', [
            'user' => $user,
            'category0' => $category0,
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'cart' => $cart
        ]);
    }
}

