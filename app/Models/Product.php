<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'description',
        'brief',
        'brand_id',
        'status',
        'trendy',
        'featured',
        'qty',
        'price',
        'selling_price',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
}

