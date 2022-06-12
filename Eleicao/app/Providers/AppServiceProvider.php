<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Eleicao;
use App\Providers\view;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $eleicoes = Eleicao::all();
        view()->share('eleicoes', $eleicoes);
    }
}
