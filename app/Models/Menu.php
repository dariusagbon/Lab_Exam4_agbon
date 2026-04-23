<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    protected $fillable = [
        'Rice_name',
        'Price',
        'image',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
