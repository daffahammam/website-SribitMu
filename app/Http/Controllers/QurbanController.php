<?php

namespace App\Http\Controllers;
use App\Models\Qurban;
use App\Models\Organization;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;


class QurbanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $qurbans = Qurban::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('tahun', 'LIKE', '%' .$request->search.'%')->orWhere('kelompok', 'LIKE', '%' .$request->search.'%')->orWhere('hewan', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $qurbans = Qurban::orderBy('kelompok', 'asc')->paginate(10);
        }

        $pagination = 10;
        $organizations = Organization::all();
        
        
        return view('/qurban/qurban', compact('qurbans','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $qurbans = Qurban::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('tahun', 'LIKE', '%' .$request->search.'%')->orWhere('kelompok', 'LIKE', '%' .$request->search.'%')->orWhere('hewan', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $qurbans = Qurban::orderBy('kelompok', 'asc')->paginate(10);
        }

        $pagination = 10;
        // $qurbans = Qurban::all();

        // $kelompok = Qurban::groupBy('kelompok');
        return view('/qurban/adminQurban', compact('qurbans'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);;
        
    }

    public function incrementNomor($qurbans)
    {
        $qurbans->increments('nomor', 1);
    }


    public function tambahQurban()
    {
        $hewan = [
            'Sapi','Kambing'
        ];
        return view('/qurban/tambahQurban', compact('hewan'));
        
    }

    public function insertData(Request $request)
    {
        $hewan = [
            'Sapi','Kambing'
        ];
        $request->validate([
            'kelompok' => 'required|integer',
            
        ]);

        $request->validate([
            'kelompok' => 'required|integer',
            'tahun' => 'required'
        ]);

        $kelompok = $request->input('kelompok');
        // $tahun = $request->input('tahun');// Mendapatkan tahun saat ini

        $existingCount = Qurban::where('kelompok', $kelompok)->count();
        // $existingCount = Qurban::where('kelompok', $kelompok)
        // ->whereYear('tahun', $tahun) // pastikan 'created_at' adalah kolom tanggal di tabel Qurban
        // ->count();

        if ($kelompok != 0 && $existingCount >= 7) {
            return redirect()->back()->withErrors(['message' => 'Jumlah data untuk kelompok ini sudah mencapai batas maksimum. Silahkan masukan ke dalam kelompok selanjutnya']);
        }

        Qurban::create($request->all());

        
        return redirect()->route('/qurban/adminQurban',  compact('hewan','kelompok'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $hewan = [
            'Sapi','Kambing'
        ];
        $qurban = Qurban::find($id);
        return view('/qurban/tampilQurban', compact('qurban','hewan'));
    }

    public function updateData(Request $request, $id)
    {
        $hewan = [
            'Sapi','Kambing'
        ];
        

        $request->validate([
            'kelompok' => 'required|integer',
            'tahun' => 'required'
        ]);

        $kelompok = $request->input('kelompok');
        // $tahun = $request->input('tahun');// Mendapatkan tahun saat ini
        $existingCount = Qurban::where('kelompok', $kelompok)->count();
        // $existingCount = Qurban::where('kelompok', $kelompok)
        // ->whereYear('tahun', $tahun) // pastikan 'created_at' adalah kolom tanggal di tabel Qurban
        // ->count();

        if ($kelompok != 0 && $existingCount >= 7) {
            return redirect()->back()->withErrors(['message' => 'Jumlah data untuk kelompok ini sudah mencapai batas maksimum. Silahkan masukan ke dalam kelompok selanjutnya']);
        }

        

        $qurban = Qurban::find($id);
        $qurban -> update($request->all());

        
        return redirect()->route('/qurban/adminQurban', compact('qurban','hewan'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $qurban = Qurban::find($id);
        $qurban -> delete();
        return redirect()->route('/qurban/adminQurban')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPdf()
    {
        $qurbans = Qurban::all()->sortBy('kelompok');
        $qurbansByYear = Qurban::all()->groupBy('tahun')->sortBy('kelompok');
        $i = 0;

        $data = compact('qurbans', 'qurbansByYear', 'i');

        view()->share( 'qurbansByYear', $qurbansByYear);
        $pdf = PDF::loadView('qurban/qurban-pdf', $data);
        return $pdf->download('qurbans.pdf');

    }
}


