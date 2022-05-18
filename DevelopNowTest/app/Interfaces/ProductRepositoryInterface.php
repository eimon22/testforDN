<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getAllProducts();
    public function getProductById($productId);
    public function deleteProduct($ProductId);
    public function createProduct(array $ProductDetails);
    public function updateProduct($ProductId, array $newDetails);
    public function getFulfilledProducts();
}