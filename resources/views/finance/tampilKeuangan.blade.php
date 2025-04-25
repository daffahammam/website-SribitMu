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
    @extends('layouts.editView')
        @section('editForm')
    
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                  <h3 class="text-center mt-2 mb-2">Edit Data Keuangan</h3>
                    <div class="card-body">
                        <form action="/finance/updateData/{{ $finance->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="keterangan" class="form-label">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" value="{{ $finance->keterangan }}">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal" class="form-label">Tanggal</label>
                              <input type="datetime-local" name="tanggal" class="form-control" id="tanggal" value="{{ $finance->tanggal }}">
                            </div>
                            <label for="bulan" name="bulan" class="form-label" id="bulan">Bulan</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>{{ $finance->bulan }}</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desemmber">Desember</option>
                              </select>
                              <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" class="form-control" id="tahun" aria-describedby="tahun" value="{{ $finance->tahun }}">
                              </div>
                            <div class="mb-3">
                                <label for="masuk" class="form-label">Masuk</label>
                                <input type="number" min="0" name="masuk" class="form-control" id="masuk" aria-describedby="masuk" value="{{ $finance->masuk }}">
                            </div>
                            <div class="mb-3">
                                <label for="keluar" class="form-label">Keluar</label>
                                <input type="number" min="0" name="keluar" class="form-control" id="keluar" aria-describedby="keluar" value="{{ $finance->keluar }}">
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