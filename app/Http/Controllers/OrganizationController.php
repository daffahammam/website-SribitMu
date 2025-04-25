<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        $organizations = Organization::all();
        
        
        return view('welcome', compact('organizations'));
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $organizations = Organization::where('id', 'LIKE', '%' .$request->search.'%' )->orWhere('telp', 'LIKE', '%' .$request->search.'%')->OrderBy('id', 'asc')->paginate(4);
        }else{
            $organizations = Organization::OrderBy('id', 'asc')->paginate(4);
        }

        return view('/organization/adminOrganization', compact('organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }

    public function incrementNomor($organizations)
    {
        $organizations->increments('nomor', 1);
    }


    public function tambahOrganization()
    {
       
        return view('/organization/tambahOrganization');
    }

    public function insertData(Request $request)
    {
        $organizations = Organization::create($request->all());
        return redirect()->route('/organization/adminOrganization', compact('organizations'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $organization = Organization::find($id);
       return view('/organization/tampilOrganization', compact('organization'));
    }

    public function updateData(Request $request, $id)
    {
        $organization = Organization::find($id);
        $organization -> update($request->all());
        return redirect()->route('/organization/adminOrganization', compact('organization'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $organization = Organization::find($id);
        $organization -> delete();
        return redirect()->route('/organization/adminOrganization')->with('success', 'Data Berhasil Dihapus');
    }
}


