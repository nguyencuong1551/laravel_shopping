<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Repository\Category\CategoryEloquentRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected  $categoryRepository;
    public function __construct(CategoryEloquentRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $categories = $this->categoryRepository->getAll();

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
        $data = $request->all();
        $category = $this->categoryRepository->create($data);
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
        $category = $this->categoryRepository->find($id);

        return view('Admin.Category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = $this->categoryRepository->update($data, $id);
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
        $this->categoryRepository->delete($id);

        return redirect('/admin/home/category')->with('mess', 'SUCCESS!!!');
    }
}

