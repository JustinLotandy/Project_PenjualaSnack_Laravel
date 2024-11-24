<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Berdasarkan Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #fff;
        }
        .summary {
            font-weight: bold;
            text-align: right;
            background-color: #f2f2f2;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <!-- Report Header -->
    <div class="header">
        <h2>Laporan Penjualan Berdasarkan Kategori</h2>
        <p>Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>

    <!-- Detail Section -->
    @foreach($data->groupBy('kategori') as $kategori => $produks)
        <h3>Kategori: {{ $kategori }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Total Penjualan (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPenjualanKategori = 0;
                @endphp
                @foreach($produks as $produk)
                    <tr>
                        <td>{{ $produk->kode_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ number_format($produk->total_penjualan_kategori, 0, ',', '.') }}</td>
                    </tr>
                    @php
                        $totalPenjualanKategori += $produk->total_penjualan_kategori;
                    @endphp
                @endforeach
                <tr class="summary">
                    <td colspan="2">Total Penjualan {{ $kategori }}:</td>
                    <td>{{ number_format($totalPenjualanKategori, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach

    <!-- Report Footer -->
    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} Nama Perusahaan Anda</p>
    </div>

</body>
</html>
