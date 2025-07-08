<?php

namespace App\Providers;

use App\Models\Category;
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
            $categories = Category::get();

            $view->with('categories', $categories);
        });
    }
}
