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
    <h2>Laporan Pengguna</h2>
    <table>
    <thead>
        <tr>
            <th>Kode Pengguna</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $pengguna)
            <tr>
                <td>{{ $pengguna->kode_pengguna }}</td>
                <td>{{ $pengguna->Username }}</td>
                <td>{{ $pengguna->password }}</td>
                <td>{{ $pengguna->Role }}</td>
                <td>{{ $pengguna->created_at }}</td>
                <td>{{ $pengguna->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>