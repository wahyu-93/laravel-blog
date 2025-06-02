<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticle = Article::count();
        $totalCategory = Category::count();
        $latesArticle = Article::with(['category'])->whereStatus(1)->take(10)->latest()->get();
        $populerArticle = Article::with(['category'])->whereStatus(1)->take(10)->orderBy('views', 'DESC')->get();

        return view('back.dashboard.index', compact('totalArticle', 'totalCategory', 'latesArticle', 'populerArticle'));
    }
}
