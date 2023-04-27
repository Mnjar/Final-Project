<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;

class FakturController extends Controller
{
    public function addToCart(Request $request)
    {
        $barang = Barang::find($request->id);
        $cart = session()->get('cart');
    
        // jika cart kosong maka inisialisasi dengan data barang yang dipilih
        if(!$cart) {
            $cart = [
                $request->id => [
                    "nama_barang" => $barang->nama_barang,
                    "harga_barang" => $barang->harga_barang,
                    "jumlah_barang" => 1,
                    "image" => $barang->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
        }
    
        // jika cart sudah terisi, maka tambahkan data barang yang dipilih
        if(isset($cart[$request->id])) {
            $cart[$request->id]['jumlah_barang']++;
        } else {
            $cart[$request->id] = [
                "nama_barang" => $barang->nama_barang,
                "harga_barang" => $barang->harga_barang,
                "jumlah_barang" => 1,
                "image" => $barang->image
            ];
        }

        
        $lastInvoice = Buyer::orderBy('id')->first();
        $newInvoiceNumber = $lastInvoice ? $lastInvoice->id + 1 : 1;
        
        // Save invoice number to session
        session()->put('invoice_number', $newInvoiceNumber);
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }
}
