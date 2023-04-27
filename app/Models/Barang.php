<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Buyer;
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

    public function buyers()
    {
        return $this->belonsToMany(Buyer::class, 'buyer_item', 'id_barang', 'buyer_id');
    }


}
