<x-app-layout>
    <title>View</title>
    <x-slot name="header">
    <style>
        button, [type='submit']{
            background-color: #3b87f8; 
        }
        .btn-primary {
            border-color: #3b87f8;
        }
        .btn-danger {
            border-color: #dc3545;
        }
        .btn-success {
            border-color: #198754;
        }
    </style>
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('DAFTAR BARANG') }} </div>
                <div class="card-body">
                    <div class="col-md-6" style="">
                        <form action="" method="GET" class="input-group row">
                            <div class="input-group" style="">
                                <input type="text" class="form-control" name="cari" placeholder="Search" value=""/>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    <br>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Category</th>
                                <th scope="col">Foto Barang</th>
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'admin')
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>Rp. {{ $barang->harga_barang }}</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                                <td>{{ $barang->category->category_name}}</td>
                                <td><img src="{{asset('storage/Image/'.$barang->image)}}" alt="{{$barang->nama_barang}}" style="height: 60px"></td>
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'admin')
                                    <td>
                                        <a href="{{route('getBarangById', ['id'=>$barang->id])}}"><button type="submit" class="btn btn-success col-md" style="background-color: #198754">Edit</button></a>
                                    </td>
                                    <td>
                                        <form action="{{route('deleteBarang', ['id' => $barang->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger col-md" style="background-color: #dc3545">Delete</button>
                                        </form>
                                    </td>
                                    @endif
                                    @if(Auth::user()->role == 'user')
                                        <td>
                                            <form action="{{route('invoice.add_item', ['id' => $barang->id])}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary col-md">Tambahkan ke Faktur</button>
                                            </form>
                                        </td>
                                        {{-- <form action="{{ route('invoice.add_item') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="invoice_number" value="{{ $invoice->invoice_number }}">
                                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit">Tambahkan ke Faktur</button>
                                        </form> --}}
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</x-app-layout>