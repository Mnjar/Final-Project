{{-- resources/views/product/index.blade.php --}}
@extends('layouts.navigation')

@section('content')
<h1>Daftar Barang</h1>
<h1>Invoice</h1>
<p>Invoice Number: {{ $invoice->invoice_number }}</p>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoice->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity * $item->price }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="text-align: right;">Total:</td>
            <td>{{ $invoice->total }}</td>
        </tr>
    </tfoot>
</table>
@endsection