<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Produk Per Bulan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header, .footer { text-align: center; padding: 10px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; }
        .footer-summary { font-weight: bold; }
    </style>
</head>
<body>
    <!-- Report Header -->
    <div class="header">
        <h2>Laporan Penjualan Produk Per Bulan</h2>
        <p>Periode: Januari - Desember 2024</p>
    </div>

    <!-- Detail -->
    <table class="table">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Nama Produk</th>
                <th>Jumlah Transaksi</th>
                <th>Total Qty</th>
                <th>Total Penjualan (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalTransaksi = 0;
                $totalQty = 0;
                $totalPenjualan = 0;
            @endphp

            @foreach($data as $row)
                <tr>
                    <td>{{ $row->bulan }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>{{ $row->jumlah_transaksi }}</td>
                    <td>{{ $row->total_qty }}</td>
                    <td>{{ number_format($row->total_penjualan, 0, ',', '.') }}</td>
                </tr>

                @php
                    $totalTransaksi += $row->jumlah_transaksi;
                    $totalQty += $row->total_qty;
                    $totalPenjualan += $row->total_penjualan;
                @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Report Footer -->
    <div class="footer">
        <p class="footer-summary">Total Penjualan Tahun Ini: Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
        <p class="footer-summary">Total Transaksi Tahun Ini: {{ $totalTransaksi }} transaksi</p>
        <p class="footer-summary">Total Qty Terjual: {{ $totalQty }} unit</p>
    </div>
</body>
</html>
