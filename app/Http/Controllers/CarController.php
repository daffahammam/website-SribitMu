<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\carInfo;
use App\Models\Organization;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;

class CarController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $cars = Car::where('keterangan', 'LIKE', '%' .$request->search.'%' )->orWhere('sopir', 'LIKE', '%' .$request->search.'%')->orWhere('status', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $cars = Car::orderBy('tanggal', 'asc')->paginate(10);
        }

        $pagination = 10;
        
        $organizations = Organization::all();

        
        return view('/car/car', compact('cars','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $cars = Car::where('keterangan', 'LIKE', '%' .$request->search.'%' )->orWhere('sopir', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $cars = Car::orderBy('tanggal', 'asc')->paginate(10);
        }

        $status = [
            'Belum disetujui',
            'Sudah disetujui',
            'Tidak disetujui'
        ];

        $pagination = 10;
        return view('/car/adminCar', compact('cars', 'status'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);;
    }

    public function incrementNomor($cars)
    {
        $cars->increments('nomor', 1);
    }


    public function tambahCar()
    {
        $status = [
            'Belum disetujui',
            'Sudah disetujui',
            'Tidak disetujui'
        ];
        return view('/car/tambahCar', compact('status'));
    }

    public function peminjaman()
    {
        $status = [
            'Belum disetujui',
            'Sudah disetujui',
            'Tidak disetujui'
        ];
        $organizations = Organization::all();
        return view('/car/peminjaman', compact('status','organizations'));
    }


    public function inputData(Request $request)
    {
        Car::create($request->all());
        return redirect()->route('/car/car')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function insertData(Request $request)
    {
        Car::create($request->all());
        return redirect()->route('/car/adminCar')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $status = [
            'Belum disetujui',
            'Sudah disetujui',
            'Tidak disetujui'
        ];
        $car = Car::find($id);
       return view('/car/tampilCar', compact('car', 'status'));
    }

    public function updateData(Request $request, $id)
    {
        $car = Car::find($id);
        $car -> update($request->all());
        return redirect()->route('/car/adminCar')->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $car = Car::find($id);
        $car -> delete();
        return redirect()->route('/car/adminCar')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPdf()
    {
        $cars = Car::all();

        view()->share('cars', $cars);
        $pdf = PDF::loadView('car/cars-pdf');
        return $pdf->download('cars.pdf');

    }

    public function searchDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        $i = 1;
        $pagination=10;
        $organizations = Organization::all();
        
        if($request->has('searchDate')){
            $cars  = Car::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $cars = Car::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/car/car', compact('cars', 'organizations', 'start_date', 'end_date'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }

    public function searchDateAdmin(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
       
        $i = 1;
        $pagination=10;
        



        if($request->has('searchDateAdmin')){
            $cars  = Car::whereDate('tanggal','>=', $start_date)
            ->whereDate('tanggal' ,'<=',$end_date)
            ->orderBy('tanggal', 'asc')->paginate(10);
        }else{
            $cars = Car::orderBy('tanggal', 'asc')->paginate(10);
        }
        

        
        return view('/car/adminCar', compact('cars', 'start_date', 'end_date'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $pagination);
    }
}
