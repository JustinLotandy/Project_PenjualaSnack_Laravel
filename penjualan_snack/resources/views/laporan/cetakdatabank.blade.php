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
    <h2>Laporan Data Bank</h2>
    <table>
    <thead>
        <tr>
            <th>Kode Databank</th>
            <th>Nomor Rekening</th>
            <th>Nama Databank</th>
            <th>Bukti Transaksi</th>
            <th>Created At</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $databank)
            <tr>
                <td>{{ $databank->kode_databank }}</td>
                <td>{{ $databank->norek }}</td>
                <td>{{ $databank->nama_databank }}</td>
                <td>{{ $databank->file }}</td>
                <td>{{ $databank->created_at }}</td>
                <td>{{ $databank->created_by }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>