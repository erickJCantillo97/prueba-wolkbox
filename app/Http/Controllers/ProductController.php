<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\ProductoRepositoryInterface;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $productoRepo;

    public function __construct(ProductoRepositoryInterface $productoRepo)
    {
        $this->productoRepo = $productoRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productoRepo->all();

        if (request()->expectsJson()) {
            return response()->json([
                'products' => $products,
                'status' => true,
            ], 200);
        }
        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Products/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->productoRepo->create($request->validated());
        if (!$request->expectsJson()) {
            return redirect()->route('products.index');
        }
        return response()->json([
            'product' => $product,
            'message' => 'Product created successfully',
            'status' => true,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/Form', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $this->productoRepo->update($product->id, $request->validated());
        if (!$request->expectsJson()) {
            return redirect()->route('products.index');
        }
        return response()->json([
            'product' => $product,
            'message' => 'Product updated successfully',
            'status' => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productoRepo->delete($product->id);
    }
}
