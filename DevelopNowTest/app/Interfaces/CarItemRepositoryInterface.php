<?php

namespace App\Interfaces;

interface CarItemRepositoryInterface 
{
    public function getAllCarItems();
    public function getCarItemById($carItemId);
    public function deleteCarItem($carItemId);
    public function createCarItem(array $carItemDetails);
    public function updateCarItem($carItemId, array $newDetails);
    public function getFulfilledCarItems();
}