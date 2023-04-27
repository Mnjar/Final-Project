<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    // relasi one to many
    public function barang()
    {
        return $this->hasMany(Barang::class, 'category_id', 'id');
    }

    use HasFactory;
}
