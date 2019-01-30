<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Cart;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('frontEnd.includes.menu',function($view){
            $cartItems=Cart::content()->count();
            $publishedCategories=Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories)->with('cartItems',$cartItems);
        });

        View::composer('frontEnd.includes.footer',function($view){

            $publishedCategories=Category::where('publicationStatus',1)->get();
            $view->with('publishedCategories',$publishedCategories);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
