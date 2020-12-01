<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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
    return view('welcome');
});


Route::get("/contact/report/withphone",[ContactController::class,'getReportContactWithPhone']);
Route::get("/contact/report/withoutphone",[ContactController::class,'getReportContactWitOuthPhone']);
Route::get("/contact/report/all",[ContactController::class,'all']);
Route::post("/contact/save",[ContactController::class,'save']);
Route::post("/contact/save/image",[ContactController::class,'avatar']);
Route::post("/contact/delete",[ContactController::class,'delete']);
Route::post("/contact/phone/delete",[ContactController::class,'deletePhone']);
Route::post("/contact/phone/edit",[ContactController::class,'savePhoneList']);
Route::post("/contact/edit",[ContactController::class,'savePersons']);
Route::post("/contact/address/edit",[ContactController::class,'ediAddress']);
Route::post("/contact/address/delete",[ContactController::class,'delete']);
Route::get("/contact/save",[ContactController::class,'save']);

