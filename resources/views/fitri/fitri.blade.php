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
    <div class="navbar">
    @include('partials.navbar')
    </div>
    <div class="container text-center mt-4 pt-4">
      <h1 class="text-center mt-5">Laporan Zakat Fitri <br> Pimpinan Ranting Muhammadiyah Sribit</h1>
      <h3>Tahun <?php echo date('Y'); ?></h3>
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto d-flex inline-block">
          <form action="{{ route('fitri.index') }}" method="GET">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </div>
          </form>
          <div class="searchDate ms-4 me-4">
          <form action="{{ route('fitri.searchDate') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary " name="searchDate" type="submit">Cari</button>
        </form>
        </div>
        </div>
        <div class="col-auto">
          <a href="/fitri/exportPdf" target="_blank" class="btn btn-warning">Download PDF</a>
        </div>
        <div class="row">
          <div class="row">
            <div class="total d-flex inline-block mt-4">
            <h5 class="me-4"><strong> Total Uang : {{ $totalUangRp }}</strong></h5>
            <h5><strong> Total Beras : {{ $totalBeras }} Kg</strong></h5>
           </div>
           <div class="row">
            <div class="table-responsive">
              <table class="table table-hover align-items-center  align-items-center ">
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
                    <td>Rp {{ $fitri->uang }}</td>
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
            <div class="d-flex justify-content-center">
              {{ $fitris->links() }}
            </div>
        </div>
    </div>
    </div>
    @include('partials.footer')
       
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>