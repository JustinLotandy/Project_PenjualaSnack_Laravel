<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keranjang</title>
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
    <h2>Laporan Keranjang</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Cart</th>
                <th>Kode Pengguna</th>
                <th>Nama Pengguna</th>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Phone</th>
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
                    <td>{{ $cart->nama_pengguna }}</td>
                    <td>{{ $cart->kode_customer }}</td>
                    <td>{{ $cart->nama_customer }}</td>
                    <td>{{ $cart->phone }}</td>
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
