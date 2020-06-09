<?php

namespace App\Http\Controllers\Customer;

use App\Category;
use App\Comment;
use App\Event;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index($id)
    {
        $comments = Comment::where('id_product', $id)->paginate(5);
        $user = Session::get('user');
        $product = Product::where('id', $id)->get();
        $idCategory = "";
        $cart = Session::get('cart');
        foreach ($product as $x) {
            $idCategory = $x['id_category'];
        }
        $category = Category::find($idCategory);

        return view('Customer.Product.show', [
            'product' => $product,
            'user' => $user,
            'category' => $category,
            'comments' => $comments,
            'id' => $id,
            'cart' => $cart
        ]);
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $events = Event::all();
        $category0 = Category::where('id_parent', 0)->get();
        $category1 = Category::where('id_parent', 1)->get();
        $category2 = Category::where('id_parent', 2)->get();
        $category3 = Category::where('id_parent', 3)->get();
        $user = Session::get('user');
        $cart = Session::get('cart');
        $products = Product::where('name', 'like', '%' . $request->key . '%')->get();

        return view('Customer.Product.search', [
            'products' => $products,
            'events' => $events,
            'user' => $user,
            'category0' => $category0,
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'key' => $key,
            'cart' => $cart
        ]);
    }
}


