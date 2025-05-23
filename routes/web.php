<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\company\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/company', [CompanyController::class, 'index'])->middleware('admin')->name('company');
Route::get('/company/{id}', [CompanyController::class, 'show'])->middleware('admin')->name('company_show');
Route::post('/company/cretae', [CompanyController::class, 'store'])->middleware('admin')->name('company_cretae');
Route::POST('/company/update', [CompanyController::class, 'company_update'])->middleware('admin')->name('company_update');
Route::POST('/company/update/change', [CompanyController::class, 'company_update_change'])->middleware('admin')->name('company_update_change');
Route::POST('/company/update/image', [CompanyController::class, 'company_update_image'])->middleware('admin')->name('company_update_image');
Route::POST('/company/location/delete', [CompanyController::class, 'company_location_delete'])->middleware('admin')->name('company_location_delete');
Route::POST('/company/location/create', [CompanyController::class, 'create_location'])->middleware('admin')->name('create_location');
Route::get('/company/users/{id}', [CompanyController::class, 'company_user'])->middleware('admin')->name('company_user');
Route::POST('/company/user/create', [CompanyController::class, 'company_create_user'])->middleware('admin')->name('company_create_user');
Route::POST('/company/user/trash', [CompanyController::class, 'company_trash_user'])->middleware('admin')->name('company_trash_user');
Route::POST('/company/user/update/password', [CompanyController::class, 'company_update_password_user'])->middleware('admin')->name('company_update_password_user');
