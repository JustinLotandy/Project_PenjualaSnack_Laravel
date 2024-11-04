<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Kerajang</title>
 <style>
 body { font-family: Arial, sans-serif; }
 table { width: 100%; border-collapse: collapse; }
 th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
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