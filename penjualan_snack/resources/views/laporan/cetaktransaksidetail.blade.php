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
    <h2>Lapotan transaksi detail</h2>
    <table>
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