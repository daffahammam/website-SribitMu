<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Laporan Zakat Amwal</title>
  </head>
  <body>

    @extends('layouts.dashboardPart')
    
  @section('form')
  @section('kategori')
  <div class="d-flex justify-content-between">
    <h6 class="mb-2">
      Zakat Amwal
    </h6>
  </div>
  @endsection

    <h3 class="text-center mb-4">Laporan Zakat Amwal <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
    <div class="container">
      <div class="row g-3 align-items-center mt-2">
        <div class=" d-flex inline-block">
          <a href="/amwal/tambahAmwal" class="btn btn-success ms-2 ">Tambah</a>
          <a href="/amwal/exportPdf" class="btn btn-warning  ms-2 me-2">Download</a>
          </div>
        <div class="col-auto d-flex inline-block ms-2 me-2">
          <form action="{{ route('/amwal/adminAmwal') }}" method="GET">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </div>
          </form>
        <div class="searchDate ms-2 me-2">
          <form action="{{ route('amwal.searchDateAdmin') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary  ms-2 " name="searchDateAdmin" type="submit">Cari</button>
           
        </form>
        </div>
      </div>
        <div class="row">
          {{-- <div class="total d-flex inline-block">
            <h5 class="me-4">Total Uang : {{ $totalUangRp }}</h5>
            <h5>Total Beras : {{ $totalBeras }} Kg</h5>
           </div> --}}
            <div class="table-responsive">
              <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="no">No</th>
                    <th scope="tanggal">Tanggal</th>
                    <th scope="nama">Nama</th>
                    <th scope="alamat">Alamat</th>
                    <th scope="uang">Uang (Rp)</th>
                    <th scope="beras">Beras (Kg)</th>
                    <th scope="aksi">Aksi</th>
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
                    <td>{{ $amwal->beras }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="/amwal/tampilData/{{$amwal->id}}" class="btn btn-info m-1">Edit</a>
                        <a href= "/amwal/deleteData/{{$amwal->id}}" class="btn btn-danger m-1">Hapus</a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $amwals->links() }}
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