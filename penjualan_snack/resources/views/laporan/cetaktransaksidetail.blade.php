<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Transaksi Detail</title>
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
    <h2>Laporan Transaksi Detail</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Transaction Detail</th>
                <th>Kode Product</th>
                <th>Kode Transaksi</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $detail)
                <tr>
                    <td>{{ $detail->kode_transaction_detail }}</td>
                    <td>{{ $detail->kode_product }}</td>
                    <td>{{ $detail->kode_transaksi }}</td>
                    <td>{{ $detail->Qty }}</td>
                    <td>{{ $detail->Price }}</td>
                    <td>{{ $detail->created_at }}</td>
                    <td>{{ $detail->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
