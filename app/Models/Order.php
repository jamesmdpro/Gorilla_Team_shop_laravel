<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address', 'city', 'total'];


    public function items()
{
    return $this->hasMany(OrderItem::class);
}
}
