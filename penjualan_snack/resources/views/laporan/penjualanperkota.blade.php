<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Per Kota</title>
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
            background-color: #28a745;
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
            border-top: 2px solid #28a745;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h2>Laporan Penjualan Per Kota</h2>
    <p class="text-center">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

    @php
        $grandTotalPenjualan = 0; // Untuk menghitung total keseluruhan
        $grandJumlahPenjualan = 0;
    @endphp

    @foreach ($dataPerKota as $kota => $data)
        <h3>Kota: {{ $kota }}</h3>
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
                    $totalKota = 0; // Total untuk setiap kota
                    $jumlahPenjualanKota = 0;
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
                        $totalKota += $row->total;
                        $jumlahPenjualanKota += $row->QTY;
                    @endphp
                @endforeach

                <!-- Total untuk kota -->
                <tr>
                    <td colspan="3" class="text-center bold">Total untuk {{ $kota }}</td>
                    <td class="text-center bold">{{ $jumlahPenjualanKota }}</td>
                    <td></td>
                    <td class="text-right bold">Rp {{ number_format($totalKota, 0, ',', '.') }}</td>
                </tr>

                @php
                    $grandTotalPenjualan += $totalKota;
                    $grandJumlahPenjualan += $jumlahPenjualanKota;
                @endphp
            </tbody>
        </table>
    @endforeach

    <!-- Footer Grand Total -->
    <div class="footer">
        <p><strong>Total Penjualan Semua Kota:</strong> Rp {{ number_format($grandTotalPenjualan, 0, ',', '.') }}</p>
        <p><strong>Jumlah Penjualan Semua Kota:</strong> {{ $grandJumlahPenjualan }}</p>
    </div>

</body>
</html>