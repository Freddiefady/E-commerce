<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('dashboard.*', function () {
            if (! Cache::has('categories_count')) {
                Cache::remember('categories_count', now()->addMinutes(60), function () {
                    return Category::count();
                });
            }
            if (!cache::has('brands_count')) {
                Cache::remember('brands_count', now()->addMinutes(60), function () {
                    return Brand::count();
                });
            }
            if (!cache::has('faqs_count')) {
                Cache::remember('faqs_count', now()->addMinutes(60), function () {
                    return Faq::count();
                });
            }
            view()->share([
                'categories_count' => Cache::get('categories_count'),
                'brands_count' => Cache::get('brands_count'),
                'faqs_count' => Cache::get('faqs_count'),
            ]);
        });
    }
}
