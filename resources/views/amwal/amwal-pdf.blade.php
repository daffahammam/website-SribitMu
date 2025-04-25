<!DOCTYPE html>
<html>
<head>
<style>
#amwals {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

h1{
    text-align: center
}
h3{
    text-align: center
}

#amwals td, #amwals th {
  border: 1px solid #ddd;
  padding: 8px;
}

#amwals tr:nth-child(even){background-color: #f2f2f2;}

#amwals tr:hover {background-color: #ddd;}

#amwals th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ffffff;
  color: rgb(0, 0, 0);
}
</style>
</head>
<body>

<h3>Laporan Zakat Amwal<br> Pimpinan Ranting Muhammadiyah Sribit<br>Tahun <?php echo date('Y'); ?></h3>


<table id="amwals">
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
    @foreach($amwals as $amwal)
    <tr>
    <th scope="row">{{ ++$i }}</th>
    <td>{{ $amwal->tanggal }}</td>
    <td>{{ $amwal->nama }}</td>
    <td>{{ $amwal->alamat }}</td>
    <td>{{ $amwal->uang }}</td>
    <td>{{ $amwal->beras }} Kg</td>
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


