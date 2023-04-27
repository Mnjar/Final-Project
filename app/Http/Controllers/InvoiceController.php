<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
class InvoiceController extends Controller
{
    public function addItem(Request $request)
    {
        $invoice = InvoiceDetail::where('invoice_number', $request->invoice_number)->first();

        if (!$invoice) {
            $invoice = new InvoiceDetail([
                'invoice_number' => $request->invoice_number,
                'customer_name' => $request->customer_name,
                'total_amount' => 0,
            ]);
    
            $invoice->save();
        }
    
        $invoiceDetail = new InvoiceDetail([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'subtotal' => $request->quantity * $request->price,
        ]);
    
        $invoice->details()->save($invoiceDetail);
    
        $invoice->total_amount += $invoiceDetail->subtotal;
        $invoice->save();
    
        return redirect()->route('invoice.show', ['invoice' => $invoice]);
    }
    
    public function show(InvoiceDetail $invoice)
    {
        return view('invoice.show', compact('invoice'));
    }
    
    }
