<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Pengguna</title>
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
