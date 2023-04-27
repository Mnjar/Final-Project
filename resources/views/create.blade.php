<x-app-layout>
    <title>Create</title>
    <x-slot name="header">
    <style>
        button, [type='button'], [type='reset'], [type='submit'] {
        background-image: none;
        }.btn-success {
        color: #fff;
        background-color: #198754;
        border-color: #198754;
        }
        .form-control {
            border: 1px solid black;
        }
    </style>
    <div class="container col-md-6" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('INPUT NEW ITEM') }} </div>
            <div class="card-body">
                <form action="{{ route('createBarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Barang">
                        @error('nama_barang')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga_barang" class="form-label">Harga Barang</label>
                        <input name="harga_barang" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Masukan Harga Barang">
                        @error('harga_barang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input name="jumlah_barang" type="numeric" class="form-control" id="formGroupExampleInput" placeholder="Masukan Jumlah Barang">
                        @error('jumlah_barang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Barang</label>
                        <input name="image" type="file" class="form-control" id="formGroupExampleInput" placeholder="Masukan Foto Barang" style="padding: .375rem 0.75rem">
                        @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Category" class="form-label">Kategori Barang</label>
                        <div class="" style="">
                            @foreach ($categories as $category)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="<?= $category['id'] ?>" name="category_id">
                                <label class="form-check-label" for="inlineCheckbox1"><?= $category['category_name'] ?></label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="">Insert</button>
                </form>
                <form action="{{ route('createCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Tambahkan Kategori Barang</label>
                        <input name="category_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Kategori Barang">
                    </div>
                    <button type="submit" class="btn btn-success">Insert</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</x-app-layout>