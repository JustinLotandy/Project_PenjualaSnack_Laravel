<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Per Bulan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h2 {
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
    </style>
</head>
<body>

    <h2>Laporan Penjualan Per Bulan</h2>
    <p class="text-center">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    <p class="text-center">Menampilkan data penjualan untuk bulan: 
        <strong>{{ $data->first() ? \Carbon\Carbon::parse($data->first()->tanggal_transaksi)->format('F Y') : '-' }}</strong>
    </p>

    <table>
        <thead>
            <tr>
                <th style="width: 10%;">Tanggal Transaksi</th>
                <th style="width: 15%;">Kode Transaksi</th>
                <th style="width: 10%;">Kode Produk</th>
                <th style="width: 20%;">Nama Produk</th>
                <th style="width: 10%;">Harga Satuan (Rp)</th>
                <th style="width: 10%;">QTY</th>
                <th style="width: 20%;">Total Harga (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotal = 0;
            @endphp

            @forelse ($data as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_transaksi)->format('d-m-Y') }}</td>
                    <td>{{ $row->kode_transaksi }}</td>
                    <td>{{ $row->kode_produk }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td class="text-right">Rp {{ number_format($row->harga_per_barang, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $row->QTY }}</td>
                    <td class="text-right">Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                </tr>
                @php
                    $grandTotal += $row->total;
                @endphp
            @empty
                <tr>
                    <td colspan="7" class="text-center" style="color: #555;">Tidak ada data penjualan yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="text-right bold" style="font-size: 14px; margin-top: 10px;">
        Total Penjualan Bulan Ini: Rp {{ number_format($grandTotal, 0, ',', '.') }}
    </p>

</body>
</html>
