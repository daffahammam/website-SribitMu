<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SribitMu - Muhammadiyah Sribit</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoMuhBlue.png" rel="icon">
  

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

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/LogoMuhBlue.png" alt="">
        <span>SribitMu</span>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto " href="#team">Pengurus</a></li>
          <li><a class="nav-link scrollto" href="#announcement">Pengumuman</a></li>
          <li><a class="nav-link scrollto" href="#activity">Kegiatan</a></li>
          <li><a class="nav-link scrollto" href="#mobilmu">MobilMu</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#recent-blog-posts">Artikel</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
          <li class="dropdown"><a href="#"><span>Laporan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/finance/finance">Keuangan</a></li>
              <li class="dropdown"><a href="#">Zakat <i class="bi bi-chevron-down"></i></a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a href="/fitri/fitri">Zakat Fitri</a></li>
                  <li><a href="/amwal/amwal">Zakat Amwal</a></li>
                </ul>
              <li><a href="/qurban/qurban">Qurban</a></li>
              <li><a href="/car/car">MobilMu</a></li>
            </ul>
          </li>
          
          <li><a class="getstarted scrollto" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up"> ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</h1>
          <h1 data-aos="fade-up"> Selamat datang di Website Muhammadiyah Ranting Sribit</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Muhammadiyah Unggul Berkemajuan</h2>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/logoMuhBlue.png"  width="400" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>TENTANG</h3>
              <h2>Muhammadiyah Ranting Sribit</h2>
              @foreach($organizations as $organization)
              <p>
                {{ $organization->desc }}
              </p>
              @endforeach
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/20240618_093616.jpg" class="img-fluid" alt="">
          </div>
        </div>
      </div> 
    </section><!-- End About Section -->

     <!-- ======= Team Section ======= --> 
     
     <section id="team" class="team">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>PENGURUS</h2>
          <p>Pimpinan Ranting Muhammadiyah Sribit</p>
        </header>
        <div class="row gy-4">
          @foreach ($committees as $committee)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('fotoPengurus/'.$committee->foto) }}"  style="width: 75%" class="img-fluid" alt="">
                <div class="social">
                  <a href=" https://wa.me/{{ $committee->telp }}"><i class="bi bi-whatsapp"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $committee->nama }}</h4>
                <span>{{ $committee->jabatan }}</span>
                <span>NBM : {{ $committee->nbm }}</span>
                <p>{{ $committee->alamat }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Ortom</h2>
          <p>Organisasi Otonom Muhammadiyah Sribit</p>
        </header>
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/aisyiyah.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/NA.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/pemudaMuh.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/TS.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/imm.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/ipm.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/kokam.jpg" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= Announcement Section ======= -->
    <section id="announcement" class="announcement">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Pengumuman</h2>
        </header>
        @php
            $i = 0;
        @endphp
        <div class="row">
          <div class="container-fluid d-flex justify-content-center align-items-center">
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="row auto">
                <table class="table table-hover align-items-center  align-items-center ">
                    <thead>
                        <tr>
                        <th scope="no">No</th>
                        <th scope="tanggal">Tanggal</th>
                        <th scope="pengumuman">Pengumuman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($announcements as $announcement)
                        <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $announcement->tanggal }}</td>
                        <td>{{ $announcement->pengumuman }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Announcement Section -->

    <!-- ======= activity Section ======= -->
    <section id="activity" class="activity">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Kegiatan</h2>
          <p>Agenda Kegiatan Muhammadiyah Ranting Sribit</p>
        </header>
        <div class="row">
          @foreach ($activities as $activity)
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="{{ asset('fotoKegiatan/'.$activity->foto) }}" style="width: 400px" class="img-fluid" alt="">
              <h3>{{ $activity->nama }}</h3>
              <p>{{ $activity->tanggal }}</p>
              <p>{{ $activity->tempat }}</p>
              <p>{{ $activity->detail }}</p>
            </div>
          </div>
          @endforeach
          <div class="d-flex justify-content-center mt-3">
            <a href="/activity/activityAll" class = "btn btn-primary" >Lihat Semua</a>
          </div>
    </section>
    <!-- End Values Section -->


    <!-- ======= MobilMu Section ======= -->
    <section id="mobilmu" class="mobilmu">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>MobilMu</h2>
          <p>Mobil Layanan Muhammadiyah</p>
        </header>
        <div class="row gy-4" data-aos="fade-left">
          <div class="info">
            <h3>Cara Peminjaman MobilMu</h3>
            <ol type="1">
              <li>Mobil layanan dapat digunakan masyarakat umum terkhusus warga Muhammadiyah Sribit</li>
              <li>Melihat Jadwal MobilMu</li>
              <li>Mengisi Formulir Peminjaman</li>
              <li>Menunggu status untuk disetujui</li>
              <li>Apabila sudah disetujui akan dihubungi pengurus melalui WA untuk pengambilan Kunci mobil</li>
              <li>Apabila keadaan <strong>DARURAT</strong> dapat langsung menghubungi pengurus</li>
            </ol>
            <a href="/car/car"> <button type="button" class="btn btn-primary">Jadwal</button>
            <a href="/car/peminjaman"> <button type="button" class="btn btn-primary">Pinjam</button>
            <a href="https://wa.me/6289628916505"> <button type="button" class="btn btn-primary">Kontak</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </section>
    <!-- End MobilMu Section -->



    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Galeri</h2>
          <p>Kegiatan Muhammadiyah Sribit</p>
        </header>

        {{-- <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="gallery-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> --}}

        <div class="row gy-4 gallery-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($galleries as $gallery)
          <div class="col-lg-4 col-md-6 portfolio-item ">
            <div class="gallery-wrap">
              <img src="{{ asset('fotoGaleri/'.$gallery->foto) }}" class="img-fluid">
              <div class="gallery-info">
                <h4>{{ $gallery->judul }}</h4>
                <div class="gallery-links">
                  <a href="{{ asset('fotoGaleri/'.$gallery->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class=" bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <div class="d-flex justify-content-center mt-3">
            <a href="/gallery/galleryAll" class = "btn btn-primary" >Lihat Semua</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End gallery Section -->

    

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>Artikel</h2>
          <p>Artikel Dakwah Terbaru</p>
        </header>
        <div class="row">
          @foreach ($articles as $article)
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{ asset('fotoArtikel/'.$article->foto) }}" class="img-fluid" alt=""></div>
              <span class="post-date">{{ $article->created_at->diffForHumans() }}</span>
              <h3 class="post-title">{{ $article->judul }}</h3>
              <h3 class="post-title">{{ $article->penulis }}</h3>
              <a  href="/article/articleSingle/{{$article->id}}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          @endforeach
          <div class="d-flex justify-content-center mt-3">
            <a href="/article/articleAll" class = "btn btn-primary" >Lihat Semua</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Recent Blog Posts Section -->

    {{-- <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="row gy-4">
              <div class="col-md-4">
                <div class="info-box ">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>A108 Adam Street,<br>New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Telepon</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
            </div>

          </div>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section --> --}}

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="#about" class="logo d-flex align-items-center">
              <img src="assets/img/logoMuhBlue.png" alt="Logo Muhammadiyah">
              <span>SribitMu</span>
            </a>
            @foreach($organizations as $organization)
            <p>{{ $organization->desc }}</p>
          </div>
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              <strong>Telepon:</strong> {{ $organization->telp }}<br>
              <strong>Email:</strong> {{ $organization->email }}<br>
            </p>
            <div class="social-links mt-3">
              <a href="{{ $organization->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="{{ $organization->youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="{{ $organization->gmaps }}" class="gmaps"><i class="bi bi-geo-alt-fill"></i></a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright 2024<strong><span> SribitMu</span></strong>
      </div>
      <div class="credits">
        Designed by <a href="https://instagram.com/daffahammam_">Daffa Hammam</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>