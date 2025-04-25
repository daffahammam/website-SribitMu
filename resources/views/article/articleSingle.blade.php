<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Article Muhammadiyah</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="../../assets/img/logoMuhBlue.png" rel="icon">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
<link href="{!! asset('../assets/css/style.css') !!}" rel="stylesheet">

<!-- Trix editor -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
======================================================== -->

<style>
    .article-header {
        margin-bottom: 30px;
        align-items: center;
    }
    .article-title {
        font-size: 2.5rem;
        margin-bottom: 5px;
    }
    .article-meta {
        font-size: 1rem;
        color: #6c757d;
    }
    .article-meta span {
        margin-right: 5px;
    }
    .article-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
    }
    .article-content {
        font-size: 1.2rem;
        line-height: 1.2;
        text-align: justify
    }

    .article-image{
        width: 50%
     }   
    
</style>
</head>
<body>
    @php
    $articles = $article
    @endphp
    
    <div class="position-relative">
        @include('partials.navbar')
    </div>


<div class="container d-flex justify-content-center align-items-center mb-5 mt-5 ">
    {{-- @include('partials.backButton') --}}
    <div class="row d-flex justify-content-center align-items-center mt-4">
        <div class="col-lg-12 col-md-12">
            <article class="article">
                <header class="article-header d-block justify-content-center align-items-center text-center mt-3">
                    <h1 class="article-title">{{ $article->judul }}</h1>
                    <div class="article-meta">
                        <h5>Penulis: {{ $article->penulis }}</h5>
                        <h5>Tanggal: {{ $article->created_at }}</h5>
                    </div>
                    <img src="{{ asset('fotoArtikel/'.$article->foto) }}" style="width: 250px"  alt="Foto Artikel"  class="article-image ">
                </header>
                
                <div class="article-content">
                    {!! $article->isi !!}
                </div>
            </article>
        </div>
    </div>
</div>

@include('partials.footer')
</body>
</html>