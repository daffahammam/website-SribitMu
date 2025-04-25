<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Laporan Qurban</title>
  </head>
  <body>
    @include('partials.navbar')
    
    <div class="container mt-5 pt-5">
      <h1 class="text-center mb-2">Laporan Qurban <br> Pimpinan Ranting Muhammadiyah Sribit</h1>
      <h3 class="text-center">Tahun <?php echo date('Y'); ?></h3>
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
          <form action="/qurban/qurban" method="GET">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Data" aria-label="search" aria-describedby="button-addon2"> 
          </div>
          </form>
        </div>
        <div class="col-auto">
          <a href="/qurban/exportPdf" class="btn btn-warning">Download PDF</a>
        </div>
        <div class="row">
            <table class="table table-hover">
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
            <div class="d-flex justify-content-center">
              {{ $qurbans->links() }}
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