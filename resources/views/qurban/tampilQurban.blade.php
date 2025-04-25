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
    @extends('layouts.editView')
    @section('editForm')
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                  <h1 class="text-center mb-4 mt-4">Edit Data Qurban</h1>
                    <div class="card-body">
                      @if ($errors->any())
                      <div style="color: red;">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  
                  @if (session('success'))
                      <div style="color: green;">
                          {{ session('success') }}
                      </div>
                  @endif
                        <form action="/qurban/updateData/{{ $qurban->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal</label>
                              <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal"  value="{{ $qurban->tanggal }}">
                          </div>
                          <div class="mb-3">
                            <label for="tahun" class="form-label">tahun</label>
                            <input type="number" min="0" name="tahun" class="form-control" id="tahun" aria-describedby="tahun"  value="{{ $qurban->tahun }}">
                        </div>
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama</label>
                              <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama"  value="{{ $qurban->nama }}">
                          </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">Nama</label>
                              <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat"  value="{{ $qurban->alamat }}">
                          </div>
                            <label for="hewan" name="hewan" class="form-label mb-3" id="hewan">hewan</label>
                            <select class="form-select mb-3" aria-label="Default select example" name="hewan" id="hewan">
                                <option selected>{{ $qurban->hewan }}</option>
                                @foreach ($hewan as $hewan)
                                <option value="{{ $hewan }}" >{{ $hewan }}</option>
                                @endforeach
                              </select>
                          <div class="mb-3">
                            <label for="kelompok" class="form-label">Kelompok</label>
                            <input type="number" min="0" name="kelompok" class="form-control" id="kelompok" aria-describedby="kelompok"  value="{{ $qurban->kelompok }}">
                        </div>
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
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>