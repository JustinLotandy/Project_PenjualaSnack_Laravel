<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Produk</title>
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
        overflow: hidden;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
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
 </style>
</head>
<body>
    <h2>Laporan Produk</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>User ID</th>
                <th>Kategori</th>
                <th>Isi</th>
                <th>Ukuran</th>
                <th>Expired</th>
                <th>Berat</th>
                <th>Deskripsi</th>
                <th>Nama Produk</th>
                <th>File</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</body>
</html>
