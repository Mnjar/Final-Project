<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_barang', 'nama_barang', 'harga_barang', 'jumlah_barang', 'foto_barang'];

}
