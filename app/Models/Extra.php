<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'pizza_extras'
    ];
    
    public function row_orders()
    {
        return $this->hasMany(RowOrder::class);
    }

    public function row_order_extra()
    {
        return $this->hasMany(RowOrderExtra::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(Extra::class, 'pizza_extras', 'pizza_id', 'extra_id');
    }
    
}
