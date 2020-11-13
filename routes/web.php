<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

