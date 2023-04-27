<x-app-layout>
    <title>Faktur</title>
    <x-slot name="header">
        <style>
            button, [type='submit']{
            background-color: #3b87f8; 
            }
        </style>
        <div class="container col-md-6" style="padding-top: 20px">
            <div class="card shadow">
                <div class="card-header text-center">{{ __('FAKTUR') }} </div>
                    <div class="card-body">
                        <div class="col-md-6" style="">
                            {{-- <form action="" method="GET" class="input-group row">
                                <div class="input-group" style="">
                                    <input type="text" class="form-control" name="cari" placeholder="Search" value=""/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form> --}}
                        <br>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Nama Pembeli</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($buyers as $buyer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $buyer->invoice }}</td>
                                    <td>Rp. {{ $buyer->buyer_name }}</td>
                                    <td>{{ $buyer->alamat }}</td>
                                    <td>{{ $buyer->kode_pos}}</td>
                                    <td>{{ $buyer->total_harga}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</x-app-layout>