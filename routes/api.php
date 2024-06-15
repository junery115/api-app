<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\DeviceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("data", [dummyAPI::class, 'getData']);

Route::get("list", [DeviceController::class, 'list']);

Route::get("list/{id}", [DeviceController::class, 'findById']);

//You can use this or just make a specific route like above
//And this is the recommended way to work
Route::get("list/{id?}", [DeviceController::class, 'findByIdOpt']);

Route::post("add", [DeviceController::class, 'add']);

Route::put("update", [DeviceController::class, 'update']);

Route::get("search/{name}", [DeviceController::class, 'search']);

Route::get("searchbychar/{name}", [DeviceController::class, 'searchbychar']);


Route::delete("delete/{id}", [DeviceController::class, 'delete']);


Route::post("save", [DeviceController::class, 'testData']);
