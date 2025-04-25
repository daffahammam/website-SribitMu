<?php

namespace App\Http\Controllers;
use App\Models\Amwal;
use App\Models\Organization;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;

class AmwalController extends Controller
{
    private function formatRupiah($UangRp)
        {
            return 'Rp ' . number_format($UangRp, 0, ',', '.');
        }

    public function index(Request $request)
    {
        
        $pagination = 10;

        $organizations = Organization::all();

        $totalUang = Amwal::sum('uang');
        $totalBeras = Amwal::sum('beras');
        $amwal = Amwal::first();
        $uang = $amwal ? $amwal->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('search')){
            $amwals = Amwal::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('alamat', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $amwals = Amwal::orderBy('tanggal', 'asc')->paginate(10);
        }

        return view('/amwal/amwal', compact('amwals','totalUang','totalBeras','totalUangRp','UangRp','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function show(Request $request)
    {

        
        $pagination = 10;

        $totalUang = Amwal::sum('uang');
        $totalBeras = Amwal::sum('beras');
        $amwal = Amwal::first();
        $uang = $amwal ? $amwal->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('search')){
            $amwals = Amwal::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('alamat', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $amwals = Amwal::orderBy('tanggal', 'asc')->paginate(10);
        }

        return view('/amwal/adminAmwal', compact('amwals','totalUang','totalBeras','totalUangRp','UangRp'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);;
        
    }

    public function incrementNomor($amwals)
    {
        $amwals->increments('nomor', 1);
    }


    public function tambahAmwal()
    {
        return view('/amwal/tambahAmwal');
    }

    public function insertData(Request $request)
    {
        $amwals = Amwal::create($request->all());
        return redirect()->route('/amwal/adminAmwal',  compact('amwals'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $amwal = Amwal::find($id);
       return view('/amwal/tampilAmwal', compact('amwal'));
    }

    public function updateData(Request $request, $id)
    {
        $amwal = Amwal::find($id);
        $amwal -> update($request->all());
        return redirect()->route('/amwal/adminAmwal', compact('amwal'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $amwal = Amwal::find($id);
        $amwal -> delete();
        return redirect()->route('/amwal/adminAmwal')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPdf()
    {
        $i=0;
        $amwals = Amwal::all();

        $totalUang = Amwal::sum('uang');
        $totalBeras = Amwal::sum('beras');
        $amwal = Amwal::first();
        $uang = $amwal ? $amwal->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        $data = compact('amwals','totalUang', 'totalBeras','totalUangRp','UangRp','i');

        view()->share('amwals', $amwals);
        $pdf = PDF::loadView('amwal/amwal-pdf', $data);
        return $pdf->download('zakat-amwal.pdf');

    }


    public function searchDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $totalUang = Amwal::sum('uang');
        $totalBeras = Amwal::sum('beras');
        $amwal = Amwal::first();
        $uang = $amwal ? $amwal->uang : 0; 
        $UangRp = $this->formatRupiah($uang);
        $i = 1;
        $pagination=10;
        

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('searchDate')){
            $amwals  = Amwal::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $amwals = Amwal::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/amwal/amwal', compact('amwals', 'amwal',  'start_date', 'end_date','totalUangRp','UangRp','totalBeras','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function searchDateAdmin(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $totalUang = Amwal::sum('uang');
        $totalBeras = Amwal::sum('beras');
        $amwal = Amwal::first();
        $uang = $amwal ? $amwal->uang : 0; 
        $UangRp = $this->formatRupiah($uang);
        $i = 1;
        $pagination=10;
        

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('searchDateAdmin')){
            $amwals  = Amwal::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $amwals = Amwal::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/amwal/adminAmwal', compact('amwals', 'amwal',  'start_date', 'end_date','totalUangRp','UangRp','totalBeras','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

}
