<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        // tampilkan seluruh artikel yang memeiliki category by slug
        $articles = Article::with('category')->whereHas('category', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->latest()->paginate(12);

        return view('front.category.index', compact('articles'));
    }
}
