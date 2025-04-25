<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::orderBy('tanggal, desc');
        
        
        return view('welcome', compact('announcements'));
    }

    public function show(Request $request)
    {

         $paginate = 10;
        if($request->has('search')){
            $announcements = Announcement::where('pengumuman', 'LIKE', '%' .$request->search.'%' )->OrderBy('tanggal', 'asc')->paginate(10);
        }else{
            $announcements = Announcement::OrderBy('tanggal', 'asc')->paginate(10);
        }

        return view('/announcement/adminAnnouncement', compact('announcements'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1) * $paginate);
        
    }

    public function incrementNomor($announcements)
    {
        $announcements->increments('nomor', 1);
    }


    public function tambahAnnouncement()
    {
        return view('/announcement/tambahAnnouncement');
    }

    public function insertData(Request $request)
    {
        $announcements = Announcement::create($request->all());
        return redirect()->route('/announcement/adminAnnouncement')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $announcement = Announcement::find($id);
        return view('/announcement/tampilAnnouncement', compact('announcement'));
    }

    public function updateData(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement -> update($request->all());
        return redirect()->route('/announcement/adminAnnouncement', compact('announcement'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $announcement = Announcement::find($id);
        $announcement -> delete();
        return redirect()->route('/announcement/adminAnnouncement')->with('success', 'Data Berhasil Dihapus');
    }
}
