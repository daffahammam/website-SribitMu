<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Laporan Keuangan</title>
  </head>
  <body>

    @extends('layouts.dashboardPart')
    
  @section('form')
  @section('kategori')
  <div class="d-flex justify-content-between">
    <h6 class="mb-2">
      Keuangan
    </h6>
  </div>
  @endsection

    <h3 class="text-center mb-4">Laporan Keuangan <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
    <div class="container">
      <div class="row g-3 align-items-center mt-2">
        <div class=" d-flex inline-block">
        <a href="/finance/tambahKeuangan" class="btn btn-success ms-2 ">Tambah</a>
            <a href="/finance/exportPdf" class="btn btn-warning  ms-2">Download</a>
        </div>
        <div class="col-auto d-flex inline-block  justify-content-between">
          <form action="{{ route('/finance/adminKeuangan') }}" method="GET">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </div>
          </form>
          <div class="searchDateAdmin ps-5 ">
          <form action="{{ route('finance.searchDateAdmin') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary  ms-2 " name="searchDateAdmin" type="submit">Cari</button>
            
        </form>
        </div>
        </div>
    </div>
      <div class="row">
        <div class="total d-flex inline-block justify-content-between">
          <h5 class="me-4"><strong> Total Uang Masuk : {{ $masukTotalRp }}</strong></h5>
          <h5 class="me-4"><strong> Total Uang Keluar : {{ $keluarTotalRp }}</strong></h5>
          <h5><strong> Saldo Akhir : {{ $saldoTotalRp }}</strong></h5>
      </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="no">No</th>
                    <th scope="keterangan">Keterangan</th>
                    <th scope="tanggal">Tanggal</th>
                    <th scope="masuk">Masuk</th>
                    <th scope="keluar">Keluar</th>
                    <th scope="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $finance->keterangan }}</td>
                    <td>{{ $finance->tanggal }}</td>
                    <td>Rp {{ number_format($finance->masuk) }}</td>
                    <td>Rp {{ number_format($finance->keluar) }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="/finance/tampilData/{{$finance->id}}" class="btn btn-info m-1">Edit</a>
                        <a href= "/finance/deleteData/{{$finance->id}}" class="btn btn-danger m-1">Hapus</a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $finances->links() }}
            </div>
        </div>
    </div>
    
    @endsection
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>