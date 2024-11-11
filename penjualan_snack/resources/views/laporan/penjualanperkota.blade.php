<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Berdasarkan Kota</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        .header, .footer { text-align: center; margin: 20px 0; }
        .footer { font-size: 0.9em; color: #555; }
    </style>
</head>
<body>

    <!-- Report Header -->
    <div class="header">
        <h2>Laporan Penjualan Berdasarkan Kota</h2>
        <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        <p>Menampilkan data penjualan produk per kota</p>
    </div>

    <!-- Detail Section (Main Table) -->
    <table>
        <thead>
            <tr>
                <th>Kota</th>
                <th>Nama Produk</th>
                <th>Jumlah Transaksi</th>
                <th>Total Qty</th>
                <th>Total Penjualan (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotalQty = 0;
                $grandTotalPenjualan = 0;
            @endphp

            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->Kota }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>{{ $row->jumlah_transaksi }}</td>
                    <td>{{ $row->total_qty }}</td>
                    <td>Rp {{ number_format($row->total_penjualan, 0, ',', '.') }}</td>
                </tr>

                @php
                    $grandTotalQty += $row->total_qty;
                    $grandTotalPenjualan += $row->total_penjualan;
                @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Report Footer -->
    <div class="footer">
        <p><strong>Total Keseluruhan Qty:</strong> {{ $grandTotalQty }}</p>
        <p><strong>Total Keseluruhan Penjualan:</strong> Rp {{ number_format($grandTotalPenjualan, 0, ',', '.') }}</p>
        <p>Laporan ini dihasilkan secara otomatis oleh sistem pada tanggal cetak di atas.</p>
    </div>

</body>
</html>
