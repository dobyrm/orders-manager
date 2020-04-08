<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
    ];

    /**
     * Get the orders for the product.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
