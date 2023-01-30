<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    /**
     * The product that belong to the categories.
     */
    public function products()
    {

        return $this->belongsToMany(Product::class, 'products_categories', 'product_id', 'category_id');
    }

    /**
     * Get the user that owns the product.
     */
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}