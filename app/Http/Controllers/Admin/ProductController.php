<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('Admin.Product.home', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $events = Event::all();

        return view('Admin.Product.create', [
            'categories' => $categories,
            'events' => $events
        ]);
    }

    public function store(Request $request)
    {
        $categories = Category::all();
        $events = Event::all();
        $products = new Product();
        $products->name = $request->get('name');
        $products->image = $request->get('image');
        $products->image1 = $request->get('image1');
        $products->image2 = $request->get('image2');
        $products->image3 = $request->get('image3');
        $products->description = $request->get('description');
        $products->unit_price = $request->get('unit_price');
        $products->promotion_price = $request->get('promotion_price');
        $products->id_category = $request->get('id_category');
        $products->id_event = $request->get('id_event');
        $mess = "";
        if ($products->save()) {
            $mess = "{{ __('Success !!!') }}";
        }

        return view('Admin.Product.create', [
            'mess' => $mess,
            'categories' => $categories,
            'events' => $events
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $events = Event::all();

        return view('Admin.Product.edit', [
            'categories' => $categories,
            'events' => $events,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $categories = Category::all();
        $events = Event::all();
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->image = $request->get('image');
        $product->image1 = $request->get('image1');
        $product->image2 = $request->get('image2');
        $product->image3 = $request->get('image3');
        $product->description = $request->get('description');
        $product->unit_price = $request->get('unit_price');
        $product->promotion_price = $request->get('promotion_price');
        $product->id_category = $request->get('id_category');
        $product->id_event = $request->get('id_event');
        $mess = "";
        if ($product->save()) {
            $mess = "{{ __('Success !!!') }}";
        }

        return view('Admin.Product.edit', [
            'mess' => $mess,
            'categories' => $categories,
            'events' => $events,
            'product' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/home/product')->with('mess', 'Success !!!');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $products = Product::where('name', 'like', '%' . $request->key . '%')->get();

        return view('Admin.Product.search', [
            'products' => $products,
            'key' => $key
        ]);
    }
}

