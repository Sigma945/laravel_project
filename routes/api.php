<?php

use App\Http\Controllers\Front\FrontActController;
use App\Http\Controllers\Front\FrontPrizeController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontQaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// get("/qa/list" 是路徑名稱可自行取名(依據前端qa.js裡的設定)
// qa的api
Route::get("/qa/list",[FrontQaController::class, "list"]);

// prize的api
Route::get("/prize/list",[FrontPrizeController::class, "getlist"]);

// product的api
Route::get("/product/list",[FrontProductController::class, "getlist"]);

// act的api
Route::get("/act/list",[FrontActController::class, "getlist"]);
Route::get("/act/getLayer1",[FrontActController::class, "getLayer1"]);
Route::get("/act/getLayer2",[FrontActController::class, "getLayer2"]);