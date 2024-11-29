<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Transaksi</title>
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
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 7%;">Kode Transaksi</th>
                <th style="width: 7%;">Kode DataBank</th>
                <th style="width: 7%;">Kode Cart</th>
                <th style="width: 10%;">Kode Customer</th>
                <th style="width: 10%;">Nama Customer</th>
                <th style="width: 10%;">Nama Produk</th>
                <th style="width: 7%;">Total Berat</th>
                <th style="width: 7%;">Phone</th>
                <th style="width: 8%;">No Resi</th>
                <th style="width: 8%;">Kurir</th>
                <th style="width: 7%;">Kota</th>
                <th style="width: 7%;">Ongkir</th>
                <th style="width: 7%;">Total</th>
                <th style="width: 10%;">Bukti Transaksi</th>
                <th style="width: 7%;">Tanggal</th>
                <th style="width: 10%;">Alamat</th>
                <th style="width: 7%;">QTY</th>
                <th style="width: 10%;">Status Approval</th>
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
