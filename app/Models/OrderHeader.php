<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function row_orders()
    {
        return $this->hasMany(RowOrder::class);
    }
}
