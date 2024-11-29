<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Per Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h2, h3 {
            text-align: center;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            table-layout: fixed;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
        }
        th {
            background-color: #28a745; /* Hijau */
            color: #fff;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .bold {
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #28a745; /* Hijau */
            text-align: right;
            font-size: 14px;
            
        }
    </style>
</head>
<body>

    <h2>Laporan Penjualan Per Kategori</h2>
    <p class="text-center">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

    @php
        $grandTotalPenjualan = 0; // Untuk menghitung total keseluruhan
        $grandJumlahPenjualan = 0;
    @endphp

    @foreach ($dataPerKategori as $kategori => $data)
        <h3>Kategori: {{ $kategori }}</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">Tanggal Transaksi</th>
                    <th style="width: 15%;">Kode Transaksi</th>
                    <th style="width: 20%;">Nama Produk</th>
                    <th style="width: 10%;">QTY</th>
                    <th style="width: 15%;">Harga Satuan (Rp)</th>
                    <th style="width: 20%;">Total Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalKategori = 0; // Total untuk setiap kategori
                    $jumlahPenjualanKategori = 0;
                @endphp

                @foreach ($data as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_transaksi)->format('d-m-Y') }}</td>
                        <td>{{ $row->kode_transaksi }}</td>
                        <td>{{ $row->nama_produk }}</td>
                        <td class="text-center">{{ $row->QTY }}</td>
                        <td class="text-right">Rp {{ number_format($row->harga_per_barang, 0, ',', '.') }}</td>
                        <td class="text-right">Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                    </tr>
                    @php
                        $totalKategori += $row->total;
                        $jumlahPenjualanKategori += $row->QTY;
                    @endphp
                @endforeach

                <!-- Total untuk kategori -->
                <tr>
                    <td colspan="3" class="text-center bold">Total untuk {{ $kategori }}</td>
                    <td class="text-center bold">{{ $jumlahPenjualanKategori }}</td>
                    <td></td>
                    <td class="text-right bold">Rp {{ number_format($totalKategori, 0, ',', '.') }}</td>
                </tr>

                @php
                    $grandTotalPenjualan += $totalKategori;
                    $grandJumlahPenjualan += $jumlahPenjualanKategori;
                @endphp
            </tbody>
        </table>
    @endforeach

    <!-- Footer Grand Total -->
    <div class="footer">
        <p><strong>Total Penjualan Semua Kategori:</strong> Rp {{ number_format($grandTotalPenjualan, 0, ',', '.') }}</p>
        <p><strong>Jumlah Penjualan Semua Kategori:</strong> {{ $grandJumlahPenjualan }}</p>
    </div>

</body>
</html>
