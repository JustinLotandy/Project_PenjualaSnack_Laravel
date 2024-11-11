<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Berdasarkan Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header, .footer { text-align: center; }
        .table { width: 100%; border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid black; padding: 8px; }
        .table th { background-color: #f2f2f2; }
        .summary { font-weight: bold; }
    </style>
</head>
<body>

    {{-- Report Header --}}
    <div class="header">
        <h2>Laporan Penjualan Berdasarkan Kategori</h2>
        <p>Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>

    {{-- Detail Section --}}
    @foreach($data->groupBy('kategori') as $kategori => $produks)
        <h3>Kategori: {{ $kategori }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Total Penjualan</th>
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
                    <td colspan="2" style="text-align: right;">Total Penjualan {{ $kategori }}:</td>
                    <td>{{ number_format($totalPenjualanKategori, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach

    {{-- Report Footer --}}
    <div class="footer">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} Nama Perusahaan Anda</p>
    </div>

</body>
</html>
