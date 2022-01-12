<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowOrderExtra extends Model
{
    use HasFactory;

    protected $fillable = [
        'row_order_id',
        'extra_id',
    ];

    public function row_order()
    {
        return $this->belongsTo(RowOrder::class);
    }

    public function extra()
    {
        return $this->belongsTo(Extra::class);
    }
}
