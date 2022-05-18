<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface 
{
    public function getAllProducts() 
    {
        return Product::all();
    }

    public function getProductById($productId) 
    {
        return Product::findOrFail($productId);
    }

    public function deleteProduct($productId) 
    {
        Product::destroy($productId);
    }

    public function createProduct(array $productDetails) 
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails) 
    {
        return Product::whereId($productId)->update($newDetails);
    }

    public function getFulfilledProducts() 
    {
        return Product::where('is_fulfilled', true);
    }
}