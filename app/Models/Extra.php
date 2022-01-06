<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    public function row_orders()
    {
        return $this->hasMany(RowOrder::class);
    }

    public function row_order_extra()
    {
        return $this->hasMany(RowOrderExtra::class);
    }

    public function pizza_extras()
    {
        return $this->morphToMany(PizzaExtra::class);
    }
    
}
