<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        if($request->keyword==''){
            $articles = Article::whereStatus('1')->latest()->paginate(12);
        }
        else {
            $articles = Article::where('title', 'like', '%'.$request->keyword.'%')->paginate(12);
        };

        $keyword = $request->keyword;
        return view('front.article.index', compact('articles', 'keyword'));
    }

    public function show($slug)
    {
        $article = Article::whereSlug($slug)->first();
        $categories = Category::get();

        return view('front.article.show', compact('article', 'categories'));
    }
}
