<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['slug', 'name', 'description'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
