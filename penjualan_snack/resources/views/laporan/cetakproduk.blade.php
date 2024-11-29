<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px; /* Reduce font size for better fit */
        }
        table {
            width: 100%; /* Ensure table takes up full width */
            border-collapse: collapse; /* Remove gaps between table borders */
        }
        th, td {
            padding: 4px; /* Reduce padding to save space */
            text-align: left;
            border: 1px solid #ddd; /* Add border for clear separation */
            word-wrap: break-word; /* Ensure long text wraps */
        }
        th {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
        }
        th:nth-child(odd) {
            background-color: #45a049; /* Slightly darker green for odd columns */
        }
        th:nth-child(even) {
            background-color: #4CAF50; /* Original green for even columns */
        }
    </style>
</head>
<body>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 7%;">Kode Produk</th>
                <th style="width: 7%;">User ID</th>
                <th style="width: 10%;">Kategori</th>
                <th style="width: 10%;">Isi</th>
                <th style="width: 8%;">Ukuran</th>
                <th style="width: 10%;">Expired</th>
                <th style="width: 7%;">Berat</th>
                <th style="width: 15%;">Deskripsi</th>
                <th style="width: 10%;">Nama Produk</th>
                <th style="width: 7%;">File</th>
                <th style="width: 8%;">Created At</th>
                <th style="width: 7%;">Created By</th>
                <th style="width: 7%;">Stok</th>
                <th style="width: 7%;">Harga</th>
            </tr>
        </thead>
        <tbody>
            @if($data->isEmpty())
                <tr>
                    <td colspan="14" style="text-align: center; color: #888;">Data belum tersedia</td>
                </tr>
            @else
                @foreach($data as $produk)
                    <tr>
                        <td>{{ $produk->kode_produk }}</td>
                        <td>{{ $produk->Userid }}</td>
                        <td>{{ $produk->Kategori }}</td>
                        <td>{{ $produk->Isi }}</td>
                        <td>{{ $produk->Ukuran }}</td>
                        <td>{{ $produk->Expired }}</td>
                        <td>{{ $produk->Berat }}</td>
                        <td>{{ $produk->Deskirpsi }}</td>
                        <td>{{ $produk->Nama_produk }}</td>
                        <td>{{ $produk->file }}</td>
                        <td>{{ $produk->Created_at }}</td>
                        <td>{{ $produk->Created_by }}</td>
                        <td>{{ $produk->Stok }}</td>
                        <td>{{ $produk->Harga }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
