<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Tambah Data Mobil</title>
  </head>
  <body>
    @include('partials.navbar')
    {{-- @extends('layouts.dashboardPart')
    
  @section('form')
  @section('kategori')
  <div class="d-flex justify-content-between">
  <h6 class="mb-2">
    Mobil Layanan
  </h6>
  </div>
  @endsection --}}
  
    
    <div class="container mt-4 mb-4">
      >
        <div class="row justify-content-center">
          
            <div class="col-8">
                <div class="card mt-4 mb-4">
                    <div class="card-body mb-4">
                      <h1 class="text-center mb-4">Formulir Peminjaman MobilMu</h1>
                      <h6 style="color: red"">*Formulir peminjaman wajib diisi semua*</h6>
                        <form action="/car/inputData" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required>
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" required>
                            </div>
                            <div class="mb-3">
                              <label for="telp" class="form-label">Telepon (WA)</label>
                              <input type="number" min="0" name="telp" class="form-control" id="telp" placeholder="contoh: 6281234567890" aria-describedby="telp" required>
                            </div>
                            <div class="mb-3">
                              <label for="keterangan" class="form-label">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" required>
                            </div>
                            <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal Peminjaman</label>
                              <input type="datetime-local" name="tanggal" class="form-control" id="tanggal" required>
                            </div>
                            <div class="mb-3">
                              <label for="tahun" class="form-label">Tahun</label>
                              <input type="number" min="0" name="tahun" class="form-control" id="tahun" required>
                            </div>
                            <div class="mb-3">
                                <label for="sopir" class="form-label">Sopir</label>
                                <input type="text" name="sopir" class="form-control" id="sopir" placeholder="silahkan mencari sopir sendiri" aria-describedby="sopir" required>
                            </div>
                            <div class="button mt-3" >
                            <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div>
        </div>
        <div class="footer mb-4">
        @include('partials.footer')
      </div>
    </div>
    {{-- @endsection --}}
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>