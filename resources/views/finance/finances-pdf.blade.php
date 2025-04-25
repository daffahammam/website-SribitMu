<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .page-break {
            page-break-after: always;
        }
#finances {
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



#finances td, #finances th {
  border: 1px solid #ddd;
  padding: 8px;
}

#finances tr:nth-child(even){background-color: #f2f2f2;}

#finances tr:hover {background-color: #ddd;}

#finances th {
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
$data = compact('finances','financesByYear','masukTahunan', 'keluarTotal','saldoTotal','currentDate','i','currentDate');
@endphp



@foreach ($financesByYear as $tahun => $finances)
<h3>Laporan Keuangan <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
        <h3>Tahun {{ $tahun }}</h3>

<h4>Updated : {{ $currentDate }}</h4>
<table id="finances">
  <thead>
    <tr>
    <th scope="id">No</th>
    <th scope="keterangan">Keterangan</th>
    <th scope="tanggal">Tanggal</th>
    <th scope="masuk">Masuk</th>
    <th scope="keluar">Keluar</th>
    </tr>
</thead>
<tbody>
    @foreach($finances as $finance)
    <tr>
    <th scope="row">{{ ++$i }}</th>
    <td>{{ $finance->keterangan }}</td>
    <td>{{ $finance->tanggal }}</td>
    <td class="text-end">Rp {{ number_format($finance->masuk) }}</td>
    <td class="text-end">Rp {{ number_format($finance->keluar) }}</td>
    </tr>
    @endforeach
</tbody>
<div class="page-break"></div> <!-- Halaman baru untuk tahun berikutnya -->
<tfoot>
  {{-- @foreach ($masukTahunan as $tahun => $totalMasuk) --}}
  {{-- @foreach ($jumlahperTahun as $tahun => $finances) --}}
  <tr>
      <td></td>
      <td></td>
      <td><strong>Total Masuk Tahun ({{ $tahun }})</strong></td>
      <td  class="text-end"><strong>Rp {{ number_format($masukTahunan) }}</strong></td>
      <td></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td><strong>Total Keluar Tahun ({{ $tahun }})</strong></td>
      <td></td>
      <td  class="text-end"><strong>Rp {{ number_format($keluarTahunan) }}</strong></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><strong>Total Saldo Tahun ({{ $tahun }})</strong></td>
    
    <td colspan="2" class="text-center align-middle"><strong>Rp {{number_format( $saldoTahunan) }}</strong></td>
</tr>
{{-- @endforeach --}}
</tfoot>

</table>
<div class="page-break"></div> <!-- Halaman baru untuk tahun berikutnya -->
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


