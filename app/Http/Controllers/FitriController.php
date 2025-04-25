<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Fitri;
use App\Models\Organization;

class FitriController extends Controller
{

    private function formatRupiah($UangRp)
        {
            return 'Rp ' . number_format($UangRp, 0, ',', '.');
        }

    public function index(Request $request)
    {
        

        $pagination = 10;

        $organizations = Organization::all();

        $totalUang = Fitri::sum('uang');
        $totalBeras = Fitri::sum('beras');
        $fitri = Fitri::first();
        $uang = $fitri ? $fitri->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('search')){
            $fitris = Fitri::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('alamat', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $fitris = Fitri::orderBy('tanggal', 'asc')->paginate(10);
        }
        
        return view('/fitri/fitri', compact('fitris','totalUang','totalBeras','totalUangRp','UangRp','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function show(Request $request)
    {
        

        $pagination = 10;

        $totalUang = Fitri::sum('uang');
        $totalBeras = Fitri::sum('beras');
        $fitri = Fitri::first();
        $uang = $fitri ? $fitri->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('search')){
            $fitris = Fitri::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('alamat', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $fitris = Fitri::orderBy('tanggal', 'asc')->paginate(10);
        }
        
        
    

        return view('/fitri/adminFitri', compact('fitris','totalUang','totalBeras','totalUangRp','UangRp'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);;
        
    }

    
    public function incrementNomor($fitris)
    {
        $fitris->increments('nomor', 1);
    }


    public function tambahFitri()
    {
        return view('/fitri/tambahFitri');
    }

    public function insertData(Request $request)
    {
        Fitri::create($request->all());
        return redirect()->route('/fitri/adminFitri')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $fitri = Fitri::find($id);
       return view('/fitri/tampilFitri', compact('fitri'));
    }

    public function updateData(Request $request, $id)
    {
        $fitri = Fitri::find($id);
        $fitri -> update($request->all());
        return redirect()->route('/fitri/adminFitri', compact('fitri'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $fitri = Fitri::find($id);
        $fitri -> delete();
        return redirect()->route('/fitri/adminFitri')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPdf()
    {
        $fitris = Fitri::all();

        $totalUang = Fitri::sum('uang');
        $totalBeras = Fitri::sum('beras');
        $fitri = Fitri::first();
        $uang = $fitri ? $fitri->uang : 0; 
        $UangRp = $this->formatRupiah($uang);

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        $data = compact('fitris','totalUang', 'totalBeras','totalUangRp','UangRp');

        view()->share('fitris', $fitris);
        $pdf = PDF::loadView('fitri/fitri-pdf', $data);
        return $pdf->download('zakat-fitri.pdf');

    }

    public function searchDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $totalUang = Fitri::sum('uang');
        $totalBeras = Fitri::sum('beras');
        $fitri = Fitri::first();
        $uang = $fitri ? $fitri->uang : 0; 
        $UangRp = $this->formatRupiah($uang);
        $i = 1;
        $pagination=10;
        $organizations = Organization::all();
        

        if (!function_exists('formatRupiah')) {
            function formatRupiah($totalUang)
            {
                return 'Rp ' . number_format($totalUang, 0, ',', '.');
            }
            
        $totalUangRp = formatRupiah($totalUang);
        }

        if($request->has('searchDate')){
            $fitris  = Fitri::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $fitris = Fitri::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/fitri/fitri', compact('fitris', 'fitri', 'start_date', 'end_date','totalUangRp','UangRp','totalBeras','organizations','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function searchDateAdmin(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $totalUang = Fitri::sum('uang');
        $totalBeras = Fitri::sum('beras');
        $fitri = Fitri::first();
        $uang = $fitri ? $fitri->uang : 0; 
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
            $fitris  = Fitri::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $fitris = Fitri::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/fitri/adminFitri', compact('fitris', 'fitri',  'start_date', 'end_date','totalUangRp','UangRp','totalBeras','i'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }


    
}
