<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Configuracion;
use App\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
			// if (env('APP_HOSTING') == 'server') {
			// 	$this->app->bind('path.public', function() {
			// 		return base_path().'/public_html';
			// 	});
			// }


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

				$configs = Configuracion::find(1);
				$catcero = Categoria::where('parent',0)->where('id','!=',23)->get();
				$categorias = Categoria::orderBy('orden','asc')->get();
				// View::share('config', $configs);

				View::share([
					'config' => $configs,
					'catzero' => $catcero,
					'categorias' => $categorias,
				]);
    }
}
