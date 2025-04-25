<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Organization;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::all();
        
        
        return view('welcome', compact('articles'));
    }

    public function show(Request $request)
    {
        if($request->has('search')){
            $articles = Article::where('judul', 'LIKE', '%' .$request->search.'%' )->orWhere('penulis', 'LIKE', '%' .$request->search.'%')->OrderBy('created_at', 'desc')->paginate(10);
        }else{
            $articles = Article::OrderBy('created_at', 'desc')->paginate(10);
        }

        return view('/article/adminArticle', compact('articles'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }

    public function showAll(Request $request)
    {
        if($request->has('search')){
            $articles = Article::where('judul', 'LIKE', '%' .$request->search.'%' )->orWhere('penulis', 'LIKE', '%' .$request->search.'%')->OrderBy('created_at', 'desc')->paginate(3);
        }else{
            $articles = Article::OrderBy('created_at', 'asc')->paginate(3);
        }

        $organizations = Organization::all();

        return view('/article/articleAll', compact('articles','organizations'))-> with(key: 'i', value: ($request->input(key: 'page', default:1) - 1));
        
    }


    public function showSingle($id)
    {
        $article = Article::find($id);
        $organizations = Organization::all();
        return view('/article/articleSingle', compact('article','organizations'));
        
    }

    public function incrementNomor($articles)
    {
        $articles->increments('nomor', 1);
    }


    public function tambahArticle()
    {
        return view('/article/tambahArticle');
    }

    public function insertData(Request $request)
    {
        $articles = Article::create($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('fotoArtikel/', $request->file('foto')->getClientOriginalName());
            $articles->foto = $request->file('foto')->getClientOriginalName();
            $articles->save();
        }
        return redirect()->route('/article/adminArticle')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilData($id)
    {
        $article = Article::find($id);
       return view('/article/tampilArticle', compact('article'));
    }

    public function updateData(Request $request, $id)
    {
        $articles = Article::findOrFail($id);

        if($request->hasFile('foto')){
            $request->validate([
                'judul' => 'required',
                'foto' => 'required',
                'penulis' => 'required',
                'isi' => 'required',
            ]);
            
            $request->file('foto')->move('fotoArtikel/', $request->file('foto')->getClientOriginalName());
            $articles->foto = $request->file('foto')->getClientOriginalName();
            $articles->save();

        $articles->judul = $request->judul;
        $articles->penulis = $request->penulis;
        $articles->isi = $request->isi;
        $articles->save();
        }
        return redirect()->route('/article/adminArticle', compact('articles'))->with('success', 'Data Berhasil Diupdate');
    }


    public function deleteData($id)
    {
        $article = Article::find($id);
        $article -> delete();
        return redirect()->route('/article/adminArticle')->with('success', 'Data Berhasil Dihapus');
    }
}
