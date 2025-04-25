<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/logoMuhBlue.png">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <title>
   Dashboard SribitMu
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body>
  
@extends('layouts.editView')
@section('editForm')
@php
$status = ['Sudah disetujui', 'Belum disetujui', 'Tidak disetujui']
@endphp
          <div class="row justify-content-center">
              <div class="col-8">
                  <div class="card">
                    <h3 class="text-center mt-4 mb-4">Edit Data <br> Jadwal MobilMu</h3>
                      <div class="card-body">
                          <form action="/car/updateData/{{ $car->id }}" method="POST">
                              @csrf
                              <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{ $car->nama }}">
                              </div>
                              <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" value="{{ $car->alamat }}">
                              </div>
                              <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" name="telp" class="form-control" id="telp" aria-describedby="telp" value="{{ $car->telp }}">
                              </div>
                              <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" value="{{ $car->keterangan }}">
                              </div>
                              <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="datetime-local" name="tanggal" class="form-control" id="tanggal" value="{{ $car->tanggal }}">
                              </div>
                              <div class="mb-3">
                                  <label for="sopir" class="form-label">Sopir</label>
                                  <input type="text" name="sopir" class="form-control" id="sopir" aria-describedby="sopir" value="{{ $car->sopir }}">
                              </div>
                              <label for="status" name="status" class="form-label" id="status">Status</label>
                              <select class="form-select" aria-label="Default select example" name="status" id="status"  value="{{ $car->status }}" required>
                                  <option selected>Pilih</option>
                                  @foreach ($status as $status)
                                  <option value="{{ $status }}" >{{ $status }}</option>
                                  @endforeach
                                </select>
                                <div class="button d-flex justify-content-between" inline-block>
                                  @include('partials.backButton')
                                  <button type="submit" class="btn btn-success mt-4 ">Simpan</button>
                                </div>
                            </form>
                      </div>
                    </div>
              </div>
          </div>
          @endsection
