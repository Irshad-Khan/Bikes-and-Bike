<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/vehicle/create', [VehicleController::class, 'create'])
        ->name('vehicle.create');
    Route::post('/vehicle/store', [VehicleController::class, 'store'])
        ->name('vehicle.store');
    Route::get('/vehicle/show/{id}', [VehicleController::class, 'show'])
        ->name('vehicle.show');
    Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])
        ->name('vehicle.edit');
    Route::post('/vehicle/update', [VehicleController::class, 'update'])
        ->name('vehicle.update');
    Route::get('/vehicle/delete/{id}', [VehicleController::class, 'delete'])
        ->name('vehicle.delete');

    Route::get('/company/index', [CompanyController::class, 'index'])
        ->name('company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])
        ->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])
        ->name('company.store');
    Route::get('/company/show/{id}', [CompanyController::class, 'show'])
        ->name('company.show');
    Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])
        ->name('company.edit');
    Route::post('/company/update', [CompanyController::class, 'update'])
        ->name('company.update');
    Route::get('/company/delete/{id}', [CompanyController::class, 'delete'])
        ->name('company.delete');
});
