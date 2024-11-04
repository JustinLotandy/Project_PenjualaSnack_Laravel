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
    <h2>Laporan transaksi</h2>
    <table>
    <thead>
        <tr>
            <th>Kode Transaksi</th>
            <th>Kode Databank</th>
            <th>User ID</th>
            <th>Nama Produk</th>
            <th>Total Berat</th>
            <th>Phone</th>
            <th>No. Resi</th>
            <th>Kurir</th>
            <th>Kota</th>
            <th>Ongkir</th>
            <th>Total</th>
            <th>Bukti Transaksi</th>
            <th>Status</th>
            <th>Date</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $transaksi)
            <tr>
                <td>{{ $transaksi->kode_transaksi }}</td>
                <td>{{ $transaksi->kode_databank }}</td>
                <td>{{ $transaksi->userid }}</td>
                <td>{{ $transaksi->nama_produk }}</td>
                <td>{{ $transaksi->Total_berat }}</td>
                <td>{{ $transaksi->Phone }}</td>
                <td>{{ $transaksi->No_resi }}</td>
                <td>{{ $transaksi->Kurir }}</td>
                <td>{{ $transaksi->Kota }}</td>
                <td>{{ $transaksi->Ongkir }}</td>
                <td>{{ $transaksi->Total }}</td>
                <td>{{ $transaksi->Bukti_tansaksi }}</td>
                <td>{{ $transaksi->Status }}</td>
                <td>{{ $transaksi->Date }}</td>
                <td>{{ $transaksi->Adress }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>