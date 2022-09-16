<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Node\Query\OrExpr;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'product_color_id', 'price', 'quantity'];


    public function order()
    {

        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products()
    {

        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productColors()
    {

        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }
}
