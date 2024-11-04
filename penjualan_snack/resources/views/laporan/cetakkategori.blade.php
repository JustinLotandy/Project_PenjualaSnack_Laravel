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
    <h2>Laporan Kategori</h2>
    <table>
    <thead>
        <tr>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>View Count</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $kategori)
            <tr>
                <td>{{ $kategori->kode_kategori }}</td>
                <td>{{ $kategori->Nama_kategori }}</td>
                <td>{{ $kategori->View_count }}</td>
                <td>{{ $kategori->created_at }}</td>
                <td>{{ $kategori->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>