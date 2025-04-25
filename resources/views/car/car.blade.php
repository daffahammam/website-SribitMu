<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Laporan Penggunaan Mobil Layanan</title>
  </head>
  <body>
    @include('partials.navbar')
    {{-- @include('partials.backButton') --}}
   
    <div class="container">
      
      <div class="row g-3 align-items-center mt-5">
        <h1 class="text-center mb-4 mt-5">Jadwal Penggunaan Mobil Layanan <br> Pimpinan Ranting Muhammadiyah Sribit</h1>
        {{-- <div class="row mt-4 col-lg-8 align-items-center">
          <div class="table-responsive ">
            <table class="table table-hover justify-content-center  align-items-center ">
                  <thead>
                      <tr>
                      <th scope="id">No</th>
                      <th scope="tanggal">Tanggal</th>
                      <th scope="informasi">Informasi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($carinfos as $carinfo)
                      <tr>
                      <th scope="row">{{ ++$i }}</th>
                      <td>{{ $carinfo->tanggal }}</td>
                      <td>{{ $carinfo->informasi }}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div> --}}

        <div class="col-auto d-flex inline-block">
          <form action="/car/car" method="GET">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Data" aria-label="search" aria-describedby="button-addon2">
          </div>
        </form>
        <div class="searchDate ms-4 me-4">
          <form action="{{ route('car.searchDate') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary " name="searchDate" type="submit">Cari</button>
            <a href="/car/peminjaman"> <button type="button" class="pinjam btn btn btn-success">Pinjam</button>
            <a href="/car/exportPdf" class="btn btn-warning">Download PDF</a>
        </form>
        </div>
      </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="id">No</th>
                    <th scope="nama">nama</th>
                    <th scope="alamat">alamat</th>
                    <th scope="keterangan">Keterangan</th>
                    <th scope="tanggal">Tanggal Peminjaman</th>
                    <th scope="sopir">Sopir</th>
                    <th scope="status">Status</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $cars->links() }}
            </div>
        </div>
    </div>
    @include('partials.footer')
    </div>
       
    

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