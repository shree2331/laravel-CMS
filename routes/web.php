<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeLeaveRecordsController;

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



//Route::get('/admin/employeemanagement', [EmployeesController::class,'seacrh'])->name('employee.seacrh');

Route::resource('/admin/employeemanagement', EmployeesController::class,['as'=>'employee']);

Route::resource('/admin/employeeleaverecords', EmployeeLeaveRecordsController::class,
['as'=>'leaverecords']);









