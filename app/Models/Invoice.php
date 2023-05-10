<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\category;
// use App\Models\User;

class Invoice extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'quantity',
        'address',
        'price',
        'postal_code',
        'total_amount',
    ];

    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'barangs_invoices', 'invoice_id', 'barang_id');
    }

    // public function category()
    // {
    //     return $this->belongsToMany(Category::class, 'category_name');
    // }
    // public function buyer()
    // {
    //     return $this->belongsTo(User::class);
    // }

    use HasFactory;
}
