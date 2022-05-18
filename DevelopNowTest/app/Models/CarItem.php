<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarItem extends Model
{
    use HasFactory;
    
    protected $table = 'car_items';
    
    protected $fillable = ['product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
