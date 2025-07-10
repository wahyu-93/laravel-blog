<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WidgetCategory extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layout._navigation', function ($view) {
            $categoryNavbars = Category::latest()->take(3)->get();

            $view->with('categoryNavbars', $categoryNavbars);
        });

        View::composer('front.layout._side-widget', function ($view) {
            $categories = Category::withCount(['articles' => function($query){
                $query->where('status','1');
            }])->latest()->get();

            // category yang memiliki article 0 tidak ditampilkan
            // $categories = Category::whereHas('articles', function($query){
            //     $query->where('status','1');
            // })->withCount('articles')->latest()->get();

            $relatedPost = [];
            $slug = Request::segment(2);
            if($slug){
                $idCategory = Article::where('slug', $slug)->first();
            
                $relatedPost = Article::where('status','1')
                                        ->where('category_id', $idCategory->category_id)
                                        ->where('id','<>',$idCategory->id)
                                        ->orderBy('views', 'desc')
                                        ->take(3)->get();
            }

            $populerPost = Article::where('status','1')
                                    ->orderBy('views', 'desc')
                                    ->take(5)->get();

            $view->with([
                'categories'    => $categories, 
                'relatedPost'   => $relatedPost,
                'populerPost'   => $populerPost,
            ]); 
        });
    }
}
