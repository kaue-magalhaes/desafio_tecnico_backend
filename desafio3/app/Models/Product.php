<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
    ];
    protected $table = 'products';

    /*
    * Get the category that owns the product.
    */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
