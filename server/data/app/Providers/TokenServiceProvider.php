<?php
/**
 * Token 服务提供者
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LoginToken',function(){
            return new LoginTokenServices();
        });


    }
}


