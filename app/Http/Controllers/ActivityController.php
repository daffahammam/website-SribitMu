<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = Activity::OrderBy('tanggal', 'asc')->paginate(3);;
        
        
        return view('welcome', compact('activities'));
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $activities = Activity::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('tempat', 'LIKE', '%' .$request->search.'%')->OrderBy('tanggal', 'asc')->paginate(10);
        }else{
            $activities = Activity::OrderBy('tanggal', 'asc')->paginate(10);
        }

        return view('/activity/adminActivity', compact('activities'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }

    public function showAll(Request $request)
    {
        if($request->has('search')){
            $activities = Activity::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('tempat', 'LIKE', '%' .$request->search.'%')->OrderBy('tanggal', 'asc')->paginate(3);
        }else{
            $activities = Activity::OrderBy('tanggal', 'asc')->paginate(3);
        }

        $organizations = Organization::all();

        return view('/activity/activityAll', compact('activities','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }

    public function incrementNomor($activities)
    {
        $activities->increments('nomor', 1);
    }


    public function tambahActivity()
    {
       
        return view('/activity/tambahActivity');
    }

    public function insertData(Request $request)
    {
        $activities = Activity::create($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('fotoKegiatan/', $request->file('foto')->getClientOriginalName());
            $activities->foto = $request->file('foto')->getClientOriginalName();
            $activities->save();
        }
        return redirect()->route('/activity/adminActivity')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $activity = Activity::find($id);
       return view('/activity/tampilActivity', compact('activity'));
    }

    public function updateData(Request $request, $id)
    {
        $activities = Activity::findOrFail($id);

        if($request->hasFile('foto')){
            $request->validate([
                'nama' => 'required',
                'foto' => 'required',
                'tempat' => 'required',
                'tanggal' => 'required',
            ]);
            
            $request->file('foto')->move('fotoKegiatan/', $request->file('foto')->getClientOriginalName());
            $activities->foto = $request->file('foto')->getClientOriginalName();
            $activities->save();

        $activities->nama = $request->nama;
        $activities->tanggal = $request->tanggal;
        $activities->tempat = $request->tempat;
        $activities->save();
        }
        
        return redirect()->route('/activity/adminActivity', compact('activities'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $activity = Activity::find($id);
        $activity -> delete();
        return redirect()->route('/activity/adminActivity')->with('success', 'Data Berhasil Dihapus');
    }
}


