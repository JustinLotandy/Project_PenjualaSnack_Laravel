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
        table-layout: fixed; /* Set table layout to fixed */
    }
    th, td {
        padding: 8px; /* Reduce padding to save space */
        text-align: left;
        border-bottom: 1px solid #ddd;
        word-wrap: break-word; /* Ensure text wraps within cells */
        font-size: 10px; /* Reduce font size for better fit */
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
    @media print {
        body {
            margin: 10px; /* Reduce margin for print layout */
        }
        table {
            font-size: 9px; /* Further reduce font size for PDF */
            border: 1px solid #000;
        }
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
