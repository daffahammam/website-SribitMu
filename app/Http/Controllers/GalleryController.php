<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Organization;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::OrderBy('tanggal', 'asc')->paginate(6);;
        
        
        return view('welcome', compact('galleries'));
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $galleries = Gallery::where('judul', 'LIKE', '%' .$request->search.'%' )->OrderBy('judul', 'asc')->paginate(10);
        }else{
            $galleries = Gallery::OrderBy('id', 'asc')->paginate(10);
        }

        $pagination = 10;
        return view('/gallery/adminGallery', compact('galleries'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1)* $pagination);;
        
    }

    public function showAll(Request $request)
    {
        if($request->has('search')){
            $galleries = Gallery::where('judul', 'LIKE', '%' .$request->search.'%' )->OrderBy('id', 'asc')->paginate(3);
        }else{
            $galleries = Gallery::OrderBy('id', 'asc')->paginate(3);
        }

        $organizations = Organization::all();
        return view('/gallery/galleryAll', compact('galleries','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }


    public function incrementNomor($galleries)
    {
        $galleries->increments('nomor', 1);
    }


    public function tambahGallery()
    {
       
        return view('/gallery/tambahGallery');
    }

    public function insertData(Request $request)
    {
        $galleries = Gallery::create($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('fotoGaleri/', $request->file('foto')->getClientOriginalName());
            $galleries->foto = $request->file('foto')->getClientOriginalName();
            $galleries->save();
        }
        return redirect()->route('/gallery/adminGallery')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $gallery = Gallery::find($id);
       return view('/gallery/tampilGallery', compact('gallery'));
    }

    public function updateData(Request $request, $id)
    {
        $galleries = Gallery::findOrFail($id);

        if($request->hasFile('foto')){
            $request->validate([
                'judul' => 'required',
                'foto' => 'required',
                
            ]);
            
            $request->file('foto')->move('fotoGaleri/', $request->file('foto')->getClientOriginalName());
            $galleries->foto = $request->file('foto')->getClientOriginalName();
            $galleries->save();

        $galleries->judul = $request->judul;
        $galleries->save();
        }
        return redirect()->route('/gallery/adminGallery', compact('galleries'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $gallery = Gallery::find($id);
        $gallery -> delete();
        return redirect()->route('/gallery/adminGallery')->with('success', 'Data Berhasil Dihapus');
    }
}




