<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Committee;
use App\Models\Gallery;
use App\Models\Organization;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $organizations = Organization::all();
        $committees = Committee::OrderBy('id', 'desc')->paginate(6);
        $activities = Activity::OrderBy('tanggal', 'desc')->paginate(3);
        $galleries = Gallery::OrderBy('id', 'desc')->paginate(6);
        $announcements = Announcement::OrderBy('tanggal', 'desc')->paginate(6);
        $articles = Article::OrderBy('created_at', 'desc')->paginate(6);
        $i = 1;

        
        
        return view('welcome', compact('articles','organizations', 'committees', 'activities', 'galleries', 'announcements'));
    }
}
