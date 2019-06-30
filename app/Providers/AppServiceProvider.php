<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Post;
use App\UserPost;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view)
        {
            $posts=Post::paginate(3);
            $view->with('posts',$posts);
        });
        Schema::defaultStringLength(191);

        view()->composer('layouts.admin',function($view){
            $u=UserPost::all();
            $userposts=count($u);
            $view->with('userposts',$userposts);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(
            'layouts.admin',
            'App\Http\ViewComposers\AdminMenuComposer'
        );
    }
}
