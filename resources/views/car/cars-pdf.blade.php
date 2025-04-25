<!DOCTYPE html>
<html>
<head>
<style>
#cars {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

h1{
    text-align: center
}

#cars td, #cars th {
  border: 1px solid #ddd;
  padding: 8px;
}

#cars tr:nth-child(even){background-color: #f2f2f2;}

#cars tr:hover {background-color: #ddd;}

#cars th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Laporan Penggunaan Mobil Layanan <br> Pimpinan Ranting Muhammadiyah Sribit</h1>

<table id="cars">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Keterangan</th>
    <th>Tanggal Peminjaman</th>
    <th>Sopir</th>
    <th>Status</th>
  </tr>
  <tr>
    @php
    $i=0;
  @endphp
    @foreach($cars as $car)
    <tr>
    <th scope="row">{{ ++$i }}</th>
    <td>{{ $car->nama }}</td>
    <td>{{ $car->alamat }}</td>
    <td>{{ $car->keterangan }}</td>
    <td>{{ $car->tanggal }}</td>
    <td>{{ $car->sopir }}</td>
    <td>{{ $car->status }}</td>
    </tr>
    @endforeach
  </tr>
</table>

</body>
</html>


