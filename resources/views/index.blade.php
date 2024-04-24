<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KONTIL</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nama </th>
            <th>Nama </th>
            <th>Nama </th>
            <th>Nama </th>
            <th>Nama </th>
            <th>Nama </th>
        </tr>
        @foreach ($customer as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->notelp }}</td>
            <td>{{ $p->password }}</td>
            <td>{{ $p->alamat }}</td>
            <td>
                <a href="/InputData/TambahCustomer/{{ $p->id }}">Edit Data</a><br/>
                <a href="/InputData/HapusCustomer/{{ $p->id }}">Hapus</a><br/>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>