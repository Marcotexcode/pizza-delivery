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

    public function order_header()
    {
        return $this->belonsTo(OrderHeader::class);
    }

    public function extra()
    {
        return $this->belonsTo(Extra::class);
    }
}
