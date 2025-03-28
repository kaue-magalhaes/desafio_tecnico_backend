<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug'
    ];
    protected $table = 'categories';

    /*
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
