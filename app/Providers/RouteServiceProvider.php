<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => ['api', 'cors'],
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            Route::get('/', function () {
                return view('welcome');
            });
            
            Route::get('/test', function () {
                return view('test');
            });
            
            Route::get('/test/data', [DataController::class, 'test']);
            Route::get('/data/pop', [DataController::class, 'getPop']);
            Route::get('/data/ill', [DataController::class, 'illAmmount']);
            Route::get('/data/illtypes', [DataController::class, 'illtypes']);
            Route::get('/data/gender', [DataController::class, 'gender']);
            Route::get('/data/popcomp', [DataController::class, 'popcomp']);
            Route::get('/data/ever', [DataController::class, 'everDisscussed']);
            Route::get('/data/concerns', [DataController::class, 'concerns']);
        });
    }
}
