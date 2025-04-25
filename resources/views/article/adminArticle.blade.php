<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <link rel="stylesheet" href="{{ ('css/app.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Admin Artikel</title>
  </head>
  <body>
    @extends('layouts.dashboardPart')
    
    @section('form')
    @section('kategori')
    <div class="d-flex justify-content-between">
      <h6 class="mb-2">
        Artikel
      </h6>
    </div>
    @endsection

    <h3 class="text-center mb-4">Data Artikel  <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
    <div class="container">
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
          <form action="/article/adminArticle" method="GET">
          <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </form>
        </div>
        <div class="col-auto">
          <a href="/article/tambahArticle" class="btn btn-success">Tambah Data</a>
        </div>
      </div>
        <div class="row">
          <div class="col-auto">
            <div class="table-responsive">
              <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="no">No</th>
                    <th scope="nama">Judul</th>
                    <th scope="isi">Penulis</th>
                    <th scope="isi">isi</th>
                    <th scope="foto">Foto</th>
                    <th scope="timestamps">Dibuat</th>
                    <th scope="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $article->judul }}</td>
                    <td>{{ $article->penulis }}</td>
                    <td>{!! $article->isi !!}</td>
                    <td>
                      <img src="{{ asset('fotoArtikel/'.$article->foto) }}" style="width: 80px" alt="">
                    </td>
                    <td>{{ $article->created_at}}</td>
                    <td>
                      <div class="d-flex">
                        <a href="/article/tampilData/{{$article->id}}" class="btn btn-info m-1">Edit</a>
                        <a href= "/article/deleteData/{{$article->id}}" class="btn btn-danger m-1">Hapus</a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $articles->links() }}
            </div>
        </div>
        </div>
    </div>

    @endsection
    
    
    <script src="{{ mix('js/app.js') }}"></script>

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