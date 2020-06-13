<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Http\Controllers\Controller;
use App\Repository\Category\CategoryEloquentRepository;
use App\Repository\Event\EventEloquentRepository;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository; // khởi tạo 1 biến $
    protected $categoryRepository;
    protected $eventRepository;
    public function __construct(ProductRepositoryInterface $productRepository,EventEloquentRepository $eventRepository,CategoryEloquentRepository $categoryRepository) // inject ProductRepositoryInterface
    {
        $this->productRepository = $productRepository; // gán biến vừa khởi tạo là $ trung gian của ProductEloquentRepository
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getAll();

        return view('Admin.Product.home', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        $events = $this->eventRepository->getAll();

        return view('Admin.Product.create', [
            'categories' => $categories,
            'events' => $events
        ]);
    }

    public function store(Request $request)
    {
        $categories = $this->categoryRepository->getAll();
        $events = $this->eventRepository->getAll();
        $data = $request->all();
        $products = $this->productRepository->create($data);
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
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->getAll();
        $events = $this->eventRepository->getAll();

        return view('Admin.Product.edit', [
            'categories' => $categories,
            'events' => $events,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $categories = $this->categoryRepository->getAll();
        $events = $this->eventRepository->getAll();
        $data = $request->all();
        $product = $this->productRepository->update($data, $id);
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
        $this->productRepository->delete($id);

        return redirect('/admin/home/product')->with('mess', 'Success !!!');
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $products = $this->productRepository->search($key);

        return view('Admin.Product.search', [
            'products' => $products,
            'key' => $key
        ]);
    }
}

