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
                margin: 0
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
            table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            }
            th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            }
            th {
            background-color: #f2f2f2;
            font-weight: bold;
            }
            tbody tr:hover {
            background-color: #f5f5f5;
            }

            tfoot tr:first-child {
            font-weight: bold;
            }
            tfoot td {
            border-top: 1px solid #ddd;
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
                            <label for="nomor_invoice">Nomor Invoice: <span><?php echo $nomorInvoice; ?><span></label>
                            <br><br>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Category</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{$invoice->nama_barang}}</td>
                                            <td>{{$invoice->category->category_name}}</td>
                                            <td>{{$invoice->price}}</td>
                                            <td>{{$invoice->price}}</td>
                                            <td>2</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @foreach($invoices as $invoice)
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>{{$invoice->total_amount}}</td>
                                    </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                            {{-- <label for="Category" class="form-label">Kategori Barang:</label>
                            <input type="text" id="category" name="category" readonly>
                            @foreach ($barangs as $barang)
                                {{ $barang->category->category_name}}
                            @endforeach --}}
                            
                            <br>

                            <label for="alamat_pengiriman">Alamat Pengiriman:</label>
                            <textarea id="alamat_pengiriman" name="alamat_pengiriman" required minlength="10" maxlength="100"></textarea>
                            <br>

                            <label for="kode_pos">Kode Pos:</label>
                            <input type="text" id="kode_pos" name="kode_pos" pattern="[0-9]{5}" required>
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