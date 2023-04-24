<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('UPDATE ITEM') }} </div>
        <div class="card-body">
            <form action="{{route('updateBarang', ['id' => $barangs->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="kategori_barang" class="form-label">Kategori Barang</label>
                    <input name="kategori_barang" type="text" value="{{$barangs->kategori_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Masukan Kategori Barang">
                    @error('kategori_barang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input name="nama_barang" type="text" value="{{$barangs->nama_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Barang">
                    @error('nama_barang')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input name="harga_barang" type="numeric" value="{{$barangs->harga_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Masukan Harga Barang">
                    @error('harga_barang')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input name="jumlah_barang" type="numeric" value="{{$barangs->jumlah_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Masukan Jumlah Barang">
                    @error('jumlah_barang')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto_barang" class="form-label">Foto Barang</label>
                    <input name="foto_barang" type="file" value="{{$barangs->foto_barang}}" accept="image/*" class="form-control" id="foto_barang" placeholder="Masukan Foto Barang">
                    @error('foto_barang')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>