<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function getCreateInvoice()
    {
        $categories = Category::all();
        return view('view', ['categories'=>$categories]);
    }

    public function createInvoice(Request $request, $id)
    {
        $barang = Barang::find($id);
        Invoice::create([
            // 'customer_name' => $request->costumer_name,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $barang->harga_barang,
            // 'postal_code' => $request->postal_code,
            'category_id' => $barang->category_id,
            'total_amount' => $barang->harga_barang * $request->total_amount,
        ]);
        // return redirect(route('viewBuyer'));
        // $barang = Barang::find($request->nama_barang);
        // $barang = Barang::findOrFail($id);
        // $barang = Barang::find($id);
        // $barang = Barang::find($id);

        // Invoice::create([
        //     'product_name' => $barang->id,
        //     'quantity' => $request->quantity,
        //     'price' => $barang->harga_barang,
        //     'category_id' => $barang->category_id,
        //     'total_amount' => $barang->harga_barang * $request->quantity,
        // ]);
        return redirect(route('viewBuyer'));
    }

    public function getInvoice()
    {
        $barangs = Barang::with('category')->get();
        $categories = Category::with('barang')->get();
        $invoices = Invoice::all();

        return view ('viewBuyer', compact('barangs', 'categories', 'invoices'));
    }
    
}
