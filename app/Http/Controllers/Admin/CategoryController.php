<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('Admin.Category.home', [
            'categories' => $categories
        ]);
    }

    public function create()
    {

        return view('Admin.Category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->id_parent = $request->get('id_parent');
        $mess = "";
        if ($category->save()) {
            $mess = "{{ __('SUCCESS!!!') }}";
        }

        return view('Admin.Category.create', [
            'mess' => $mess
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('Admin.Category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->id_parent = $request->get('id_parent');
        $mess = "";
        if ($category->save()) {
            $mess = "{{ __('SUCCESS!!!') }}";
        }

        return view('Admin.Category.edit', [
            'mess' => $mess,
            'category' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin/home/category')->with('mess', 'SUCCESS!!!');
    }
}

