<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Pengguna</title>
 <style>
 body { font-family: Arial, sans-serif; }
 table { width: 100%; border-collapse: collapse; }
 th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
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