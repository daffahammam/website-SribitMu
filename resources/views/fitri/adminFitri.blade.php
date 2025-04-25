<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Laporan Zakat Fitri</title>
  </head>
  <body>

    @extends('layouts.dashboardPart')
    
  @section('form')
  @section('kategori')
  <div class="d-flex justify-content-between">
    <h6 class="mb-2">
      Zakat Fitri
    </h6>
  </div>
  @endsection

    <h3 class="text-center mb-4">Laporan Zakat Fitri <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
    <div class="container-fluid">
      <div class="row g-3 align-items-center mt-2">
          <div class="col-auto d-flex inline-block ms-2 me-2">
            <form action="{{ route('/fitri/adminFitri') }}" method="GET">
            <div class="input-group">
              <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
            </div>
            </form>
            <div class="searchDateAdmin ms-2 me-2">
            <form action="{{ route('fitri.searchDateAdmin') }}" method="GET">
              <a href="/fitri/tambahFitri" class="btn btn-success ms-2 ">Tambah</a>
              <a href="/fitri/exportPdf" class="btn btn-warning  ms-2 me-2">Download</a>
          </form>
          </div>
          </div>
      </div>
        <div class="row">
          <div class="total d-flex inline-block">
            <h5 class="me-4"><strong> Total Uang : {{ $totalUangRp }}</strong></h5>
            <h5><strong> Total Beras : {{ $totalBeras }} Kg</strong></h5>
        </div>
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
                    @foreach($fitris as $fitri)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $fitri->tanggal }}</td>
                    <td>{{ $fitri->nama }}</td>
                    <td>{{ $fitri->alamat }}</td>
                    <td>{{ $fitri->uang }}</td>
                    <td>{{ $fitri->beras }} Kg</td>
                    <td>
                      <div class="d-flex">
                        <a href="/fitri/tampilData/{{$fitri->id}}" class="btn btn-info m-1">Edit</a>
                        <a href= "/fitri/deleteData/{{$fitri->id}}" class="btn btn-danger m-1">Hapus</a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $fitris->links() }}
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