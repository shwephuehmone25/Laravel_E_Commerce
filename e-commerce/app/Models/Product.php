<?php

namespace App\Models;

use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Product extends Model implements Likeable
{
    use HasFactory, SoftDeletes, Likes, Rateable;

    public $fillable = ['user_id', 'name', 'description', 'price', 'image'];

    /**
     * Get the user that owns the product.
     */
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function categories()
    {

        return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
    }

    /**
     * Get the order that owns the product.
     */
    public function orders()
    {

        return $this->belongsToMany(Order::class, 'orders_products', 'product_id', 'order_id');
    }

    /**
     * Search posts by name.
     */
    public function scopeFilter($query, $search)
    {

        return $query->when($search ?? false, function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }

    public function rating()
    {

        return $this->hasMany(Rating::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}