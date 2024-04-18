<?php

use App\Http\Controllers\Admin\Prize\PrizeController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Qa\QaController;
use App\Http\Controllers\Admin\Act\ActController;
    use Illuminate\Support\Facades\Route;
    
    // prefix前置詞
    Route::group(["prefix" => "admin/qa"], function(){
        Route::get("/",[QaController::class, "list"]);
        Route::get("list",[QaController::class, "list"]);
        Route::get("add",[QaController::class, "add"]);
        Route::post("insert",[QaController::class, "insert"]);
        Route::get("edit/{id}",[QaController::class, "edit"]);  // {}: 參數  {id}:參數名稱為id  {id?}: 參數id有?,代表參數可能有,也有可能沒有
        Route::post("update",[QaController::class, "update"]);
    Route::get("delete/{id}",[QaController::class, "delete"]);
    });


    Route::group(["prefix" => "admin/prize"], function(){
        Route::get("/",[PrizeController::class, "list"]);
        Route::get("list",[PrizeController::class, "list"]);
        Route::get("add",[PrizeController::class, "add"]);
        Route::post("insert",[PrizeController::class, "insert"]);
        Route::get("edit/{id}",[PrizeController::class, "edit"]);  // {}: 參數  {id}:參數名稱為id  {id?}: 參數id有?,代表參數可能有,也有可能沒有
        Route::post("update",[PrizeController::class, "update"]);
        Route::get("delete/{id}",[PrizeController::class, "delete"]);
    });


    Route::group(["prefix" => "admin/product"], function(){
        Route::get("/",[ProductController::class, "list"]);
        Route::get("list",[ProductController::class, "list"]);
        Route::get("add",[ProductController::class, "add"]);
        Route::post("insert",[ProductController::class, "insert"]);
        Route::get("edit/{pid}",[ProductController::class, "edit"]);  // {}: 參數  {id}:參數名稱為id  {id?}: 參數id有?,代表參數可能有,也有可能沒有
        Route::post("update",[ProductController::class, "update"]);
        Route::get("delete/{pid}",[ProductController::class, "delete"]);
    });
?>
