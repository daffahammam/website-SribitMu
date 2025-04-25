<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index(Request $request)
    {
        $committees = Committee::all();
        
        
        return view('welcome', compact('committees'));
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $committees = Committee::where('nama', 'LIKE', '%' .$request->search.'%' )->orWhere('jabatan', 'LIKE', '%' .$request->search.'%')->paginate(4);;
        }else{
            $committees = Committee::all();
        }

        return view('/dashboard', compact('committees'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }

    public function incrementNomor($committees)
    {
        $committees->increments('nomor', 1);
    }


    public function tambahCommittee()
    {
       
        return view('/committee/tambahCommittee');
    }

    public function insertData(Request $request)
    {
        $committees = Committee::create($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('fotoPengurus/', $request->file('foto')->getClientOriginalName());
            $committees->foto = $request->file('foto')->getClientOriginalName();
            $committees->save();
        }
        return redirect('/dashboard')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $committee = Committee::find($id);
       return view('/committee/tampilCommittee', compact('committee'));
    }

    public function updateData(Request $request, $id)
    {
        $committees = Committee::findOrFail($id);

        if($request->hasFile('foto')){
            $request->validate([
                'nama' => 'required',
                'jabatan' => 'required',
                'nbm' => 'required',
                'alamat' => 'required',
                'telp' => 'required',
                'foto' => 'required',

            ]);
            
            $request->file('foto')->move('fotoPengurus/', $request->file('foto')->getClientOriginalName());
            $committees->foto = $request->file('foto')->getClientOriginalName();
            $committees->save();

        $committees->nama = $request->nama;
        $committees->jabatan = $request->jabatan;
        $committees->nbm = $request->nbm;
        $committees->alamat = $request->alamat;
        $committees->telp = $request->telp;
        $committees->save();
        }
        return redirect()->route('dashboard.committee', compact('committees'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $committee = Committee::find($id);
        $committee -> delete();
        return redirect()->route('/dashboard/dashboard')->with('success', 'Data Berhasil Dihapus');
    }
}
