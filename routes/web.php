<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/add_doctor_view',[AdminController::class, 'add_doctor_view']);
Route::post('/upload_doctor',[AdminController::class, 'upload_doctor']);
Route::get('/showappointment',[AdminController::class, 'showappointment']);
Route::get('/approved/{id}',[AdminController::class, 'approved']);
Route::get('/cancelled/{id}',[AdminController::class, 'cancelled']);
Route::get('/alldoctors',[AdminController::class, 'alldoctors']);
Route::get('/delete_doctor/{id}',[AdminController::class, 'delete_doctor']);
Route::get('/update_doctor/{id}',[AdminController::class, 'update_doctor']);
Route::post('/editdoctor/{id}',[AdminController::class, 'editdoctor']);
Route::get('/emailview/{id}',[AdminController::class, 'emailview']);
Route::post('/sendemail/{id}',[AdminController::class, 'sendemail']);

Route::post('/appointment',[HomeController::class, 'appointment']);
Route::get('/myappointment',[HomeController::class, 'myappointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class, 'cancel_appointment']);
