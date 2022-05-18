<?php

namespace App\Interfaces;

interface ProductCategoryRepositoryInterface 
{
    public function getAllProductCategories();
    public function getProductCategoryById($productCategoriesId);
    public function deleteProductCategory($ProductCategoriesId);
    public function createProductCategory(array $ProductCategoriesDetails);
    public function updateProductCategory($ProductCategoriesId, array $newDetails);
    public function getFulfilledProductCategories();
}