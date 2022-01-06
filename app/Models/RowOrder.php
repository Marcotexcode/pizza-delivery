<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_header_id',
        'pizza_id',
        'extra_id',
        'quantity',
    ];

    public function order_header()
    {
        return $this->belonsTo(OrderHeader::class);
    }

    public function pizza()
    {
        return $this->belonsTo(Pizza::class);
    }

    public function extra()
    {
        return $this->belonsTo(Extra::class);
    }
}
