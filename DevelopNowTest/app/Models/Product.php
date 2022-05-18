<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory;

    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'category_id', 'image'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function carItem(){
        return $this->hasMany(CarItem::class, 'id');
    }


}
