<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user\AuthUserController;

Route::post('/user-phone', [AuthUserController::class, 'sendCode']);
Route::post('/user-verify-code', [AuthUserController::class, 'verifyCode']);