<?php

namespace App\Http\Controllers;
use App\Http\Requests\BarangRequest;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function getCreatePage()
    {
        return view('create');
    }

    public function createBarang(BarangRequest $request)
    {
        Barang::create([
            'kategori_barang' => $request->kategori_barang,
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'foto_barang' => $request->foto_barang,
        ]);

        return redirect(route('getBarang'));
    }

    public function getBarang()
    {
        $barangs = Barang::all();

        return view ('view', ['barangs' => $barangs]);
    }

    public function getBarangById($id)
    {
        $barangs = Barang::find($id);

        return view('update', ['barangs' => $barangs]);
    }

    public function updateBarang(BarangRequest $request, $id)
    {
        $barangs = Barang::find($id);

        $barangs -> update([
            'kategori_barang' => $request->kategori_barang,
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'foto_barang' => $request->foto_barang,
        ]);

        return redirect(route('getBarang'));
    }

    public function deleteBarang($id)
    {
        Barang::destroy($id);

        return redirect(route('getBarang'));
    }
}
