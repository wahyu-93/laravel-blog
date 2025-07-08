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
        if(request()->keyword){
            $articles = Article::with(['Category'])
                        ->where('title', 'like', '%'. request()->keyword. '%')
                        ->paginate(10);
        }
        else {
            $articles = Article::with(['Category'])->latest()->paginate(10);
        };

        $categories = Category::get();
        $lastArticle = Article::latest()->first();
      
        return view('front.home.index', compact('categories', 'lastArticle', 'articles'));
    }

    public function about()
    {
        return view('front.about.index');
    }

    public function contact()
    {
        return view('front.contact.index');
    }
}
