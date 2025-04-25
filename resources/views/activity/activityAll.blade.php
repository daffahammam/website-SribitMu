<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
  <link href="../assets/img/logoMuhBlue.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">
    
  </head>
  <body>
    @include('partials.navbar')
    {{-- @include('partials.backButton') --}}
     <!-- ======= activity Section ======= -->
     <section id="activity" class="activity">

        <div class="container mt-4" data-aos="fade-up">

        <header class="section-header">
            <h2>Kegiatan</h2>
            <p>Agenda Kegiatan Muhammadiyah Ranting Sribit</p>
        </header>

        <div class="row g-3 align-items-center mt2">
            <div class="col-auto">
              <form action="/activity/activityAll" method="GET">
              <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Kegiatan">
              </form>
            </div>

        <div class="row mt-4">
            @foreach ($activities as $activity)
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
                <img src="{{ asset('fotoKegiatan/'.$activity->foto) }}" style="width: 100%" class="img-fluid" alt="">
                <h3>{{ $activity->nama }}</h3>
                <p>{{ $activity->tanggal }}</p>
                <p>{{ $activity->tempat }}</p>
                <p>{{ $activity->detail }}</p>
            </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center mt-2">
            {{ $activities->links() }}
            </div>  
        </div>
    </section>

    @include('partials.footer')

  </div>
    <!-- End Activity Section -->

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
