<x-app-layout>
    <title>Faktur</title>
    <x-slot name="header">
        <style>
            button, [type='submit']{
                background-color: #3b87f8; 
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover, [type='submit']:hover {
                background-color: #1f65c1;
            }
            .invoice-number {
                font-weight: bold;
                font-size: 1.2em;
                margin-bottom: 20px;
            }
            label {
                font-weight: bold;
                display: inline-block;
                margin-bottom: 5px;
            }
            input[type="text"], input[type="number"], textarea, select {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                width: 100%;
                margin-bottom: 10px;
                font-size: 1em;
            }
            input[type="text"]:focus, input[type="number"]:focus, textarea:focus, select:focus {
                outline: none;
                border: 1px solid #3b87f8;
            }
        </style>
        <div class="container col-md-6" style="padding-top: 20px">
            <div class="card shadow">
                <div class="card-header text-center">{{ __('FAKTUR') }} </div>
                    <div class="card-body">
                        <div class="col-md-6" style="">
                        <br>
                        <form action="/simpan_faktur" method="post">
                            <?php
                            // Mendefinisikan fungsi untuk menghasilkan nomor invoice
                                function generateNomorInvoice() {
                                $date = new DateTime();
                                $year = $date->format('Y');
                                $month = $date->format('m');
                                $day = $date->format('d');
                                $hours = $date->format('H');
                                $minutes = $date->format('i');
                                $seconds = $date->format('s');
                                $randomNum = rand(1000, 9999);
                                return $year.$month.$day.$hours.$minutes.$seconds.$randomNum;
                            }
                            // Mengisi nilai input nomor invoice dengan nomor invoice yang dihasilkan
                            $nomorInvoice = generateNomorInvoice();
                            ?>
                            <!-- Menampilkan input nomor invoice dengan nilai yang dihasilkan -->
                            <label for="nomor_invoice">Nomor Invoice:</label>
                            <input type="text" id="nomor_invoice" name="nomor_invoice" value="<?php echo $nomorInvoice; ?>" readonly>
                            <br>
                            {{-- <label for="kategori_barang">Kategori Barang:</label>
                            <select id="kategori_barang" name="kategori_barang">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                                <option value="elektronik">Elektronik</option>
                            </select> --}}
                            <label for="Category" class="form-label">Kategori Barang</label>
                            <div class="" style="">
                                @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" value="<?= $category['id'] ?>" name="category_id">
                                    <label class="form-check-label" for="inlineCheckbox1"><?= $category['category_name'] ?></label>
                                </div>
                                @endforeach
                            </div>
                            <br>

                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" id="nama_barang" name="nama_barang" value="">
                            <label for="kuantitas">Kuantitas:</label>
                            <input type="number" id="kuantitas" name="kuantitas" value="">
                            <br>

                            <label for="alamat_pengiriman">Alamat Pengiriman:</label>
                            <textarea id="alamat_pengiriman" name="alamat_pengiriman" required minlength="10" maxlength="100"></textarea>
                            <br>

                            <label for="kode_pos">Kode Pos:</label>
                            <input type="text" id="kode_pos" name="kode_pos" pattern="[0-9]{5}" required>
                            <br>

                            <label for="subtotal">Subtotal Harga:</label>
                            <input type="text" id="subtotal" name="subtotal" value="" readonly>
                            <br>

                            <label for="total">Total Harga:</label>
                            <input type="text" id="total" name="total" value="" readonly>
                            <br>

                            <button type="submit">Simpan Faktur</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</x-app-layout>