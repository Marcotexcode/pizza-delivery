<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'id',
        'pizzas',
        'name',
        'ingrediants',
        'price',
    ];

    public function row_orders()
    {
        return $this->hasMany(RowOrder::class);
    }

    public function extras()
    {   
        return $this->belongsToMany(Extra::class, 'pizza_extras', 'pizza_id', 'extra_id');
    }
}
