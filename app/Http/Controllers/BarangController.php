<?php

namespace App\Http\Controllers;
use App\Http\Requests\BarangRequest;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function getCreatePage()
    {
        $categories = Category::all();
        return view('create', ['categories'=>$categories]);
    }

    public function createBarang(BarangRequest $request)
    {
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->nama_barang .'.'.$extension;
        $request->file('image')->storeAs('public/image/', $fileName);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'image' => $fileName,
            'category_id' => $request->category_id,
        ]);
        return redirect(route('getBarang'));
    }

    public function getBarang()
    {
        $barangs = Barang::with('category')->get();
        $categories = Category::with('barang')->get();

        return view ('view', compact('barangs', 'categories'));
    }

    public function getBarangForUser()
    {
        $barangs = Barang::with('category')->get();
        $categories = Category::with('barang')->get();

        return view ('view', compact('barangs', 'categories'));
    }

    public function getBarangById($id)
    {
        $barangs = Barang::find($id);

        return view('update', ['barangs' => $barangs]);
    }

    public function updateBarang(BarangRequest $request, $id)
    {
        $barangs = Barang::find($id);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->nama_barang .'.'.$extension;
        $request->file('image')->storeAs('public/image/', $fileName);

        $barangs -> update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'image' => $fileName,
        ]);

        return redirect(route('getBarang'));
    }

    public function createCategory(Request $request)
    {
        $categories = Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect(route('getCreatePage'));
    }

    public function deleteBarang($id)
    {
        Barang::destroy($id);

        return redirect(route('getBarang'));
    }

    public function apiGetBarang()
    {
        $barangs = Barang::with('category')->get();
        $categories = Category::with('barang')->get();

        return $categories;
    }

    public function apiCreateCategory(Request $request)
    {
        $categories = Category::create([
            'category_name' => $request->category_name,
        ]);

        return 'Succes Create';
    }

    public function apiUpdateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $category -> update([
            'category_name' => $request->category_name,
        ]);

        return 'Succes Update';
    }

    public function apiDeleteCategory($id)
    {
        Category::destroy($id);

        return 'Succes Delete';
    }

}