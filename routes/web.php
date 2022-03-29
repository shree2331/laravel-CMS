<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
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

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/', function () {
        return redirect(route('login'));
    });
   

Route::resource('/admin/employeemanagement', EmployeesController::class,['as'=>'employee']);






