<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\CheckRouteAccess;
use App\Http\Controllers\DiariesController;
use App\Http\Controllers\DocumentationsController;
use App\Http\Controllers\ApprovalRequestsController;

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

Route::get('/no_permission', function(){
    return view('no_permission');
})->name('no_permission');

Auth::routes();

Route::middleware('checkRouteAccess')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('diaries', DiariesController::class);
    Route::get('/print/diaries/{id}',[App\Http\Controllers\DiariesController::class, 'print'])->name('diaries.print');
    Route::resource('documentations', DocumentationsController::class);
    Route::resource('documentation', DocumentationsController::class);
    Route::resource('approval_request', ApprovalRequestsController::class);
    Route::post('diaries/changeStatus', [ApprovalRequestsController::class, 'changeStatus'])->name('diaries.changeStatus');
    Route::resource('users', UsersController::class);
});
