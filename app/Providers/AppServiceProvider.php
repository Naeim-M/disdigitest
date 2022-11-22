<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use Illuminate\Support\Pluralizer;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::useBootstrapFour();

        //Pluralizer::useLanguage('turkish');
        
        view()->composer('*', function ($view) {
            $cities=DB::table('cities')->get();
            $categories=DB::table('categories')->orderBy('name', 'asc')->get();
            $cats=DB::table('cats')->orderBy('name', 'asc')->get();
            $view->with('cities', $cities );
            $view->with('categories', $categories );
            $view->with('cats', $cats );
            $view->with('user', Auth::user());   
        });
        //$user=Auth::user();
        //View::share('user',$user);
        //$cities=DB::table('cities')->get();
       // View::share('cities',$cities);  
        
    }

}
