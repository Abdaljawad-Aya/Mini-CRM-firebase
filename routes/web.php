<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExportCompanyController;
use App\Http\Controllers\ExportEmployeeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::Routes();
// I did this because I want to remove the ability to register using starter kit concept
// And removed routing to register too.

require __DIR__.'/auth.php';

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('/export', [ExportCompanyController::class, 'export'])->name('export');
    Route::get('/export', [ExportEmployeeController::class, 'export'])->name('export');
});
