<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../../assets/img/logoMuhBlue.png">
    <title>Edit Data artikel</title>
  </head>
  <body>
    @extends('layouts.editView')
    @section('editForm')
    
    
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                  <h3 class="text-center mt-4 mb-4">Edit Data Artikel</h3>
                    <div class="card-body">
                      <form action="/article/updateData/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="judul" class="form-label">Judul</label>
                          <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" value="{{ $article->judul }}">
                        </div>
                        <div class="mb-3">
                          <label for="penulis" class="form-label">Penulis</label>
                          <input type="text" name="penulis" class="form-control" id="penulis" aria-describedby="penulis" value="{{ $article->penulis }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="isi" class="form-label">Isi</label>
                          <input id="isi" type="hidden" name="isi">
                          <trix-editor input="isi" value="">{{ old('isi', $article->isi) }}</trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" value="{{ old('foto', asset('fotoArtikel/'.$article->foto)) }}" required>
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