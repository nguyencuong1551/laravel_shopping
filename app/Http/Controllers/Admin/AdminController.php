<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function index()
    {
        $products = DB::table('products')->count();
        $categories = DB::table('categories')->count();
        $events = DB::table('events')->count();
        $bills = DB::table('bills')->count();

        return view('Admin.home', [
            'products' => $products,
            'categories' => $categories,
            'events' => $events,
            'bills' => $bills
        ]);
    }
}

