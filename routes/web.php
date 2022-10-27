<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployerController;

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
    return view('auth.login');
});

Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('employer', EmployerController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [CompanyController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [CompanyController::class, 'index'])->name('home');

});