<?php

namespace App\Repositories;

use App\Interfaces\ProductoRepositoryInterface;
use App\Models\Product;

class ProductoRepository implements ProductoRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $Product = Product::findOrFail($id);
        $Product->update($data);
        return $Product;
    }

    public function delete($id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
    }
}
