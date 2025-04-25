<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;


class FinanceController extends Controller
{


    public function index(Request $request)
    {
        if($request->has('search')){
            $finances = Finance::where('keterangan', 'LIKE', '%' .$request->search.'%' )->orWhere('bulan', 'LIKE', '%' .$request->search.'%')->orWhere('tahun', 'LIKE', '%' .$request->search.'%')->OrderBy('tanggal', 'asc')->paginate(10);
        }else{
            $finances = Finance::orderBy('tanggal', 'asc')->paginate(10);
        }

        $pagination = 10;
        $organizations = Organization::all();
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);
        $currentMonth = Carbon::now()->month;
        $startDate = Carbon::createFromDate(null, $currentMonth, 1)->startOfMonth();
        $endDate = Carbon::createFromDate(null, $currentMonth, 1)->endOfMonth();
        $currentDate = Carbon::now()->format('d F Y');
        $i = 0;
        $masukTotal = Finance::sum('masuk');
        $keluarTotal = Finance::sum('keluar');
        $saldoTotal = $masukTotal - $keluarTotal;
        

        if (!function_exists('formatRupiahMasuk')) {
            function formatRupiahMasuk($masukTotal)
            {
                return 'Rp ' . number_format($masukTotal, 0, '.', '.');
            }
            
        $masukTotalRp = formatRupiahMasuk($masukTotal);
        }

        if (!function_exists('formatRupiahKeluar')) {
            function formatRupiahKeluar($keluarTotal)
            {
                return 'Rp ' . number_format($keluarTotal, 0, '.', '.');
            }
            
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        }

        if (!function_exists('formatRupiahSaldo')) {
            function formatRupiahSaldo($saldoTotal)
            {
                return 'Rp ' . number_format($saldoTotal, 0, '.', '.');
            }
            
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        }

        $masukTotalRp = formatRupiahMasuk($masukTotal);
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        $currentDate = Carbon::now()->format('D M Y');
        

        $masukTahunan = Finance::groupBy('tahun')
        ->sum('masuk');

        $keluarTahunan = Finance::groupBy('tahun')
        ->sum('keluar');
        
