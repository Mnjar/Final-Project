<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'subtotal',
    ];

    public function invoice()
    {
        return $this->belongsTo(Buyer::class);
    }

    use HasFactory;
}
