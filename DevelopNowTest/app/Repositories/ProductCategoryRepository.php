<?php

namespace App\Repositories;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface 
{
    public function getAllProductCategories() 
    {
        return ProductCategory::all();
    }

    public function getProductCategoryById($productCategoriesId) 
    {
        return ProductCategory::findOrFail($productCategoriesId);
    }

    public function deleteProductCategory($productCategoriesId) 
    {
        ProductCategory::destroy($productCategoriesId);
    }

    public function createProductCategory(array $productCategoriesDetails) 
    {
        return ProductCategory::create($productCategoriesDetails);
    }

    public function updateProductCategory($productCategoriesId, array $newDetails) 
    {
        return ProductCategory::whereId($productCategoriesId)->update($newDetails);
    }

    public function getFulfilledProductCategories() 
    {
        return ProductCategory::where('is_fulfilled', true);
    }
}