<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = ['quantity', 'total_price'];
    /**
     * Get the user that owns the product.
     */
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    /**
     * The product that belong to the categories.
     */
    public function products()
    {

        return $this->belongsToMany(Product::class, 'orders_products', 'product_id', 'order_id');
    }
}