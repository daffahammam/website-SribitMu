<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../assets/img/logoMuhBlue.png">
    <title>Admin Aktivitas</title>
    <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  </head>
  

    @extends('layouts.dashboardPart')
    
  @section('form')
  @section('kategori')
  <div class="row">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">AGENDA KEGIATAN</h6>
          </div>
  @endsection
    <div class="container-fluid ">
      <h3 class="text-center mb-4">Data Agenda Kegiatan <br> Pimpinan Ranting Muhammadiyah Sribit</h3>
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
          <form action="/activity/adminActivity" method="GET">
          <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </form>
        </div>
        <div class="col-auto">
          <a href="/activity/tambahActivity" class="btn btn-success">Tambah Data</a>
        </div>
      </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="no">No</th>
                    <th scope="nama">Nama</th>
                    <th scope="foto">Foto</th>
                    <th scope="tanggal">Tanggal</th>
                    <th scope="tempat">Tempat</th>
                    <th scope="detail">Detail</th>
                    <th scope="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $activity->nama }}</td>
                    <td>
                      <img src="{{ asset('fotoKegiatan/'.$activity->foto) }}" style="width: 80px" alt="foto">
                    </td>
                    <td>{{ $activity->tanggal }}</td>
                    <td>{{ $activity->tempat }}</td>
                    <td>{{ $activity->detail }}</td>
                    <td>
                      <div class="d-flex">
                        <a href="/activity/tampilData/{{$activity->id}}" class="btn btn-info m-1">Edit</a>
                        <a href= "/activity/deleteData/{{$activity->id}}" class="btn btn-danger m-1">Hapus</a>
                      </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $activities->links() }}
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
    </div>
  </div>
  
</html>