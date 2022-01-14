<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaExtra extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'extra_id'
    ];

    // public function pizzas()
    // {
    //     return $this->belongsToMany(Pizza::class);
    // }

    // public function extras()
    // {
    //     return $this->belongsToMany(Extra::class);
    // }
    
}
