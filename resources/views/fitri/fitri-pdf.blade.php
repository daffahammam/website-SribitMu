<!DOCTYPE html>
<html>
<head>
<style>
#fitris {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

h3{
    text-align: center
}

h4{
  text-align: center
}

#fitris td, #fitris th {
  border: 1px solid #0a0a0a;
  padding: 4px;
}

#fitris tr:nth-child(even){background-color: #f2f2f2;}

#fitris tr:hover {background-color: #ddd;}

#fitris th {
  padding-top: 4px;
  padding-bottom: 4px;
  text-align: center;
  background-color: #ffffff;
  color: rgb(0, 0, 0);
  width: auto;
}
</style>
</head>
<body>

  @php
  $i=0;
@endphp

<h3>Laporan Zakat Fitri<br> Pimpinan Ranting Muhammadiyah Sribit<br>Tahun <?php echo date('Y'); ?></h3>

<table id="fitris">
  <thead>
    <tr>
    <th scope="id">No</th>
    <th scope="tanggal">Tanggal</th>
    <th scope="nama">Nama</th>
    <th scope="alamat">Alamat</th>
    <th scope="uang">Uang (Rp)</th>
    <th scope="beras">Beras (Kg)</th>
    </tr>
</thead>
<tbody>
    @foreach($fitris as $fitri)
    <tr>
    <th scope="row">{{ ++$i }}</th>
    <td>{{ $fitri->tanggal }}</td>
    <td>{{ $fitri->nama }}</td>
    <td>{{ $fitri->alamat }}</td>
    <td>{{ $fitri->uang }}</td>
    <td>{{ $fitri->beras }} Kg</td>
    </tr>
    @endforeach
</tbody>
<tfoot>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>Total Uang</strong></td>
      <td><strong>{{ $totalUangRp }}</strong></td>
      <td></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>Total Beras</strong></td>
      <td></td>
      <td><strong>{{ $totalBeras }} Kg</strong></td>
  </tr>
</tfoot>
</table>

</body>
</html>


