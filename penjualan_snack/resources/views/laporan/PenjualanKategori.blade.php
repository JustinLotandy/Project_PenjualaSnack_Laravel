<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Berdasarkan Kategori</title>
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
        <h2>Laporan Penjualan Berdasarkan Kategori</h2>
        <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        <p>Laporan ini menampilkan jumlah produk dan total penjualan per kategori</p>
    </div>

    <!-- Detail Section (Main Table) -->
    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Jumlah Produk</th>
                <th>Total Penjualan (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotalPenjualan = 0;
            @endphp

            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->Nama_kategori }}</td>
                    <td>{{ $row->jumlah_produk }}</td>
                    <td>Rp {{ number_format($row->total_penjualan, 0, ',', '.') }}</td>
                </tr>

                @php
                    $grandTotalPenjualan += $row->total_penjualan;
                @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Report Footer -->
    <div class="footer">
        <p><strong>Total Keseluruhan Penjualan:</strong> Rp {{ number_format($grandTotalPenjualan, 0, ',', '.') }}</p>
        <p>Laporan ini dihasilkan secara otomatis oleh sistem pada tanggal cetak di atas.</p>
    </div>

</body>
</html>