        return view('/finance/finance', compact('finances','organizations','month', 'year', 'currentMonth', 'startDate', 'endDate', 'masukTahunan', 'keluarTahunan', 'currentDate', 'masukTotal', 'keluarTotal', 'saldoTotal','masukTotalRp', 'keluarTotalRp', 'saldoTotalRp'))
        -> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $finances = Finance::where('keterangan', 'LIKE', '%' .$request->search.'%' )->orWhere('bulan', 'LIKE', '%' .$request->search.'%')->OrderBy('tanggal', 'asc')->paginate(10);
        }else{
            $finances = Finance::orderBy('tanggal', 'asc')->paginate(10);
        }


        $pagination = 10;
        $organizations = Organization::all();
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);
        $currentMonth = Carbon::now()->month;
        $startDate = Carbon::createFromDate(null, $currentMonth, 1)->startOfMonth();
        $endDate = Carbon::createFromDate(null, $currentMonth, 1)->endOfMonth();
        $currentDate = Carbon::now()->format('d F Y');
        $i = 0;
        $masukTotal = Finance::sum('masuk');
        $keluarTotal = Finance::sum('keluar');
        $saldoTotal = $masukTotal - $keluarTotal;
        

        if (!function_exists('formatRupiahMasuk')) {
            function formatRupiahMasuk($masukTotal)
            {
                return 'Rp ' . number_format($masukTotal, 0, '.', '.');
            }
            
        $masukTotalRp = formatRupiahMasuk($masukTotal);
        }

        if (!function_exists('formatRupiahKeluar')) {
            function formatRupiahKeluar($keluarTotal)
            {
                return 'Rp ' . number_format($keluarTotal, 0, '.', '.');
            }
            
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        }

        if (!function_exists('formatRupiahSaldo')) {
            function formatRupiahSaldo($saldoTotal)
            {
                return 'Rp ' . number_format($saldoTotal, 0, '.', '.');
            }
            
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        }

        $masukTotalRp = formatRupiahMasuk($masukTotal);
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        $currentDate = Carbon::now()->format('d F Y');

        $masukTahunan = Finance::groupBy('tahun')
        ->sum('masuk');

        $keluarTahunan = Finance::groupBy('tahun')
        ->sum('keluar');


        return view('/finance/adminKeuangan', compact('finances','organizations','month', 'year', 'currentMonth', 'startDate', 'endDate', 'masukTahunan', 'keluarTahunan', 'currentDate', 'masukTotal', 'keluarTotal', 'saldoTotal','masukTotalRp', 'keluarTotalRp', 'saldoTotalRp'))
        -> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
        
    }

    public function incrementNomor($finances)
    {
        $finances->increments('nomor', 1);
    }


    public function tambahKeuangan()
    {
        $bulans = [
            'Januari','Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return view('/finance/tambahKeuangan', compact('bulans'));
    }

    public function insertData(Request $request)
    {
        $bulans = [
            'Januari','Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        Finance::create($request->all());
        return redirect()->route('/finance/adminKeuangan', compact('bulans'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $finance = Finance::find($id);
       return view('/finance/tampilKeuangan', compact('finance'));
    }

    public function updateData(Request $request, $id)
    {
        $finance = Finance::find($id);
        $finance -> update($request->all());
        return redirect()->route('/finance/adminKeuangan')->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $finance = Finance::find($id);
        $finance -> delete();
        return redirect()->route('/finance/adminKeuangan')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPdf()
    {
        $i = 0;
        $finances = Finance::all();
        $masukTotal = Finance::sum('masuk');
        $keluarTotal = Finance::sum('keluar');
        $saldoTotal = $masukTotal - $keluarTotal;

        $financesByYear = Finance::all()->groupBy('tahun');
        

        if (!function_exists('formatRupiahMasuk')) {
            function formatRupiahMasuk($masukTotal)
            {
                return 'Rp ' . number_format($masukTotal, 0, '.', '.');
            }
            
        $masukTotalRp = formatRupiahMasuk($masukTotal);
        }

        if (!function_exists('formatRupiahKeluar')) {
            function formatRupiahKeluar($keluarTotal)
            {
                return 'Rp ' . number_format($keluarTotal, 0, '.', '.');
            }
            
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        }

        if (!function_exists('formatRupiahSaldo')) {
            function formatRupiahSaldo($saldoTotal)
            {
                return 'Rp ' . number_format($saldoTotal, 0, '.', '.');
            }
            
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        }

        $masukTotalRp = formatRupiahMasuk($masukTotal);
        $keluarTotalRp = formatRupiahKeluar($keluarTotal);
        $saldoTotalRp = formatRupiahSaldo($saldoTotal);
        $currentDate = Carbon::now()->format('d F Y');
        
        $masukTahunan = Finance::groupBy('tahun')
        ->sum('masuk');

        $keluarTahunan = Finance::groupBy('tahun')
        ->sum('keluar');

        $saldoTahunan = $masukTahunan - $keluarTahunan;

        

        $data = compact('finances', 'financesByYear','masukTahunan','keluarTahunan', 'saldoTahunan', 'masukTotal', 'keluarTotal','saldoTotal','currentDate','masukTotalRp', 'keluarTotalRp', 'saldoTotalRp', 'i');

        view()->share('financesByYear',  $financesByYear);
        $pdf = PDF::loadView('/finance/finances-pdf', $data);
        return $pdf->download('finances.pdf');

    }





    public function searchDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $finances = Finance::all();
        $masukTotal = Finance::sum('masuk');
        $keluarTotal = Finance::sum('keluar');
        $saldoTotal = $masukTotal - $keluarTotal;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $currentDate = Carbon::now()->format('d F Y');
        $i = 1;
        $pagination=10;
        $organizations = Organization::all();
          // $fitri = Finance::first();
        // $uang = $fitri ? $fitri->uang : 0; 
        // $UangRp = $this->formatRupiah($uang);

        // if (!function_exists('formatRupiah')) {
        //     function formatRupiah($masukTotal)
        //     {
        //         return 'Rp ' . number_format($masukTotal, 0, ',', '.');
        //     }
            
        // $totalUangRp = formatRupiah($masukTotal);
        // }

        if($request->has('searchDate')){
            $finances  = Finance::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $finances = Finance::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/finance/finance', compact('finances', 'start_date', 'end_date','currentDate','masukTotal','keluarTotal','saldoTotal','organizations','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function searchDateAdmin(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $finances = Finance::all();
        $masukTotal = Finance::sum('masuk');
        $keluarTotal = Finance::sum('keluar');
        $saldoTotal = $masukTotal - $keluarTotal;
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $currentDate = Carbon::now()->format('d F Y');
        $i = 1;
        $pagination=10;
        $organizations = Organization::all();
        

        // if (!function_exists('formatRupiah')) {
        //     function formatRupiah($masukTotal)
        //     {
        //         return 'Rp ' . number_format($masukTotal, 0, ',', '.');
        //     }
            
        // $totalUangRp = formatRupiah($masukTotal);
        // }

        if($request->has('searchDateAdmin')){
            $finances  = Finance::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $finances = Finance::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/finance/adminKeuangan', compact('finances', 'start_date', 'end_date','currentDate','masukTotal','keluarTotal','saldoTotal','organizations','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }



}
