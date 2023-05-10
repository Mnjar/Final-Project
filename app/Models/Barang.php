<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Buyer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'harga_barang', 'jumlah_barang', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class, 'invoices_barang', 'barang_id', 'invoice_id');
    }


}
