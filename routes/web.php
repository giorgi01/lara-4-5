<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

# ცალკეული როუთებით

Route::get('/companies/all', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.all');
Route::post('/companies/add', [App\Http\Controllers\CompanyController::class, 'addCompany'])->name('companies.add');
Route::get('/companies/edit/{id}', [App\Http\Controllers\CompanyController::class, 'editCompany'])->name('companies.edit');
Route::post('/companies/update/{id}', [App\Http\Controllers\CompanyController::class, 'updateCompany'])->name('companies.update');
Route::post('/companies/delete', [App\Http\Controllers\CompanyController::class, 'deleteCompany'])->name('companies.delete');

# რესურს როუთით

Route::resource('/employees', \App\Http\Controllers\EmployeeController::class);
