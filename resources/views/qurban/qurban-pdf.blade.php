<!DOCTYPE html>
<html>
<head>
<style>
  .page-break {
            page-break-after: always;
        }
#qurbans {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

h1{
    text-align: center;
}

h3{
  text-align: center;
}

#qurbans td, #qurbans th {
  border: 1px solid #ddd;
  padding: 8px;
}

#qurbans tr:nth-child(even){background-color: #f2f2f2;}

#qurbans tr:hover {background-color: #ddd;}

#qurbans th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #ffffff;
  color: rgb(0, 0, 0);
} 
</style>
</head>
<body>

  @php
  $data = compact('qurbans','qurbansByYear','i');
  @endphp

@foreach ($qurbansByYear as $tahun => $qurbans)
<h3>Laporan Qurban <br> Pimpinan Ranting Muhammadiyah Sribit <br>Tahun {{ $tahun }}</h3>

<table id="qurbans">
  <thead>
    <tr>
    <th scope="id">No</th>
    <th scope="nama">Nama</th>
    <th scope="alamat">Alamat</th>
    <th scope="hewan">Hewan</th>
    <th scope="kelompok">Kelompok</th>
    </tr>
</thead>
<tbody>
    @foreach($qurbans as $qurban)
    <tr>
    <th scope="row">{{ ++$i }}</th>
    <td>{{ $qurban->nama }}</td>
    <td>{{ $qurban->alamat }}</td>
    <td>{{ $qurban->hewan }}</td>
    <td>{{ $qurban->kelompok }}</td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="page-break"></div> <!-- Halaman baru untuk tahun berikutnya -->
@endforeach

</body>
</html>


