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
    @include('partials.navbar')
    
    {{-- <div class="container text-center mt-4 pt-4">
      <h1 class="text-center mt-5">Laporan Keuangan <br> Pimpinan Ranting Muhammadiyah Sribit</h1>
      <h3>Tahun <?php echo date('Y'); ?></h3>
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto d-flex inline-block">
          <form action="{{ route('finance.index') }}" method="GET">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </div>
          </form>
          <div class="searchDate ms-4 me-4">
          <form action="{{ route('finance.searchDate') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary " name="searchDate" type="submit">Cari</button>
        </form>
        </div>
        </div>
        <div class="col-auto">
          <a href="/finance/exportPdf" target="_blank" class="btn btn-warning">Download PDF</a>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="id">No</th>
                    <th scope="keterangan">Keterangan</th>
                    <th scope="tanggal">Tanggal</th>
                    <th scope="tanggal">Bulan</th>
                    <th scope="masuk">Masuk</th>
                    <th scope="keluar">Keluar</th>
                    <th scope="saldo">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $finance->keterangan }}</td>
                    <td>{{ $finance->tanggal }}</td>
                    <td>{{ $finance->bulan }}</td>
                    <td>{{ $finance->masuk }}</td>
                    <td>{{ $finance->keluar }}</td>
                    <td>{{ $finance->saldo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $finances->links() }}
            </div>
        </div>
    </div> --}}

    <div class="container mt-5 pt-5">
      {{-- <h2 class="mb-4">Total Uang Masuk dan Keluar</h2>
      <form method="POST" action="{{ url('/finance/finance') }}">
          @csrf
          <div class="form-group">
              <label for="month">Pilih Bulan:</label>
              <select id="month" name="month" class="form-control">
                  @for($m=1; $m<=12; $m++)
                      <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                  @endfor
              </select>
          </div>
          <div class="form-group">
              <label for="year">Pilih Tahun:</label>
              <select id="year" name="year" class="form-control">
                  @for($y=2020; $y<=Carbon\Carbon::now()->year; $y++)
                      <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                  @endfor
              </select>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Lihat Total</button>
      </form> --}}
  
      
      <h1 class="text-center">Laporan Keuangan <br> Pimpinan Ranting Muhammadiyah Sribit<br>Tahun <?php echo date('Y'); ?></h1>
      
      <div class="card mt-4">
        <div class="card-header">
            {{-- <h4>Summary for {{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ $year }}</h4> --}}
            <h4> {{ $currentDate }} </h4>
            
        </div>
        <div class="card-body">
            <p><strong>Total Uang Masuk: {{  ($masukTotalRp) }}</strong>  </p>
            <p><strong>Total Uang Keluar:  {{ ($keluarTotalRp) }}</strong> </p>
            <p><strong>Total Saldo: {{ ($saldoTotalRp) }}</strong>  </p>
        </div>
    </div>
      <div class="row g-3 align-items-center mt-2">
        <div class="col-auto d-flex inline-block">
          <form action="{{ route('finance.index') }}" method="GET">
          <div class="input-group">
            <input type="search" name="search" id="search" class="form-control" aria-describedby="search" placeholder="Cari Data">
          </div>
          </form>
          <div class="searchDate ms-4 me-4">
          <form action="{{ route('finance.searchDate') }}" method="GET">
            <label for="start_date">tanggal Awal:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $start_date ?? '') }}">
            <label for="end_date">Tanggal Akhir:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $end_date ?? '') }}">
            <button  class="btn btn-primary " name="searchDate" type="submit">Cari</button>
        </form>
        </div>
        </div>
        <div class="col-auto">
          <a href="/finance/exportPdf" target="_blank" class="btn btn-warning">Download PDF</a>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-hover align-items-center  align-items-center ">
                <thead>
                    <tr>
                    <th scope="id">No</th>
                    <th scope="keterangan">Keterangan</th>
                    <th scope="tanggal">Tanggal</th>
                    <th scope="masuk">Masuk</th>
                    <th scope="keluar">Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                    <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $finance->keterangan }}</td>
                    <td>{{ $finance->tanggal }}</td>
                    <td>Rp {{ number_format($finance->masuk) }} </td>
                    <td>Rp {{ number_format($finance->keluar) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $finances->links() }}
            </div>
        </div>
  </div>
    @include('partials.footer')
    </div>
    

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