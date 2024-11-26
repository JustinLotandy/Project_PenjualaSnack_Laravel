<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Transaksi</title>
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
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Kode DataBank</th>
                <th>Kode Cart</th>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Nama Produk</th>
                <th>Total Berat</th>
                <th>Phone</th>
                <th>No Resi</th>
                <th>Kurir</th>
                <th>Kota</th>
                <th>Ongkir</th>
                <th>Total</th>
                <th>Bukti Transaksi</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>QTY</th>
                <th>Status Approval</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $transaksi)
                <tr>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>{{ $transaksi->kode_databank }}</td>
                    <td>{{ $transaksi->kode_cart }}</td>
                    <td>{{ $transaksi->kode_customer }}</td>
                    <td>{{ $transaksi->nama_customer }}</td>
                    <td>{{ $transaksi->nama_produk }}</td>
                    <td>{{ $transaksi->Total_berat }}</td>
                    <td>{{ $transaksi->Phone }}</td>
                    <td>{{ $transaksi->No_resi }}</td>
                    <td>{{ $transaksi->Kurir }}</td>
                    <td>{{ $transaksi->Kota }}</td>
                    <td>{{ $transaksi->Ongkir }}</td>
                    <td>{{ $transaksi->Total }}</td>
                    <td>{{ $transaksi->Bukti_transaksi }}</td>
                    <td>{{ $transaksi->Date }}</td>
                    <td>{{ $transaksi->Adress }}</td>
                    <td>{{ $transaksi->QTY }}</td>
                    <td>{{ $transaksi->status_approval }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
