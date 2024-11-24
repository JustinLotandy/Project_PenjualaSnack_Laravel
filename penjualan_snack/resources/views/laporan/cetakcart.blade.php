<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Keranjang</title>
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
    <h2>Laporan Keranjang</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Cart</th>
                <th>Kode Pengguna</th>
                <th>Product ID</th>
                <th>QTY</th>
                <th>Deskripsi</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $cart)
                <tr>
                    <td>{{ $cart->kode_cart }}</td>
                    <td>{{ $cart->kode_pengguna }}</td>
                    <td>{{ $cart->Product_id }}</td>
                    <td>{{ $cart->QTY }}</td>
                    <td>{{ $cart->Desc }}</td>
                    <td>{{ $cart->created_at }}</td>
                    <td>{{ $cart->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
