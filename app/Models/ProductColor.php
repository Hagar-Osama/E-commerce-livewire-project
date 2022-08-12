<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = ['product_id', 'color_id', 'color_qty'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
