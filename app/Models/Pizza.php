<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'ingrediants',
        'price',
    ];

    public function row_orders()
    {
        return $this->hasMany(RowOrder::class);
    }

    public function pizza_extras()
    {
        return $this->morphToMany(PizzaExtra::class);
    }
}
