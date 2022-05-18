<?php

namespace App\Repositories;

use App\Interfaces\CarItemRepositoryInterface;
use App\Models\CarItem;

class carItemRepository implements carItemRepositoryInterface 
{
    public function getAllCarItems() 
    {
        return CarItem::all();
    }

    public function getCarItemById($carItemId) 
    {
        return CarItem::findOrFail($carItemId);
    }

    public function deleteCarItem($carItemId) 
    {
        CarItem::destroy($carItemId);
    }

    public function createCarItem(array $carItemDetails) 
    {
        return CarItem::create($carItemDetails);
    }

    public function updateCarItem($carItemId, array $newDetails) 
    {
        return CarItem::whereId($carItemId)->update($newDetails);
    }

    public function getFulfilledCarItems() 
    {
        return CarItem::where('is_fulfilled', true);
    }
}