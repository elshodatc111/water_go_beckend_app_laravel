<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user\AuthUserController;
use App\Http\Controllers\api\user\CompanyController;

Route::post('/user-phone', [AuthUserController::class, 'sendCode']);
Route::post('/user-verify-code', [AuthUserController::class, 'verifyCode']);


Route::get('/lists', [CompanyController::class, 'apiGet']);
Route::get('/list/{id}', [CompanyController::class, 'apiGetShow']);