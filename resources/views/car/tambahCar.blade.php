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

    @extends('layouts.editView')
    @section('editForm')

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                  <h3 class="text-center mb-4">Tambah Data Jadwal MobilMu</h3>
                    <div class="card-body">
                        <form action="/car/insertData" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat">
                            </div>
                            <div class="mb-3">
                              <label for="telp" class="form-label">Telepon</label>
                              <input type="number" name="telp" class="form-control" id="telp" aria-describedby="telp">
                            </div>
                            <div class="mb-3">
                              <label for="keterangan" class="form-label">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal</label>
                              <input type="datetime-local" name="tanggal" class="form-control" id="tanggal">
                            </div>
                            <div class="mb-3">
                                <label for="sopir" class="form-label">Sopir</label>
                                <input type="text" name="sopir" class="form-control" id="sopir" aria-describedby="sopir">
                            </div>
                            <label for="status" name="status" class="form-label" id="status">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status" id="status" required>
                                <option selected>Pilih</option>
                                @foreach ($status as $status)
                                <option value="{{ $status }}" >{{ $status }}</option>
                                @endforeach
                              </select>
                              <div class="button d-flex justify-content-between inline-block">
                                @include('partials.backButton')
                                <button type="submit" class="btn btn-success mt-4 ">Simpan</button>
                              </div>
                          </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    @endsection
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>