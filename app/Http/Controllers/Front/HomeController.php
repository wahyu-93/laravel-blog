<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $categories = Category::get();
        $lastArticle = Article::latest()->first();
        $articles = Article::latest()->get();

        return view('front.home.index', compact('categories', 'lastArticle', 'articles'));
    }
}
